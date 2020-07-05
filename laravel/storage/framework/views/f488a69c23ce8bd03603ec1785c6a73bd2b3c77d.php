<?php $__env->startSection('page'); ?>
<div class="login-s">
    <div class="h-25"></div>
    <div class="h-25"></div>
    <div class="container">
        <div class="card mx-auto" style="width: 780px;margin: 0 auto;float: none;margin-bottom: 10px;">
            <div class="card-header text-center">
                <h3>Add Department</h3>
            </div>
            <div class="card-body">
                <form action="/school/add_department" method="post">
                    <div class="row">
                        <div class="col-md-6 pull-left">
                            <div class="form-group">
                                <label for="dept_name">Department Name</label>
                                <input type="text" class="form-control" id="dept_name"
                                       placeholder="Enter Department Name" name="dept_name">
                            </div>
                        </div>
                        <div class="col-md-6 pull-right">
                            <div class="form-group">
                                <label for="dept_head_name">Head Of Department's Name</label>
                                <input type="text" class="form-control" id="dept_head_name"
                                       placeholder="Last Name   FirstName" name="dept_head_name">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 pull-left">
                            <div class="form-group">
                                <label for="dept_head_phone">Head Of Department's Phone</label>
                                <input type="text" class="form-control" id="dept_head_phone"
                                       placeholder="Enter Head Of Department's Phone" name="dept_head_phone">
                            </div>
                        </div>
                        <div class="col-md-6 pull-right">
                            <div class="form-group">
                                <label for="dept_head_address">Head Of Department's Address</label>
                                <input type="text" class="form-control" id="dept_head_address"
                                       placeholder="Enter Head Of Department's Address" name="dept_head_address">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 pull-left">
                            <div class="form-group">
                                <label for="dept_head_email">Head Of Department's Email(Optional)</label>
                                <input type="text" class="form-control" id="dept_head_email"
                                       placeholder="Enter Head Of Department's Email" name="dept_head_email">
                            </div>
                        </div>
                        <div class="col-md-6 pull-left">
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
                            <button type="submit" class="btn btn-primary btn-lg btn-block">SUBMIT</button>
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

<?php echo $__env->make('admin.newlayout.school_admin_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>