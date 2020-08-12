@extends('admin.newlayout.layout',['breadcom'=>['Students','New']])
@section('page')
<div class="login-s">
    <div class="h-25"></div>
    <div class="h-25"></div>
    <div class="container">
        <div class="card mx-auto" style="width: 780px;margin: 0 auto;float: none;margin-bottom: 10px;">
            <div class="card-header text-center">
                <h3>Add Student</h3>
            </div>
            <div class="card-body">
                <form action="/school/add_student" method="post">
                    <div class="row">
                        <div class="col-md-6 pull-left">
                            <div class="form-group">
                                <label for="first_name">First Name</label>
                                <input type="text" class="form-control" id="first_name"
                                       placeholder="Enter Student Name" name="first_name">
                            </div>
                        </div>
                        <div class="col-md-6 pull-left">
                            <div class="form-group">
                                <label for="last_name">Last Name</label>
                                <input type="text" class="form-control" id="last_name"
                                       placeholder="Enter Student Name" name="last_name">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 pull-left">
                            <div class="form-group">
                                <label for="sex">Gender</label>
                                <select id="sex" class="form-control" name="gender">
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 pull-right">
                            <div class="form-group">
                                <label for="school_id">School</label>
                                <select id="school_id" class="form-control" name="school_id">
                                    @foreach($schools as $school)
                                    <option value="{{{ $school->id }}}">{{ $school->school_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @if(count($schools)==1 && $schools[0]['education_level']==1)
                        <div class="col-md-6 pull-left" id="primary_classes">
                            <div class="form-group">
                                <label for="student_class">{{{ trans('main.class') }}}</label>
                                <select name="student_class" class="form-control font-s">
                                    <option>Select--</option>
                                    <option value="{{{ trans('main.class_seven') }}}">{{{ trans('main.class_seven') }}}</option>
                                    <option value="{{{ trans('main.class_six') }}}">{{{ trans('main.class_six') }}}</option>
                                    <option value="{{{ trans('main.class_five') }}}">{{{ trans('main.class_five') }}}</option>
                                    <option value="{{{ trans('main.class_four') }}}">{{{ trans('main.class_four') }}}</option>
                                    <option value="{{{ trans('main.class_three') }}}">{{{ trans('main.class_three') }}}</option>
                                    <option value="{{{ trans('main.class_two') }}}">{{{ trans('main.class_two') }}}</option>
                                    <option value="{{{ trans('main.class_one') }}}">{{{ trans('main.class_one') }}}</option>
                                    <option value="{{{ trans('main.elementary_three') }}}">{{{ trans('main.elementary_three') }}}</option>
                                    <option value="{{{ trans('main.elementary_two') }}}">{{{ trans('main.elementary_two') }}}</option>
                                    <option value="{{{ trans('main.elementary_one') }}}">{{{ trans('main.elementary_one') }}}</option>
                                </select>
                            </div>
                        </div>
                        @elseif(count($schools)==1 && $schools[0]['education_level']==2)
                        <div class="col-md-6 pull-left">
                            <div class="form-group">
                                <label for="student_class">{{{ trans('main.class') }}}</label>
                                <select name="student_class" class="form-control font-s">
                                    <option>Select--</option>
                                    <option value="{{{ trans('main.senior_six') }}}">{{{ trans('main.senior_six') }}}</option>
                                    <option value="{{{ trans('main.senior_five') }}}">{{{ trans('main.senior_five') }}}</option>
                                    <option value="{{{ trans('main.senior_four') }}}">{{{ trans('main.senior_four') }}}</option>
                                    <option value="{{{ trans('main.senior_three') }}}">{{{ trans('main.senior_three') }}}</option>
                                    <option value="{{{ trans('main.senior_two') }}}">{{{ trans('main.senior_two') }}}</option>
                                    <option value="{{{ trans('main.senior_one') }}}">{{{ trans('main.senior_one') }}}</option>
                                </select>
                            </div>
                        </div>
                        (count($schools)==1 && $schools[0]['education_level']==3)
                        <div class="col-md-6 pull-left" id="university_classes">
                            <div class="form-group">
                                <label for="student_class">{{{ trans('main.class') }}}</label>
                                <select name="student_class" class="form-control font-s">
                                    <option>Select--</option>
                                    <option value="{{{ trans('main.sixth_year') }}}">{{{ trans('main.sixth_year') }}}</option>
                                    <option value="{{{ trans('main.fifth_year') }}}">{{{ trans('main.fifth_year') }}}</option>
                                    <option value="{{{ trans('main.fourth_year') }}}">{{{ trans('main.fourth_year') }}}</option>
                                    <option value="{{{ trans('main.third_year') }}}">{{{ trans('main.third_year') }}}</option>
                                    <option value="{{{ trans('main.second_year') }}}">{{{ trans('main.second_year') }}}</option>
                                    <option value="{{{ trans('main.first_year') }}}">{{{ trans('main.first_year') }}}</option>
                                </select>
                            </div>
                        </div>
                        @endif
                        <div class="col-md-6 pull-left">
                            <div class="form-group">
                                <label for="stream">Stream</label>
                                <input type="text" class="form-control" id="stream"
                                       placeholder="Enter Student's Stream" name="stream">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 pull-left">
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
