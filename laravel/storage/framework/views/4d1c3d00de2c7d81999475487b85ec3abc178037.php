<div class="container hidden-xs hidden-sm" id="anchor-animate">
    <div class="h-25"></div>
    <div class="row">
        <div class="col-xs-12 col-md-4 container-banner-section">
            <?php if(isset($ads)): ?>
                <?php $__currentLoopData = $ads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ad): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($ad->position == 'main-slider-side'): ?>
                        <a href="<?php echo e($ad ? $ad->url : '#'); ?>"><img src="<?php echo e($ad ? $ad->image : ''); ?>" class="<?php echo e($ad ? $ad->size : ''); ?>"></a>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </div>
        <div class="col-xs-12 col-md-8 parts-container">
            <?php if(!empty($slider_container)): ?>
                <?php $__currentLoopData = $slider_container; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slide): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if(isset($slide->content->metas)): ?>
                        <?php $slide_meta = arrayToList($slide->content->metas,'option','value'); ?>
                        <div class="parts-container-slide" id="slide<?php echo e($slide->content ? $slide->content->id : 0); ?>">
                        <div class="header">
                            <span><?php echo e(trans('main.featured')); ?></span>
                            <h2><a href="/product/<?php echo e($slide->content ? $slide->content->id : 0); ?>"><?php echo e($slide->content ? $slide->content->title : ''); ?></a></h2>
                        </div>
                        <div class="body-container">
                            <div class="row">
                                <div class="col-md-7">
                                    <img src="<?php echo e(isset($slide_meta['cover']) ? $slide_meta['cover'] : ''); ?>" class="img-responsive img-main-container img-con-r">
                                </div>
                                <div class="col-md-5 img-con-s">
                                    <div class="item-container">
                                        <div class="col-md-10 text-item">
                                            <span><?php echo e($slide ? $slide->description : ''); ?></span>
                                        </div>
                                        <div class="col-md-2">
                                            <span class="homeicon mdi mdi-comment"></span>
                                        </div>
                                    </div>
                                    <div class="item-container">
                                        <div class="col-md-10 timer-item">
                                            <label><?php echo e(isset($slide_meta['duration']) ? $slide_meta['duration'] : 0); ?> <?php echo e(trans('main.min')); ?></label>
                                        </div>
                                        <div class="col-md-2 ">
                                            <span class="homeicon mdi mdi-alarm"></span>
                                        </div>
                                    </div>
                                    <div class="item-container">
                                        <div class="col-md-10 price-item">
                                            <?php if(isset($slide_meta['price']) && $slide_meta['price']>0): ?>
                                                <label><?php echo e(currencySign()); ?> <?php echo e(isset($slide_meta['price']) ? $slide_meta['price'] : 0); ?></label>
                                            <?php else: ?>
                                                <label><?php echo e(trans('main.free_item')); ?></label>
                                            <?php endif; ?>
                                        </div>
                                        <div class="col-md-2">
                                            <span class="homeicon mdi mdi-wallet"></span>
                                        </div>
                                    </div>
                                    <div class="item-container">
                                        <div class="col-md-10 price-item profile-item">
                                            <label><a href="/profile/<?php echo e($slide->content->user ? $slide->content->user->id : 0); ?>" class="profile-s"><?php echo e($slide->content->user ? $slide->content->user->name : ''); ?></a></label>
                                        </div>
                                        <div class="col-md-2">
                                            <span class="homeicon mdi mdi-teach"></span>
                                        </div>
                                    </div>
                                    <div>
                                        <a href="/product/<?php echo e($slide->content ? $slide->content->id : 0); ?>" class="btn btn-container-more btn-container-more-s"><?php echo e(trans('main.view_product')); ?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
                <div class="col-xs-12">
                    <ul class="container-bullet">
                        <?php if(!empty($slider_container)): ?>
                            <?php $__currentLoopData = $slider_container; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index=>$slide): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li data-target="slide<?php echo e($slide->content ? $slide->content->id : 0); ?>" <?php if($index == 0): ?> class="active" <?php endif; ?>></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </ul>
                </div>
        </div>
        </div>
    <div class="h-25"></div>
</div>
<?php /**PATH D:\PRACTICE SESSIONS\PHP\Edtech\laravel\resources\views/view/parts/container.blade.php ENDPATH**/ ?>