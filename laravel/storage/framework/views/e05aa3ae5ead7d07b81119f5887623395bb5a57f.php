<div class="container-fluid newest-container">
        <div class="container">
            <div class="row">
                <div class="header">
                    <span class="pull-left"><?php echo e(trans('main.most_sold_products')); ?></span>
                    <a href="/category?order=sell" class="more-link pull-right"><?php echo e(trans('main.load_more')); ?></a>
                </div>
                <div class="body body-s-r"  dir="ltr">
                    <span class="nav-right"></span>
                    <div class="owl-carousel">
                        <?php $__currentLoopData = $sell_content; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $new): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php $meta = arrayToList($new->metas,'option','value'); ?>
                            <div class="owl-car-s" dir="rtl">
                                <a href="/product/<?php echo e($new->id); ?>" title="<?php echo e($new->title); ?>" class="content-box">
                                    <img src="<?php echo e(isset($meta['thumbnail']) ? $meta['thumbnail'] : ''); ?>"/>
									<h3><?php echo str_limit($new->title,30,'...'); ?></h3>
                                    <div class="footer">
                                        <span class="avatar" title="<?php echo e($new->user ? $new->user->name : ''); ?>" onclick="window.location.href = '/profile/<?php echo e($new->user ? $new->user->id : 0); ?>'"><img src="<?php echo e(get_user_meta($new->user_id,'avatar',get_option('default_user_avatar',''))); ?>"></span>
                                        <label class="pull-right"><?php if(isset($meta['duration'])): ?><?php echo e(convertToHoursMins($meta['duration'])); ?><?php else: ?> <?php echo e(trans('main.not_defined')); ?> <?php endif; ?> </label>
										<span class="boxicon mdi mdi-clock pull-right"></span>
										<span class="boxicon mdi mdi-wallet pull-left"></span>
                                        <label class="pull-left"><?php if(isset($meta['price']) && $meta['price']>0): ?> <?php echo e(currencySign()); ?> <?php echo e(price($new->id,$new->category_id,$meta['price'])['price']); ?> <?php else: ?> <?php echo e(trans('main.free')); ?> <?php endif; ?></label>


                                    </div>
                                </a>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <span class="nav-left pull-right"></span>
                </div>
            </div>
        </div>
</div>
<?php /**PATH D:\PRACTICE SESSIONS\PHP\Edtech\laravel\resources\views/view/parts/most_sell.blade.php ENDPATH**/ ?>