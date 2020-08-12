
<?php $__env->startSection('title'); ?>
    <?php echo e($setting['site']['site_title'] ?? ''); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page'); ?>

    <?php echo $__env->make('view.parts.slider', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('view.parts.container', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php if(isset($setting['site']['main_page_newest_container']) && $setting['site']['main_page_newest_container'] == 1): ?>
        <?php echo $__env->make('view.parts.newest', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
    <?php if(isset($setting['site']['main_page_popular_container']) && $setting['site']['main_page_popular_container'] == 1): ?>
        <?php echo $__env->make('view.parts.popular', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('view.parts.most_sell', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
    <?php if(isset($setting['site']['main_page_vip_container']) && $setting['site']['main_page_vip_container'] == 1): ?>
        <?php echo $__env->make('view.parts.vip', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
    <?php echo $__env->make('view.parts.news', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('view.layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\PRACTICE SESSIONS\PHP\Edtech\laravel\resources\views/view/main.blade.php ENDPATH**/ ?>