<?php

namespace App\Http\Controllers\Admin;

use App\Models\Content;
use App\Models\Sell;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SellController extends Controller
{
    protected $request;

    public function __construct(Request $request) {
        $this->request = $request;
    }
    
    public function lists(){
        $fdate = strtotime($this->request->get('fsdate'));
        $ldate = strtotime($this->request->get('lsdate'));

        $lists = Sell::with('user','buyer','content','transaction')->orderBy('id','DESC');

        if($fdate>12601)
            $lists->where('create_at','>',$fdate);
        if($ldate>12601)
            $lists->where('create_at','<',$ldate);
        if($this->request->get('user')!==null)
            $lists->where('user_id',$this->request->get('user'));
        if($this->request->get('buyer')!==null)
            $lists->where('buyer_id',$this->request->get('buyer'));
        if($this->request->get('content')!==null)
            $lists->where('content_id',$this->request->get('content'));
        if($this->request->get('type')!==null) {
            switch ($this->request->get('type')) {
                case 'download':
                    $lists->where('type', 'download');
                    break;
                case 'post':
                    $lists->where('type', 'post');
                    break;
                case 'success':
                    $lists->where('post_feedback', '1');
                    break;
                case 'fail':
                    $lists->where('post_feedback', '2')->orWhere('post_feedback','3');
                    break;
                case 'wait':
                    $lists->where('post_feedback', null)->where('type','post');
                    break;
            }
        }


        $contents = Content::all();
        $users = User::all();
        $lists = $lists->get();
        return view('admin.sell.sell',['lists'=>$lists,'contents'=>$contents,'users'=>$users]);
    }
}
