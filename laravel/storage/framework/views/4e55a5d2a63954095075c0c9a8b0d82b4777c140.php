<?php $__env->startSection('title'); ?>
    <?php echo e(isset($setting['site']['site_title']) ? $setting['site']['site_title'] : ''); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page'); ?>

    <?php echo $__env->make('view.parts.slider', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->make('view.parts.container', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php if(isset($setting['site']['main_page_newest_container']) && $setting['site']['main_page_newest_container'] == 1): ?>
        <?php echo $__env->make('view.parts.newest', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php endif; ?>
    <?php if(isset($setting['site']['main_page_popular_container']) && $setting['site']['main_page_popular_container'] == 1): ?>
        <?php echo $__env->make('view.parts.popular', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php echo $__env->make('view.parts.most_sell', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php endif; ?>
    <?php if(isset($setting['site']['main_page_vip_container']) && $setting['site']['main_page_vip_container'] == 1): ?>
        <?php echo $__env->make('view.parts.vip', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php endif; ?>
    <?php echo $__env->make('view.parts.news', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('view.layout.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>