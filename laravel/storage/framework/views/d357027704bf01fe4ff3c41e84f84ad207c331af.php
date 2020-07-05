<?php echo $__env->make('view.layout.header',['title'=>'User Panel'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('user.layout_user.menu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->startSection('title','User Panel'); ?>
<div class="h-20"></div>
<div class="container-fluid">
    <div class="container">
        <div class="col-md-12 col-xs-12">
            <div class="tab-content">
                    <div class="active tab-pane fade in" id="tab1">
                        <?php echo $__env->yieldContent('tab'); ?>
                    </div>
            </div>
        </div>
    </div>
</div>


<?php $__env->startSection('script'); ?>
    <script>$('#balance-hover').addClass('item-box-active');</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.layout.modals', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('view.layout.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
