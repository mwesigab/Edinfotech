@extends('admin.newlayout.layout',['breadcom'=>['Student','Edit']])
@section('page')
<div class="login-s">
    <div class="h-25"></div>
    <div class="h-25"></div>
    <div class="container">
        <div class="card mx-auto" style="width: 780px;margin: 0 auto;float: none;margin-bottom: 10px;">
            <div class="card-header text-center">
                <h3>Edit Student</h3>
            </div>
            <div class="card-body">
                <form action="/school/student/edit/store/{{{$student[0]['id']}}}" method="post">
                    <div class="row">
                        <div class="col-md-6 pull-left">
                            <div class="form-group">
                                <label for="first_name">First Name</label>
                                <input type="text" class="form-control" id="first_name" value="{{$name_arr[1]}}"
                                       placeholder="Enter First Name" name="first_name">
                            </div>
                        </div>
                        <div class="col-md-6 pull-right">
                            <div class="form-group">
                                <label for="last_name">Last Name</label>
                                <input type="text" class="form-control" id="last_name" value="{{$name_arr[0]}}"
                                       placeholder="Enter Last Name" name="last_name">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 pull-left">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" id="username" value="{{$student[0]['username']}}"
                                       placeholder="Enter Username" name="username">
                            </div>
                        </div>
                        <div class="col-md-6 pull-right">
                            <div class="form-group">
                                <label for="sex">Gender</label>
                                <select id="sex" class="form-control" name="gender">
                                    <option value="Male" @if($student[0]['gender'] == 'Male') selected @endif>Male</option>
                                    <option value="Female" @if($student[0]['gender'] == 'Female') selected @endif>Female</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 pull-right">
                            <div class="form-group">
                                <label for="school_id">School</label>
                                <select id="school_id" class="form-control" name="school_id">
                                    @foreach($schools as $school)
                                    <option value="{{{ $school->id }}}"  @if($student[0]['school_id'] == $school->id ) selected @endif>{{ $school->school_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        @if(count($schools)==1 && $schools[0]['education_level']==1)
                        <div class="col-md-6 pull-left" id="primary_classes">
                            <div class="form-group">
                                <label for="student_class">{{{ trans('main.class') }}}</label>
                                <select name="student_class" class="form-control font-s">
                                    <option>Select--</option>
                                    <option value="{{{ trans('main.class_seven') }}}" @if($student[0]['class'] == trans('main.class_seven') ) selected @endif>{{{ trans('main.class_seven') }}}</option>
                                    <option value="{{{ trans('main.class_six') }}}" @if($student[0]['class'] == trans('main.class_six') ) selected @endif>{{{ trans('main.class_six') }}}</option>
                                    <option value="{{{ trans('main.class_five') }}}" @if($student[0]['class'] == trans('main.class_five') ) selected @endif>{{{ trans('main.class_five') }}}</option>
                                    <option value="{{{ trans('main.class_four') }}}" @if($student[0]['class'] == trans('main.class_four') ) selected @endif>{{{ trans('main.class_four') }}}</option>
                                    <option value="{{{ trans('main.class_three') }}}" @if($student[0]['class'] == trans('main.class_three') ) selected @endif>{{{ trans('main.class_three') }}}</option>
                                    <option value="{{{ trans('main.class_two') }}}" @if($student[0]['class'] == trans('main.class_two') ) selected @endif>{{{ trans('main.class_two') }}}</option>
                                    <option value="{{{ trans('main.class_one') }}}" @if($student[0]['class'] == trans('main.class_one') ) selected @endif>{{{ trans('main.class_one') }}}</option>
                                    <option value="{{{ trans('main.elementary_three') }}}" @if($student[0]['class'] == trans('main.elementary_three') ) selected @endif>{{{ trans('main.elementary_three') }}}</option>
                                    <option value="{{{ trans('main.elementary_two') }}}" @if($student[0]['class'] == trans('main.elementary_two') ) selected @endif>{{{ trans('main.elementary_two') }}}</option>
                                    <option value="{{{ trans('main.elementary_one') }}}" @if($student[0]['class'] == trans('main.elementary_one') ) selected @endif>{{{ trans('main.elementary_one') }}}</option>
                                </select>
                            </div>
                        </div>
                        @elseif(count($schools)==1 && $schools[0]['education_level']==2)
                        <div class="col-md-6 pull-left">
                            <div class="form-group">
                                <label for="student_class">{{{ trans('main.class') }}}</label>
                                <select name="student_class" class="form-control font-s">
                                    <option>Select--</option>
                                    <option value="{{{ trans('main.senior_six') }}}" @if($student[0]['class'] == trans('main.senior_six') ) selected @endif>{{{ trans('main.senior_six') }}}</option>
                                    <option value="{{{ trans('main.senior_five') }}}" @if($student[0]['class'] == trans('main.senior_five') ) selected @endif>{{{ trans('main.senior_five') }}}</option>
                                    <option value="{{{ trans('main.senior_four') }}}" @if($student[0]['class'] == trans('main.senior_four') ) selected @endif>{{{ trans('main.senior_four') }}}</option>
                                    <option value="{{{ trans('main.senior_three') }}}" @if($student[0]['class'] == trans('main.senior_three') ) selected @endif>{{{ trans('main.senior_three') }}}</option>
                                    <option value="{{{ trans('main.senior_two') }}}" @if($student[0]['class'] == trans('main.senior_two') ) selected @endif>{{{ trans('main.senior_two') }}}</option>
                                    <option value="{{{ trans('main.senior_one') }}}" @if($student[0]['class'] == trans('main.senior_one') ) selected @endif>{{{ trans('main.senior_one') }}}</option>
                                </select>
                            </div>
                        </div>
                        (count($schools)==1 && $schools[0]['education_level']==3)
                        <div class="col-md-6 pull-left" id="university_classes">
                            <div class="form-group">
                                <label for="student_class">{{{ trans('main.class') }}}</label>
                                <select name="student_class" class="form-control font-s">
                                    <option>Select--</option>
                                    <option value="{{{ trans('main.sixth_year') }}}" @if($student[0]['class'] == trans('main.sixth_year') ) selected @endif>{{{ trans('main.sixth_year') }}}</option>
                                    <option value="{{{ trans('main.fifth_year') }}}" @if($student[0]['class'] == trans('main.fifth_year') ) selected @endif>{{{ trans('main.fifth_year') }}}</option>
                                    <option value="{{{ trans('main.fourth_year') }}}" @if($student[0]['class'] == trans('main.fourth_year') ) selected @endif>{{{ trans('main.fourth_year') }}}</option>
                                    <option value="{{{ trans('main.third_year') }}}" @if($student[0]['class'] == trans('main.third_year') ) selected @endif>{{{ trans('main.third_year') }}}</option>
                                    <option value="{{{ trans('main.second_year') }}}" @if($student[0]['class'] == trans('main.second_year') ) selected @endif>{{{ trans('main.second_year') }}}</option>
                                    <option value="{{{ trans('main.first_year') }}}" @if($student[0]['class'] == trans('main.first_year') ) selected @endif>{{{ trans('main.first_year') }}}</option>
                                </select>
                            </div>
                        </div>
                        @endif
                    </div>
                    <div class="row">
                        <div class="col-md-6 pull-left">
                            <div class="form-group">
                                <label for="stream">Stream</label>
                                <input type="text" class="form-control" id="stream" value="{{$student[0]['stream']}}"
                                       placeholder="Enter Student's Stream" name="stream">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 pull-right">
                            <button type="submit" class="btn btn-primary btn-lg btn-block">SUBMIT</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="h-25"></div>
        </div>
    </div>
    <div class="h-25"></div>
</div>
@endsection
