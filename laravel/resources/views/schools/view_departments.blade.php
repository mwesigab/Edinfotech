@extends('admin.newlayout.school_admin_layout',['breadcom'=>['Users','Rating','Admin Panel']])
@include('admin.layout.modals')
@section('title')
Departments List
@endsection
@section('page')
<section class="card">
    <header class="card-header">
        <div class="panel-actions">
            <a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
            <a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>
        </div>
        <h2 class="panel-title">Departments List</h2>
    </header>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-bordered table-striped mb-none m-b-0" id="datatable-details">
                <thead>
                <tr>
                    <th class="text-center">{{{ trans('admin.dept_name') }}}</th>
                    <th class="text-center">{{{ trans('admin.dept_head_name') }}}</th>
                    <th class="text-center">{{{ trans('admin.dept_head_phone') }}}</th>
                    <th class="text-center">{{{ trans('admin.dept_head_email') }}}</th>
                    <th class="text-center">{{{ trans('admin.dept_head_address') }}}</th>
                    <th class="text-center">{{{ trans('admin.reg_date') }}}</th>
                    <th class="text-center">{{{ trans('admin.badges_tab_courses_count') }}}</th>
                    <th class="text-center">{{{ trans('admin.th_status') }}}</th>
                    <th class="text-center">{{{ trans('admin.th_controls') }}}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($departments as $department)
                <tr>
                    <th class="text-center"><a target="_blank" href="/profile/{{{ $department->id }}}">{{{ $department->dept_name
                            }}}</a></th>
                    <th class="text-center">{{{ $department->dept_head_name }}}</th>
                    <th class="text-center">{{{ $department->dept_head_phone }}}</th>
                    <th class="text-center">{{{ $department->dept_head_email }}}</th>
                    <th class="text-center">{{{ $department->dept_head_address }}}</th>
                    <th class="text-center">{{{ $department->created_at }}}</th>
                    <th class="text-center"><a href="/admin/content/user/{{{ $department->id }}}">{{{ $department->contents_count or
                            0 }}}</a></th>
                    <th class="text-center">
                        @if($department->status == 'Active')
                        <span class="c-g">{{{ trans('admin.active') }}}</span>
                        @elseif($department->status == 'Deactive')
                        <span class="c-o">{{{ trans('admin.disabled') }}}</span>
                        @elseif($department->status == 'block')
                        <span class="c-r">{{{ trans('admin.banned') }}}</span>
                        @endif
                    </th>
                    <th class="text-center">
                        <a href="/admin/user/item/{{{ $department->id }}}" title="Edit"><i class="fa fa-edit"
                                                                                       aria-hidden="true"></i></a>
                        <a href="/admin/user/userlogin/{{{ $department->id }}}" title="Login as user" target="_blank"><i
                                    class="fa fa-user" aria-hidden="true"></i></a>
                        <a href="#" data-href="/admin/user/delete/{{{ $department->id }}}" title="Delete" data-toggle="modal"
                           data-target="#confirm-delete" class="c-r"><i class="fa fa-times" aria-hidden="true"></i></a>
                    </th>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection

