<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Admin Panel - @yield('title', '')</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="/assets/admin/modules/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/admin/modules/fontawesome/css/all.min.css">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="/assets/admin/modules/summernote/summernote-bs4.css">
    <link rel="stylesheet" href="/assets/admin/modules/select2/dist/css/select2.min.css">
    <link rel="stylesheet" href="/assets/admin/modules/jquery-selectric/selectric.css">
    <link rel="stylesheet" href="/assets/admin/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css">

    <!-- Template CSS -->
    <link rel="stylesheet" href="/assets/admin/css/style.css">
    <link rel="stylesheet" href="/assets/admin/css/components.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="/assets/stylesheets/admin-custom.css">
    <style>
        .custom-switch-input:checked ~ .custom-switch-description{
            position: relative;
            top: 4px;
        }
    </style>
    <!-- Start GA -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'UA-94034622-3');
    </script>
    <!-- /END GA --></head>

<body>
<div id="app">
    <div class="main-wrapper main-wrapper-1">
        <div class="navbar-bg"></div>
        <nav class="navbar navbar-expand-lg main-navbar">
            <form class="form-inline mr-auto">
                <ul class="navbar-nav mr-3">
                    <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
                    <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
                </ul>
            </form>
            <ul class="navbar-nav navbar-right">
                <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                        <img alt="image" src="/assets/admin/img/avatar/avatar-1.png" class="rounded-circle mr-1">
                        <div class="d-sm-none d-lg-inline-block">Hi, {!! $Admin['username'] or '' !!}</div></a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="/admin/profile" class="dropdown-item has-icon">
                            <i class="fas fa-user"></i> {!! trans('admin.profile') !!}
                        </a>
                        <a href="/admin/setting/main" class="dropdown-item has-icon">
                            <i class="fas fa-cog"></i> {!! trans('admin.settings') !!}
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="/admin/logout" class="dropdown-item has-icon text-danger">
                            <i class="fas fa-sign-out-alt"></i> {!! trans('admin.exit') !!}
                        </a>
                    </div>
                </li>
            </ul>
        </nav>
        <div class="main-sidebar sidebar-style-2">
            <aside id="sidebar-wrapper">
                <div class="sidebar-brand">
                    <a href="/admin">Admin Panel</a>
                </div>
                <div class="sidebar-brand sidebar-brand-sm">
                    <a href="/admin">AP</a>
                </div>
                <ul class="sidebar-menu">
                    <li class="menu-header">Dashboard</li>
                    <!--@if(checkAccess('report'))<li class="dropdown" id="report">
                        <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
                        <ul class="dropdown-menu">
                            <li><a class="nav-link" href="/admin/report/user">{{{  trans('admin.users_report') }}}</a></li>
                            <li><a class="nav-link" href="/admin/report/content">{{{  trans('admin.products_report') }}}</a></li>
                            <li><a class="nav-link" href="/admin/report/balance">{{{  trans('admin.financial_report') }}}</a></li>
                        </ul>
                    </li>@endif-->
                    <li class="menu-header">Content</li>
                    @if(checkAccess('content'))<li class="dropdown" id="content">
                        <a href="#" class="nav-link has-dropdown"><i class="fas fa-video"></i> <span>{{{  trans('admin.courses') }}}</span></a>
                        <ul class="dropdown-menu">
                            <li><a class="nav-link" href="/admin/content/list">{{{  trans('admin.list') }}}</a></li>
                            <li><a class="nav-link @if(isset($alert['content_waiting']) && $alert['content_waiting'] > 0) beep beep-sidebar @endif" href="/admin/content/waiting">{{{  trans('admin.pending_courses') }}}</a></li>
                            <li><a class="nav-link @if(isset($alert['content_draft']) && $alert['content_draft'] > 0) beep beep-sidebar @endif" href="/admin/content/draft">{{{  trans('admin.unpublished_courses') }}}</a></li>
                            <li><a class="nav-link" href="/admin/content/category">{{{  trans('admin.categories') }}}</a></li>
                            <li><a class="nav-link" href="/school/content">{{{  trans('main.upload_course') }}}</a></li>
                        </ul>
                    </li>@endif
                    @if(checkAccess('school'))<li class="dropdown" id="school">
                        <a href="#" class="nav-link has-dropdown"><i class="fas fa-eye"></i> <span>{{{  trans('admin.schools') }}}</span></a>
                        <ul class="dropdown-menu">
                            <li><a class="nav-link" href="/school/schools">{{{  trans('admin.school_list') }}}</a></li>
                            <li><a class="nav-link" href="/school">{{{  trans('admin.new_school') }}}</a></li>
                            <li><a class="nav-link" href="/school/students">{{{  trans('admin.student_list') }}}</a></li>
                            <li><a class="nav-link" href="/school/student_form">{{{  trans('admin.new_student') }}}</a></li>
                            <li><a class="nav-link" href="/school/departments">{{{  trans('admin.department_list') }}}</a></li>
                            <li><a class="nav-link" href="/school/department_form">{{{  trans('admin.new_sch_department') }}}</a></li>
                        </ul>
                </ul>
                </li>@endif
                <li>
                    <a href="/admin/about" class="nav-link"><i class="fas fa-info"></i> <span>{{{  trans('admin.about') }}}</span></a>
                </li>

                <li>
                    <a href="/admin/logout" class="nav-link"><i class="fas fa-sign-out-alt"></i> <span>{{{  trans('admin.exit') }}}</span></a>
                </li>
                </ul>
            </aside>
        </div>
        <div class="main-content">
            <div class="section">
                <div class="section-header">
                    <h1>@yield('title', '')</h1>
                    @if(isset($breadcom) && count($breadcom))
                    <div class="section-header-breadcrumb">
                        @foreach($breadcom as $bread)
                        <div class="breadcrumb-item">{!! $bread or '' !!}</div>
                        @endforeach
                    </div>
                    @endif
                </div>
                <div class="section-body">
                    @yield('page')
                </div>
            </div>
        </div>
        @include('admin.newlayout.modals')
        @yield('modals')
    </div>
</div>
<!-- General JS Scripts -->
<script src="/assets/admin/modules/jquery.min.js"></script>
<script src="/assets/admin/modules/popper.js"></script>
<script src="/assets/admin/modules/tooltip.js"></script>
<script src="/assets/admin/modules/bootstrap/js/bootstrap.min.js"></script>
<script src="/assets/admin/modules/nicescroll/jquery.nicescroll.min.js"></script>
<script src="/assets/admin/modules/moment.min.js"></script>
<script src="/assets/admin/js/stisla.js"></script>
<script src="/assets/admin/modules/cleave-js/dist/cleave.min.js"></script>
<script src="/assets/admin/modules/cleave-js/dist/addons/cleave-phone.us.js"></script>
<script src="/assets/admin/modules/jquery-pwstrength/jquery.pwstrength.min.js"></script>
<script src="/assets/admin/modules/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="/assets/admin/modules/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
<script src="/assets/admin/modules/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
<script src="/assets/admin/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
<script src="/assets/admin/modules/select2/dist/js/select2.full.min.js"></script>
<script src="/assets/admin/modules/jquery-selectric/jquery.selectric.min.js"></script>
<script src="/assets/admin/modules/jquery.sparkline.min.js"></script>
<script src="/assets/admin/modules/chart.min.js"></script>
<script src="/assets/admin/modules/jqvmap/dist/jquery.vmap.min.js"></script>
<script src="/assets/admin/modules/jqvmap/dist/maps/jquery.vmap.world.js"></script>
<script src="/assets/admin/modules/jqvmap/dist/maps/jquery.vmap.indonesia.js"></script>
<script src="/assets/admin/modules/datatables/datatables.min.js"></script>
<script src="/assets/admin/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script src="/assets/admin/modules/datatables/Select-1.2.4/js/dataTables.select.min.js"></script>
<script src="/assets/admin/modules/jquery-ui/jquery-ui.min.js"></script>
<script src="/assets/admin/modules/summernote/summernote-bs4.js"></script>
<script src="/assets/admin/modules/jquery-selectric/jquery.selectric.min.js"></script>
<script src="/assets/admin/modules/upload-preview/assets/js/jquery.uploadPreview.min.js"></script>
<script src="/assets/admin/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
<script src="/assets/admin/modules/select2/dist/js/select2.full.min.js"></script>
<script src="/assets/admin/modules/jquery-selectric/jquery.selectric.min.js"></script>
<script src="/assets/admin/js/scripts.js"></script>
<script src="/assets/admin/js/custom.js"></script>
<script>
    @if(isset($menu))
    $(function () {
        $('#{!! $menu !!}').addClass('active');
    });
    @endif
    @if(isset($url))
    $(function () {
        $('.nav-link').each(function () {
            if('{!! url('/') !!}'+$(this).attr('href') == '{!! $url !!}'){
                $(this).parent().addClass('active');
            }
        })
    });
    @endif
</script>
@yield('script')
</body>
</html>
