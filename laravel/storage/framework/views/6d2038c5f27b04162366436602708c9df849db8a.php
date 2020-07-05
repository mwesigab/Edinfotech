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
                <h3>Register your school</h3>
            </div>
            <div class="card-body">
                <form action="/school/register" method="post">
                    <div class="row">
                        <div class="col-md-6 pull-left">
                            <div class="form-group">
                                <label for="school_name">School Name</label>
                                <input type="text" class="form-control" id="school_name"
                                       placeholder="Enter School Name">
                            </div>
                        </div>
                        <div class="col-md-6 pull-right">
                            <div class="form-group">
                                <label for="school_address">School Address</label>
                                <input type="text" class="form-control" id="school_address"
                                       placeholder="Enter School Address">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 pull-left">
                            <div class="form-group">
                                <label for="school_director">School Director's Name</label>
                                <input type="text" class="form-control" id="school_director"
                                       placeholder="Enter School Director's Name">
                            </div>
                        </div>
                        <div class="col-md-6 pull-right">
                            <div class="form-group">
                                <label for="school_director_phone">School Director's Phone</label>
                                <input type="text" class="form-control" id="school_director_phone"
                                       placeholder="Enter School Director's Phone">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 pull-left">
                            <div class="form-group">
                                <label for="school_director">School Headteacher's Name</label>
                                <input type="text" class="form-control" id="school_director"
                                       placeholder="Enter School Headteacher's Name">
                            </div>
                        </div>
                        <div class="col-md-6 pull-right">
                            <div class="form-group">
                                <label for="school_head_phone">School Headteacher's Phone</label>
                                <input type="text" class="form-control" id="school_head_phone"
                                       placeholder="Enter School Headteacher's Phone">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 pull-left">
                            <div class="form-group">
                                <label for="school_director">School Email(Optional)</label>
                                <input type="text" class="form-control" id="school_email"
                                       placeholder="Enter School Email">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 pull-left">
                            <button type="button" class="btn btn-primary btn-lg btn-block">Register</button>
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