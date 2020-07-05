<?php echo $__env->make('view.layout.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php echo $__env->yieldContent('page'); ?>

<?php echo $__env->make('view.layout.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>