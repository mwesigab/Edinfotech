<?php $__env->startSection('title'); ?>
<?php echo e(isset($setting['site']['site_title']) ? $setting['site']['site_title'] : 'Website Title'); ?>

<?php echo e(trans('main.user_login')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page'); ?>
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
                                <label for="department_name">Department Name</label>
                                <input type="text" class="form-control" id="department_name"
                                       placeholder="Enter Department Name">
                            </div>
                        </div>
                        <div class="col-md-6 pull-right">
                            <div class="form-group">
                                <label for="department_head">Head Of Department's Name</label>
                                <input type="text" class="form-control" id="department_head"
                                       placeholder="Enter Head Of Department's Name">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 pull-left">
                            <div class="form-group">
                                <label for="department_phone">Head Of Department's Phone</label>
                                <input type="text" class="form-control" id="department_phone"
                                       placeholder="Enter Head Of Department's Phone">
                            </div>
                        </div>
                        <div class="col-md-6 pull-right">
                            <div class="form-group">
                                <label for="department_address">Head Of Department's Address</label>
                                <input type="text" class="form-control" id="department_address"
                                       placeholder="Enter Head Of Department's Address">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 pull-left">
                            <div class="form-group">
                                <label for="department_email">Head Of Department's Email(Optional)</label>
                                <input type="text" class="form-control" id="department_email"
                                       placeholder="Enter Head Of Department's Email">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 pull-left">
                            <button type="button" class="btn btn-primary btn-lg btn-block">SUBMIT</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="h-25"></div>
            <div class="card-footer text-muted">
                It's okay, we shall not share your school details with anyone else not directly or indirectly
                affiliated to your school.
            </div>
        </div>
    </div>
    <div class="h-25"></div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('view.layout.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>