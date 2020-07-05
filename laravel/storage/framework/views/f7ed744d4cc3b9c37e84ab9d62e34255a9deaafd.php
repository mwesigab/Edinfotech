<?php echo $__env->make('admin.layout.modals', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->startSection('title'); ?>
Departments List
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page'); ?>
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
                    <th class="text-center"><?php echo e(trans('admin.dept_name')); ?></th>
                    <th class="text-center"><?php echo e(trans('admin.dept_head_name')); ?></th>
                    <th class="text-center"><?php echo e(trans('admin.dept_head_phone')); ?></th>
                    <th class="text-center"><?php echo e(trans('admin.dept_head_email')); ?></th>
                    <th class="text-center"><?php echo e(trans('admin.dept_head_address')); ?></th>
                    <th class="text-center"><?php echo e(trans('admin.reg_date')); ?></th>
                    <th class="text-center"><?php echo e(trans('admin.badges_tab_courses_count')); ?></th>
                    <th class="text-center"><?php echo e(trans('admin.th_status')); ?></th>
                    <th class="text-center"><?php echo e(trans('admin.th_controls')); ?></th>
                </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <th class="text-center"><a target="_blank" href="/profile/<?php echo e($department->id); ?>"><?php echo e($department->dept_name); ?></a></th>
                    <th class="text-center"><?php echo e($department->dept_head_name); ?></th>
                    <th class="text-center"><?php echo e($department->dept_head_phone); ?></th>
                    <th class="text-center"><?php echo e($department->dept_head_email); ?></th>
                    <th class="text-center"><?php echo e($department->dept_head_address); ?></th>
                    <th class="text-center"><?php echo e($department->created_at); ?></th>
                    <th class="text-center"><a href="/admin/content/user/<?php echo e($department->id); ?>"><?php echo e(isset($department->contents_count) ? $department->contents_count : 0); ?></a></th>
                    <th class="text-center">
                        <?php if($department->status == 'Active'): ?>
                        <span class="c-g"><?php echo e(trans('admin.active')); ?></span>
                        <?php elseif($department->status == 'Deactive'): ?>
                        <span class="c-o"><?php echo e(trans('admin.disabled')); ?></span>
                        <?php elseif($department->status == 'block'): ?>
                        <span class="c-r"><?php echo e(trans('admin.banned')); ?></span>
                        <?php endif; ?>
                    </th>
                    <th class="text-center">
                        <a href="/admin/user/item/<?php echo e($department->id); ?>" title="Edit"><i class="fa fa-edit"
                                                                                       aria-hidden="true"></i></a>
                        <a href="/admin/user/userlogin/<?php echo e($department->id); ?>" title="Login as user" target="_blank"><i
                                    class="fa fa-user" aria-hidden="true"></i></a>
                        <a href="#" data-href="/admin/user/delete/<?php echo e($department->id); ?>" title="Delete" data-toggle="modal"
                           data-target="#confirm-delete" class="c-r"><i class="fa fa-times" aria-hidden="true"></i></a>
                    </th>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.newlayout.school_admin_layout',['breadcom'=>['Users','Rating','Admin Panel']], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>