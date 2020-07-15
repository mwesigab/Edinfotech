<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\Department;
use App\Models\School;
use App\Models\Student;
use App\Models\Usermeta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admin = unserialize(session('Admin'));
        if ($admin['admin'] == 2) {
            $school_admin = Department::where('dept_head_email', $admin['email'])->get()->toArray();
            $school_admin_info = School::where('id', $school_admin[0]['school_id'])->get();
            $schools = $school_admin_info;
        }else{
            $schools = School::all();
        }
        return view('admin.schools.student_form', array('schools' => $schools));
    }

    public function add_student(Request $request)
    {
        $firstName = $request->first_name;
        $lastName = $request->last_name;
        $startNumber = 1000000000;

        $lastRec = Student::orderBy('created_at', 'desc')->first();
        if ($lastRec) {
            $lastUsername = $lastRec->username;
            $startNumber = substr($lastUsername, 2);
            $userName = $lastName[0] . $firstName[0] . ($startNumber + 1);
        } else {
            $userName = $lastName[0] . $firstName[0] . ($startNumber + 1);
        }

        $password = "student";

        $studentName = $lastName . " " . $firstName;
        $newStudent = [
            'student_name' => $studentName,
            'gender' => $request->gender,
            'class' => $request->student_class,
            'stream' => $request->stream,
            'school_id' => $request->school_id,
            'status' => "Active",
            'login_count' => 0,
            'first_time_login' => true,
            'username' => $userName,
            'password' => $password,
            'mode' => 'Active',
        ];
        Student::create($newStudent);

        return redirect('/admin/school/students');
    }

    public function view_students()
    {
        $user = unserialize(session('Admin'));
        $deptData = Department::where('dept_head_email', $user['email'])->first();
        if ($deptData) {
            $students = Student::where('school_id', $deptData['school_id'])->where('status','Active')->get();
        } else {
            $students = Student::all()->where('status','Active');
        }
        return view('admin.schools.view_students', array('students' => $students));
    }

    public function student_login_form()
    {
        return view('schools.students.login_form');
    }

    public function student_login(Request $request)
    {
        $username = $request->username;
        $password = $request->password;
        $student = Student::where('username', $username)->where('mode', 'active')->first();
        //if($admin && $de = decrypt($admin->password) == $password){
        if ($student && $de = $student->password == $password && $student->first_time_login == false) {
            $request->session()->put('Student', serialize($student->toArray()));
            $student_user = Student::find($student->id);
            $student_user->last_seen = time();
            $student_user->save();
            return redirect('/school/student/dashboard');
        } else if ($student && $de = $student->password == $password && $student->first_time_login == true) {
            $request->session()->put('Student', serialize($student->toArray()));
            return redirect('school/student/pay');
        } else {
            $request->session()->flash('Error', 'notfonud');
            return redirect('/school/student/login_form');
        }
    }

    public function student_dashboard()
    {
        $user = unserialize(session('Student'));
        $userMetas = Usermeta::where('id', $user['id'])->pluck('value', 'option')->all();
        $new_content = Content::with('metas', 'user')->where('mode', 'publish')->where('school_id', $user['school_id'])->limit(10)->orderBy('id', 'DESC')->get();


        return view('schools.students.dashboard', [
            'user' => $user,
            'meta' => $userMetas,
            'new_content' => $new_content,
        ]);
    }

    public function logout_student()
    {
        Session::flush();
        return redirect('/school/student/login_form');
    }

    public function student_courses()
    {
        $lists = Content::all();
        return view('schools.content.school_content', ['lists' => $lists]);
    }

    public function student_edit($id){
        $admin = unserialize(session('Admin'));
        if ($admin['admin'] == 2) {
            $school_admin = Department::where('dept_head_email', $admin['email'])->get()->toArray();
            $school_admin_info = School::where('id', $school_admin[0]['school_id'])->get();
            $schools = $school_admin_info;
        }else{
            $schools = School::all();
        }

        $student = Student::where('id',$id)->get()->toArray();
        $name_arr = explode(" ",$student[0]['student_name']);
        return view('admin.schools.student_edit', array('schools' => $schools, 'student'=>$student,'name_arr'=>$name_arr));
    }

    public function student_edit_store(Request $request, $student_id){
        $data_arr = [
            'student_name'=>$request->last_name." ".$request->first_name,
            'username'=>$request->username,
            'gender'=>$request->gender,
            'school_id'=>$request->school_id,
            'class'=>$request->student_class,
            'stream'=>$request->stream,
        ];

        Student::where('id',$student_id)->update($data_arr);
        return redirect('/admin/school/students');
    }

    public function student_delete($id)
    {
        Student::where('id', $id)->update(['status' => 'deleted']);
        return back();
    }
}
