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
                                    <?php $__currentLoopData = $schools; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $school): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($school->id); ?>"><?php echo e($school->school_name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 pull-left">
                            <div class="form-group">
                                <label for="student_class">Class</label>
                                <input type="text" class="form-control" id="student_class"
                                       placeholder="Enter Student's Class" name="student_class">
                            </div>
                        </div>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.newlayout.school_admin_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>