
<?php $__env->startSection('title'); ?>
    <?php echo e(isset($setting['site']['site_title']) ? $setting['site']['site_title'] : ''); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page'); ?>
    <div class="container-fluid">
        <div class="h-20"></div>
        <div class="container">
            <div class="col-xs-12">
                <?php echo $content; ?>

            </div>
        </div>
        <div class="h-20"></div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('view.layout.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>