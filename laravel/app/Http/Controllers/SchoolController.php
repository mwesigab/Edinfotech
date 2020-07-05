<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\School;
use App\Models\Student;
use App\Models\StudentPaytPeriod;
use Illuminate\Http\Request;

class SchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('schools.school_form');
    }

    public function add_school(Request $request)
    {
        $newSchool = [
            'school_name' => $request->school_name,
            'school_address' => $request->school_address,
            'director_name' => $request->director_name,
            'director_phone' => $request->director_phone,
            'head_teacher_name' => $request->head_teacher_name,
            'head_teacher_phone' => $request->head_teacher_phone,
            'school_email' => $request->school_email,
            'status' => "Active",
        ];
        $newSchool = School::create($newSchool);
    }

    public function view_schools()
    {
        $schools = School::all();
        return view('schools.view_schools',array('schools'=>$schools));
    }

    public function get_school_list(Request $request){
        $school_list = School::all();
        return $school_list->toArray();
    }

    public function pay_form(){
        return view('schools.students.pay_form',array('periods'=>StudentPaytPeriod::all()));
    }
}
