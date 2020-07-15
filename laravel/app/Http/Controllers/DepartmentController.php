<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\School;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schools = School::all();
        return view('admin.schools.department_form',array('schools'=>$schools));
    }

    public function add_department(Request $request)
    {
        $newDept = [
            'dept_name' => $request->dept_name,
            'dept_head_name' => $request->dept_head_name,
            'dept_head_phone' => $request->dept_head_phone,
            'dept_head_address' => $request->dept_head_address,
            'dept_head_email' => $request->dept_head_email,
            'school_id' => $request->school_id,
            'status' => 'Active'
        ];

        if(Department::create($newDept))
            return redirect('/admin/school/departments');
    }

    public function view_departments(){
        $departments = Department::all();
        return view('admin.schools.view_departments', array('departments'=>$departments));
    }

    public function get_department_list(Request $request){
        $post_value = $request->postValue;
        return Department::where('school_id',$post_value)->get()->toArray();
    }
}
