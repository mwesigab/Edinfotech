<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\StudentTransactions;
use Illuminate\Http\Request;

use kcfinder\session;
use KingFlamez\Rave\Facades\Rave;

class RaveController extends Controller
{

    /**
     * Initialize Rave payment process
     * @return void
     */
    public function initialize(Request $request)
    {
        //This initializes payment and redirects to the payment gateway
        //The initialize method takes the parameter of the redirect URL

        $user = unserialize(session('Student'));
        //dd($user);
        $transactionData = [
            'amount_paid'=>$request->amount,
            'expected_amount'=>50000,
            'student_name'=>$user['student_name'],
            'student_id'=>$user['id'],
            'paid_by_phone'=>$request->phonenumber,
            'student_payt_period_id'=>$request->school_period,
            'currency'=>$request->currency,
        ];

        $transaction_id = StudentTransactions::insertGetId($transactionData);
        $request->session()->put('tranID', $transaction_id);
        Rave::initialize(route('callback'));
    }

    /**
     * Obtain Rave callback information
     * @return void
     */
    public function callback(Request $request) {
        $transaction_id = session('tranID');

        // This verifies the transaction and takes the parameter of the transaction reference
        $requestData = json_decode($request->request->get("resp"))->tx;
        $data = Rave::verifyTransaction($requestData->txRef);

        $tranData = StudentTransactions::where('id',$transaction_id)->first();
        $chargeResponsecode = $data->data->chargecode;
        $chargeAmount = $data->data->amount;
        $chargeCurrency = $data->data->currency;

        $amount = $tranData['amount_paid'];
        $currency = $tranData['currency'];
        if (($chargeResponsecode == "00" || $chargeResponsecode == "0") && ($chargeAmount == $amount)  && ($chargeCurrency == $currency)) {
            $tran_data_update = [
                'paid_by'=>$data->data->custname,
                'tran_id'=>$data->data->txid,
                'tran_ref'=>$data->data->txref,
                'flw_ref'=>$data->data->flwref,
                'currency'=>$data->data->currency,
                'tran_fee'=>$data->data->appfee,
                'ip_address'=>$data->data->ip,
                'narration'=>$data->data->narration,
                'tran_status'=>$data->status,
                'payment_type'=>$data->data->paymenttype,
                'payment_id'=>$data->data->paymentid,
                'rave_ref'=>$data->data->raveref,
                'amount_settled'=>$data->data->amountsettledforthistransaction,
                'paid_by_email'=>$data->data->custemail,
            ];

            StudentTransactions::where('id',$transaction_id)->update($tran_data_update);
            $user = unserialize(session('Student'));
            Student::where('id',$user['id'])->update(['first_time_login'=>false]);
            return redirect('/school/student/dashboard');

        } else {
            //Dont Give Value and return to Failure page
            session::flush();
            return redirect('/school/student/failed');
        }

        // dd($data->data);
    }

    /**
     * Receives Rave webhook
     * @return void
     */
    public function webhook()
    {
        //This receives the webhook
        $data = Rave::receiveWebhook();
        dd("Webhook");
        Log::info(json_encode($data, true));
    }

    public function failed(){
        return view('schools.students.failed');
    }

    public function success(){
        return view('schools.students.failed');
    }
}
