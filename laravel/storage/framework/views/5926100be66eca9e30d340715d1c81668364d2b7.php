<?php echo $__env->make('admin.layout.modals', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->startSection('title'); ?>
Schools List
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page'); ?>
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
                    <th class="text-center"><?php echo e(trans('admin.school_name')); ?></th>
                    <th class="text-center"><?php echo e(trans('admin.reg_date')); ?></th>
                    <th class="text-center" width="100"><?php echo e(trans('admin.income')); ?></th>
                    <th class="text-center" width="100"><?php echo e(trans('admin.account_balance')); ?></th>
                    <th class="text-center"><?php echo e(trans('admin.badges_tab_courses_count')); ?></th>
                    <th class="text-center"><?php echo e(trans('admin.purchases')); ?></th>
                    <th class="text-center"><?php echo e(trans('admin.sales')); ?></th>
                    <th class="text-center"><?php echo e(trans('admin.th_status')); ?></th>
                    <th class="text-center"><?php echo e(trans('admin.th_controls')); ?></th>
                </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $schools; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $school): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <th class="text-center"><a target="_blank" href="/profile/<?php echo e($school->id); ?>"><?php echo e($school->school_name); ?></a></th>
                    <th class="text-center"><?php echo e(date('d F Y / H:i',$school->create_at)); ?></th>
                    <th class="text-center number-green" width="100" <?php if($school->income<0): ?> style="color:red !important;"
                        <?php endif; ?> dir="ltr"><?php echo e(number_format($school->income)); ?>

                    </th>
                    <th class="text-center number-green" width="100" <?php if($school->credit<0): ?> style="color:red !important;"
                        <?php endif; ?> dir="ltr"><?php echo e(number_format($school->credit)); ?>

                    </th>
                    <th class="text-center"><a href="/admin/content/user/<?php echo e($school->id); ?>"><?php echo e(isset($school->contents_count) ? $school->contents_count : 0); ?></a></th>
                    <th class="text-center"><a href="/admin/buysell/list/?buyer=<?php echo e($school->id); ?>"><?php echo e(isset($school->buys_count) ? $school->buys_count : 0); ?></a></th>
                    <th class="text-center"><a href="/admin/buysell/list/?user=<?php echo e($school->id); ?>"><?php echo e(isset($school->sells_count) ? $school->sells_count : 0); ?></a></th>
                    <th class="text-center">
                        <?php if($school->status == 'Active'): ?>
                        <span class="c-g"><?php echo e(trans('admin.active')); ?></span>
                        <?php elseif($school->status == 'Deactive'): ?>
                        <span class="c-o"><?php echo e(trans('admin.disabled')); ?></span>
                        <?php elseif($school->status == 'block'): ?>
                        <span class="c-r"><?php echo e(trans('admin.banned')); ?></span>
                        <?php endif; ?>
                    </th>
                    <th class="text-center">
                        <a href="/admin/user/item/<?php echo e($school->id); ?>" title="Edit"><i class="fa fa-edit"
                                                                                     aria-hidden="true"></i></a>
                        <a href="/admin/user/userlogin/<?php echo e($school->id); ?>" title="Login as user" target="_blank"><i
                                    class="fa fa-user" aria-hidden="true"></i></a>
                        <a href="#" data-href="/admin/user/delete/<?php echo e($school->id); ?>" title="Delete" data-toggle="modal"
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