@extends('admin.newlayout.layout',['breadcom'=>['Students','Upload']])
@include('admin.layout.modals')
@section('title')
Students Upload
@endsection
@section('page')
<div class="login-s">
    <div class="h-25"></div>
    <div class="h-25"></div>
    <div class="container">
        <div class="card mx-auto" style="width: 780px;margin: 0 auto;float: none;margin-bottom: 10px;">
            <div class="card-header text-center">
                <h3>Upload Students</h3>
            </div>
            <div class="card-body">
                <form action="/admin/school/students_import" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6 pull-left">
                            <div class="form-group">
                                <label for="student_excel">Select File</label>
                                <input type="file" class="form-control" name="student_excel" id="student_excel" >
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
                        <div class="col-md-6 pull-left">
                            <button type="submit" class="btn btn-primary btn-lg btn-block">SUBMIT</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</section>
@endsection
