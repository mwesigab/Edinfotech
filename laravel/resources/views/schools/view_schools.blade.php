@extends('admin.newlayout.school_admin_layout',['breadcom'=>['Users','Rating','Admin Panel']])
@include('admin.layout.modals')
@section('title')
Schools List
@endsection
@section('page')
<section class="card">
    <header class="card-header">
        <div class="panel-actions">
            <a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
            <a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>
        </div>
        <h2 class="panel-title">Schools List</h2>
    </header>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-bordered table-striped mb-none m-b-0" id="datatable-details">
                <thead>
                <tr>
                    <th class="text-center">{{{ trans('admin.school_name') }}}</th>
                    <th class="text-center">{{{ trans('admin.reg_date') }}}</th>
                    <th class="text-center" width="100">{{{ trans('admin.income') }}}</th>
                    <th class="text-center" width="100">{{{ trans('admin.account_balance') }}}</th>
                    <th class="text-center">{{{ trans('admin.badges_tab_courses_count') }}}</th>
                    <th class="text-center">{{{ trans('admin.purchases') }}}</th>
                    <th class="text-center">{{{ trans('admin.sales') }}}</th>
                    <th class="text-center">{{{ trans('admin.th_status') }}}</th>
                    <th class="text-center">{{{ trans('admin.th_controls') }}}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($schools as $school)
                <tr>
                    <th class="text-center"><a target="_blank" href="/profile/{{{ $school->id }}}">{{{ $school->school_name
                            }}}</a></th>
                    <th class="text-center">{{{ date('d F Y / H:i',$school->create_at) }}}</th>
                    <th class="text-center number-green" width="100" @if($school->income<0) style="color:red !important;"
                        @endif dir="ltr">{{{ number_format($school->income) }}}
                    </th>
                    <th class="text-center number-green" width="100" @if($school->credit<0) style="color:red !important;"
                        @endif dir="ltr">{{{ number_format($school->credit) }}}
                    </th>
                    <th class="text-center"><a href="/admin/content/user/{{{ $school->id }}}">{{{ $school->contents_count ??
                            0 }}}</a></th>
                    <th class="text-center"><a href="/admin/buysell/list/?buyer={{{ $school->id }}}">{{{ $school->buys_count
                            ?? 0 }}}</a></th>
                    <th class="text-center"><a href="/admin/buysell/list/?user={{{ $school->id }}}">{{{ $school->sells_count
                            ?? 0 }}}</a></th>
                    <th class="text-center">
                        @if($school->status == 'Active')
                        <span class="c-g">{{{ trans('admin.active') }}}</span>
                        @elseif($school->status == 'Deactive')
                        <span class="c-o">{{{ trans('admin.disabled') }}}</span>
                        @elseif($school->status == 'block')
                        <span class="c-r">{{{ trans('admin.banned') }}}</span>
                        @endif
                    </th>
                    <th class="text-center">
                        <a href="/admin/user/item/{{{ $school->id }}}" title="Edit"><i class="fa fa-edit"
                                                                                     aria-hidden="true"></i></a>
                        <a href="/admin/user/userlogin/{{{ $school->id }}}" title="Login as user" target="_blank"><i
                                    class="fa fa-user" aria-hidden="true"></i></a>
                        <a href="#" data-href="/admin/user/delete/{{{ $school->id }}}" title="Delete" data-toggle="modal"
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

