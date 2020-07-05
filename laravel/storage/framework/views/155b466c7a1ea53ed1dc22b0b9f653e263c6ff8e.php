<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Admin Panel - <?php echo $__env->yieldContent('title', ''); ?></title>

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
                        <div class="d-sm-none d-lg-inline-block">Hi, <?php echo isset($Admin['username']) ? $Admin['username'] : ''; ?></div></a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="/admin/profile" class="dropdown-item has-icon">
                            <i class="fas fa-user"></i> <?php echo trans('admin.profile'); ?>

                        </a>
                        <a href="/admin/setting/main" class="dropdown-item has-icon">
                            <i class="fas fa-cog"></i> <?php echo trans('admin.settings'); ?>

                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="/admin/logout" class="dropdown-item has-icon text-danger">
                            <i class="fas fa-sign-out-alt"></i> <?php echo trans('admin.exit'); ?>

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
                    <!--<?php if(checkAccess('report')): ?><li class="dropdown" id="report">
                        <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
                        <ul class="dropdown-menu">
                            <li><a class="nav-link" href="/admin/report/user"><?php echo e(trans('admin.users_report')); ?></a></li>
                            <li><a class="nav-link" href="/admin/report/content"><?php echo e(trans('admin.products_report')); ?></a></li>
                            <li><a class="nav-link" href="/admin/report/balance"><?php echo e(trans('admin.financial_report')); ?></a></li>
                        </ul>
                    </li><?php endif; ?>-->
                    <li class="menu-header">Content</li>
                    <?php if(checkAccess('content')): ?><li class="dropdown" id="content">
                        <a href="#" class="nav-link has-dropdown"><i class="fas fa-video"></i> <span><?php echo e(trans('admin.courses')); ?></span></a>
                        <ul class="dropdown-menu">
                            <li><a class="nav-link" href="/admin/content/list"><?php echo e(trans('admin.list')); ?></a></li>
                            <li><a class="nav-link <?php if(isset($alert['content_waiting']) && $alert['content_waiting'] > 0): ?> beep beep-sidebar <?php endif; ?>" href="/admin/content/waiting"><?php echo e(trans('admin.pending_courses')); ?></a></li>
                            <li><a class="nav-link <?php if(isset($alert['content_draft']) && $alert['content_draft'] > 0): ?> beep beep-sidebar <?php endif; ?>" href="/admin/content/draft"><?php echo e(trans('admin.unpublished_courses')); ?></a></li>
                            <li><a class="nav-link" href="/admin/content/category"><?php echo e(trans('admin.categories')); ?></a></li>
                            <li><a class="nav-link" href="/school/content"><?php echo e(trans('main.upload_course')); ?></a></li>
                        </ul>
                    </li><?php endif; ?>
                    <?php if(checkAccess('school')): ?><li class="dropdown" id="school">
                        <a href="#" class="nav-link has-dropdown"><i class="fas fa-eye"></i> <span><?php echo e(trans('admin.schools')); ?></span></a>
                        <ul class="dropdown-menu">
                            <li><a class="nav-link" href="/school/schools"><?php echo e(trans('admin.school_list')); ?></a></li>
                            <li><a class="nav-link" href="/school"><?php echo e(trans('admin.new_school')); ?></a></li>
                            <li><a class="nav-link" href="/school/students"><?php echo e(trans('admin.student_list')); ?></a></li>
                            <li><a class="nav-link" href="/school/student_form"><?php echo e(trans('admin.new_student')); ?></a></li>
                            <li><a class="nav-link" href="/school/departments"><?php echo e(trans('admin.department_list')); ?></a></li>
                            <li><a class="nav-link" href="/school/department_form"><?php echo e(trans('admin.new_sch_department')); ?></a></li>
                        </ul>
                </ul>
                </li><?php endif; ?>
                <li>
                    <a href="/admin/about" class="nav-link"><i class="fas fa-info"></i> <span><?php echo e(trans('admin.about')); ?></span></a>
                </li>

                <li>
                    <a href="/admin/logout" class="nav-link"><i class="fas fa-sign-out-alt"></i> <span><?php echo e(trans('admin.exit')); ?></span></a>
                </li>
                </ul>
            </aside>
        </div>
        <div class="main-content">
            <div class="section">
                <div class="section-header">
                    <h1><?php echo $__env->yieldContent('title', ''); ?></h1>
                    <?php if(isset($breadcom) && count($breadcom)): ?>
                    <div class="section-header-breadcrumb">
                        <?php $__currentLoopData = $breadcom; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bread): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="breadcrumb-item"><?php echo isset($bread) ? $bread : ''; ?></div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <?php endif; ?>
                </div>
                <div class="section-body">
                    <?php echo $__env->yieldContent('page'); ?>
                </div>
            </div>
        </div>
        <?php echo $__env->make('admin.newlayout.modals', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php echo $__env->yieldContent('modals'); ?>
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
    <?php if(isset($menu)): ?>
    $(function () {
        $('#<?php echo $menu; ?>').addClass('active');
    });
    <?php endif; ?>
    <?php if(isset($url)): ?>
    $(function () {
        $('.nav-link').each(function () {
            if('<?php echo url('/'); ?>'+$(this).attr('href') == '<?php echo $url; ?>'){
                $(this).parent().addClass('active');
            }
        })
    });
    <?php endif; ?>
</script>
<?php echo $__env->yieldContent('script'); ?>
</body>
</html>
