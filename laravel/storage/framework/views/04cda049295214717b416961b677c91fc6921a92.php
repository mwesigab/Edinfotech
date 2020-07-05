<?php echo $__env->make('view.layout.header',['title'=>'User Panel'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php if($user['vendor'] == 1): ?>
    <?php echo $__env->make('user.layout.menu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php else: ?>
    <?php echo $__env->make('user.layout_user.menu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php endif; ?>
<?php echo $__env->yieldContent('pages'); ?>
<?php echo $__env->make('user.layout.modals', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('view.layout.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
