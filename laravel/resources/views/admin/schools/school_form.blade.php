@extends('admin.newlayout.layout',['breadcom'=>['Schools','New School']])
@section('page')
<div class="login-s">
    <div class="h-25"></div>
    <div class="h-25"></div>
    <div class="container">
        <div class="card mx-auto" style="width: 780px;margin: 0 auto;float: none;margin-bottom: 10px;">
            <div class="card-header text-center">
                <h3>Register a school</h3>
            </div>
            <div class="card-body">
                <form class="form" action="/school/add_school" method="post">
                    <div class="row">
                        <div class="col-md-6 pull-left">
                            <div class="form-group">
                                <label for="school_name">School Name</label>
                                <input type="text" class="form-control" id="school_name"
                                       placeholder="Enter School Name" name="school_name">
                            </div>
                        </div>
                        <div class="col-md-6 pull-right">
                            <div class="form-group">
                                <label for="school_address">School Address</label>
                                <input type="text" class="form-control" id="school_address"
                                       placeholder="Enter School Address" name="school_address">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 pull-left">
                            <div class="form-group">
                                <label for="director_name">School Director's Name</label>
                                <input type="text" class="form-control" id="director_name"
                                       placeholder="Enter School Director's Name" name="director_name">
                            </div>
                        </div>
                        <div class="col-md-6 pull-right">
                            <div class="form-group">
                                <label for="director_phone">School Director's Phone</label>
                                <input type="text" class="form-control" id="director_phone"
                                       placeholder="Enter School Director's Phone" name="director_phone">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 pull-left">
                            <div class="form-group">
                                <label for="head_teacher_name">School Headteacher's Name</label>
                                <input type="text" class="form-control" id="head_teacher_name"
                                       placeholder="Enter School Headteacher's Name" name="head_teacher_name">
                            </div>
                        </div>
                        <div class="col-md-6 pull-right">
                            <div class="form-group">
                                <label for="head_teacher_phone">School Headteacher's Phone</label>
                                <input type="text" class="form-control" id="head_teacher_phone"
                                       placeholder="Enter School Headteacher's Phone" name="head_teacher_phone">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 pull-left">
                            <div class="form-group">
                                <label for="school_director">School Email(Optional)</label>
                                <input type="text" class="form-control" id="school_email"
                                       placeholder="Enter School Email" name="school_email">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="school_director">{{{ trans('main.education_level') }}}</label>
                                    <select name="education_level" class="form-control font-s" id="education_level">
                                        <option value="1">{{{ trans('main.education_level_one') }}}</option>
                                        <option value="2">{{{ trans('main.education_level_two') }}}</option>
                                        <option value="3">{{{ trans('main.education_level_three') }}}</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 pull-left">
                            <button type="submit" class="btn btn-primary btn-lg btn-block">Register</button>
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
