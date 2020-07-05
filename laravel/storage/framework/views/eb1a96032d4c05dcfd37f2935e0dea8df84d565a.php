<?php echo $__env->make('view.layout.header',['title'=>'User Panel'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('user.layout.menu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->startSection('title','Courses'); ?>
<div class="h-20"></div>
<div class="container-fluid">
    <div class="container">
        <div class="col-md-12 col-xs-12">
            <ul class="nav nav-tabs nav-justified panel-tabs" role="tablist">
                <li class="<?php echo $__env->yieldContent('tab1'); ?>"><a href="/user/content">
                        <span class="submicon mdi mdi-library-movie"></span>
                       <?php echo e(trans('main.my_courses')); ?>

                    </a></li>
                <li class="<?php echo $__env->yieldContent('tab2'); ?>"><a href="/user/video/buy">
                        <span class="submicon mdi mdi-cloud-download"></span>
                        <?php echo e(trans('main.my_purchases')); ?>

                    </a></li>
                <li class="<?php echo $__env->yieldContent('tab3'); ?>"><a href="/user/video/record">
                        <span class="submicon mdi mdi-video"></span>
                        <?php echo e(trans('main.future_courses')); ?>

                    </a></li>
                <li class="<?php echo $__env->yieldContent('tab4'); ?>"><a href="/user/video/off">
                        <span class="submicon mdi mdi-sale"></span>
                        <?php echo e(trans('main.discounts')); ?>

                    </a></li>
                <li class="<?php echo $__env->yieldContent('tab5'); ?>"><a href="/user/video/promotion">
                        <span class="submicon mdi mdi-rocket"></span>
                        <?php echo e(trans('main.promotions')); ?>

                    </a></li>
                <li class="<?php echo $__env->yieldContent('tab6'); ?>"><a href="/user/video/request">
                        <span class="submicon mdi mdi-camera-enhance"></span>
                        <?php echo e(trans('main.requests')); ?></a></li>
            </ul>
            <div class="tab-content">
                    <div class="active tab-pane fade in" id="tab1">
                        <?php echo $__env->yieldContent('tab'); ?>
                    </div>
            </div>
        </div>
    </div>
</div>


<?php $__env->startSection('script'); ?>
    <script>$('#buy-hover').addClass('item-box-active');</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.layout.modals', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('view.layout.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
