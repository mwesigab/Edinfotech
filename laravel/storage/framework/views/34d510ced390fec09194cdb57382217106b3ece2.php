<div class="container-fluid newest-container">
        <div class="container">
            <div class="row">
                <div class="header">
                    <span class="popular pull-left feat-s"><?php echo trans('main.featured'); ?></span>
					<a href="/category" class="more-link pull-right"><?php echo e(trans('main.load_more')); ?></a>
                </div>
                <div class="body body-s-r" dir="ltr">
                    <span class="nav-right"></span>
                    <div class="owl-carousel">
                    <?php $__currentLoopData = $vip_content; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $content): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php $popular = $content->content; ?>
                        <?php if(isset($popular->metas)): ?>
                            <?php $meta = arrayToList($popular->metas,'option','value'); ?>
                            <div class="owl-car-s" dir="rtl">
                                <a href="/product/<?php echo e(isset($popular->id) ? $popular->id : ''); ?>" title="<?php echo e(isset($popular->title) ? $popular->title : ''); ?>" class="content-box">

                                    <span></span>
                                    <img src="<?php echo e(isset($meta['thumbnail']) ? $meta['thumbnail'] : ''); ?>"/>
									<h3><?php echo str_limit($popular->title,30,'...'); ?></h3>
                                    <div class="footer">
                                        <span class="avatar" title="<?php echo e(isset($popular->user->name) ? $popular->user->name : ''); ?>" onclick="window.location.href = '/profile/<?php echo e(isset($popular->user->id) ? $popular->user->id : 0); ?>'"><img src="<?php echo e(get_user_meta($popular->user_id,'avatar',get_option('default_user_avatar',''))); ?>"></span>
                                        <label class="pull-right content-clock"><?php if(isset($meta['duration'])): ?><?php echo e(convertToHoursMins($meta['duration'])); ?><?php else: ?> <?php echo e(trans('main.not_defined')); ?> <?php endif; ?> </label>
										<span class="boxicon mdi mdi-clock pull-right"></span>
										<span class="boxicon mdi mdi-wallet pull-left"></span>
                                        <label class="pull-left"><?php if(isset($meta['price']) && $meta['price']>0): ?> <?php echo currencySign(); ?><?php echo e(price($popular->id,$popular->category_id,$meta['price'])['price']); ?> <?php else: ?> <?php echo e(trans('main.free')); ?> <?php endif; ?></label>
                                    </div>
                                </a>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <span class="nav-left pull-right"></span>
                </div>
            </div>
        </div>
</div>
