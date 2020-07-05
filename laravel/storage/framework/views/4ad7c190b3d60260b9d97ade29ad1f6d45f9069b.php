<?php $__env->startSection('title'); ?>
    <?php echo e(get_option('site_title','')); ?> - <?php echo e(isset($category->title) ? $category->title : 'Categories'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page'); ?>

    <div class="container-fluid">
        <div class="row cat-search-section cat-search-section-s">
            <div class="container">
                <div class="col-md-4 col-sm-6 col-xs-12 cat-icon-container">
                </div>
                <div class="col-md-4">
                    <div class="h-10"></div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="box box-s">
                        <div class="container-2">
                            <form>
                            <input type="search" id="search" name="q" value="<?php echo e(isset($_GET['q']) ? $_GET['q'] : ''); ?>" placeholder=" <?php echo e(isset($category->title) ? $category->title : 'Search in all categories'); ?>" />
                            <span class="icon"><i class="homeicon mdi mdi-magnify"></i></span>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row cat-tag-section">
            <div class="container">
                <div class="col-md-2 col-xs-12 tab-con">
                    <div class="btn-group" data-toggle="buttons">
                        <label class="btn btn-primary <?php if($pricing == 'all' || $pricing == ''): ?> active <?php endif; ?>">
                            <input type="radio" name="pricing" value="all" <?php if($pricing == 'all' || $pricing == ''): ?> checked <?php endif; ?>> <?php echo e(trans('main.all')); ?>

                        </label>
                        <label class="btn btn-primary <?php if($pricing == 'free'): ?> active <?php endif; ?>">
                            <input type="radio" name="pricing" value="free" <?php if($pricing == 'free'): ?> checked <?php endif; ?>> <?php echo e(trans('main.free')); ?>

                        </label>
                        <label class="btn btn-primary <?php if($pricing == 'price'): ?> active <?php endif; ?>">
                            <input type="radio" name="pricing" value="price" <?php if($pricing == 'price'): ?> checked <?php endif; ?>> <?php echo e(trans('main.paid')); ?>

                        </label>
                    </div>
                </div>
                <div class="col-md-3 col-xs-12 tab-con">
                    <div class="btn-group" data-toggle="buttons">
                        <label class="btn btn-primary <?php if($course == 'all' || $course == ''): ?> active <?php endif; ?>">
                            <input type="radio" name="course" value="all" <?php if($course == 'all' || $course == ''): ?> checked <?php endif; ?>> <?php echo e(trans('main.all')); ?>

                        </label>
                        <label class="btn btn-primary <?php if($course == 'multi'): ?> active <?php endif; ?>">
                            <input type="radio" name="course" value="multi" <?php if($course == 'multi'): ?> checked <?php endif; ?>> <?php echo e(trans('main.course')); ?>

                        </label>
                        <label class="btn btn-primary <?php if($course == 'one'): ?> active <?php endif; ?>">
                            <input type="radio" name="course" value="one" <?php if($course == 'one'): ?> active <?php endif; ?>> <?php echo e(trans('main.single')); ?>

                        </label>
                    </div>
                </div>
                <div class="col-md-5 col-xs-12 text-left tab-con">
                    <div class="form-group">
                        <label class="control-label cont-lab-s" for="inputDefault"><?php echo e(trans('main.postal_delivery')); ?></label>
                        <div class="switch switch-sm switch-primary sw-prim-s">
                            <input type="hidden" value="0" name="post-sell">
                            <input type="checkbox" name="post-sell" value="1" <?php if(isset($_GET['post-sell']) && $_GET['post-sell'] == 1): ?> checked <?php endif; ?> data-plugin-ios-switch />
                        </div>
                        &nbsp;&nbsp;
                        <label class="control-label cont-lab-s" for="inputDefault"><?php echo e(trans('main.supported_course')); ?></label>
                        <div class="switch switch-sm switch-primary sw-prim-s">
                            <input type="hidden" value="0" name="support">
                            <input type="checkbox" name="support" value="1" <?php if(isset($_GET['support']) && $_GET['support'] == 1): ?> checked <?php endif; ?> data-plugin-ios-switch />
                        </div>
                        &nbsp;&nbsp;
                        <label class="control-label cont-lab-s" for="inputDefault"><?php echo e(trans('main.discount')); ?></label>
                        <div class="switch switch-sm switch-primary sw-prim-s">
                            <input type="hidden" value="0" name="post">
                            <input type="checkbox" name="off" value="1" <?php if($off == 1): ?> checked <?php endif; ?> data-plugin-ios-switch />
                        </div>
                    </div>
                </div>
                <div class="col-md-2 col-xs-12 text-left tab-con">
                    <div class="form-group pull-left">
                        <select class="form-control" id="order order-s">
                            <option value="new" <?php if($order == 'new'): ?> selected <?php endif; ?>><?php echo e(trans('main.newest')); ?></option>
                            <option value="old" <?php if($order == 'old'): ?> selected <?php endif; ?>><?php echo e(trans('main.oldest')); ?></option>
                            <option value="price" <?php if($order == 'price'): ?> selected <?php endif; ?>><?php echo e(trans('main.price_ascending')); ?></option>
                            <option value="cheap" <?php if($order == 'cheap'): ?> selected <?php endif; ?>><?php echo e(trans('main.price_descending')); ?></option>
                            <option value="sell" <?php if($order == 'sell'): ?> selected <?php endif; ?>><?php echo e(trans('main.most_sold')); ?></option>
                            <option value="popular" <?php if($order == 'popular'): ?> selected <?php endif; ?>><?php echo e(trans('main.most_popular')); ?></option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="h-20"></div>
<div class="container-fluid">
    <div class="row">
        <div class="container">
            <div class="h-20"></div>
            <div class="col-md-12 col-xs-12">
                <div class="newest-container">
                    <div class="row body body-target body-target-s">
                        <?php $vipIds[] = 0; ?>
                        <?php if(!empty($vip) && !isset($order) && !isset($pricing) && !isset($course) && !isset($off) && !isset($post_sell) && !isset($q) && !isset($support) && !isset($filters)): ?>
                            <?php $__currentLoopData = $vip; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $content): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if(isset($content->content->id)): ?>
                                    <?php $vipIds[] = $content->content->id; ?>
                                    <?php $meta = arrayToList($content->content->metas,'option','value'); ?>
                                    <div class="col-md-3 col-sm-6 col-xs-12 pagi-content vip-content tab-con">
                                        <a href="/product/<?php echo e(isset($content->content->id) ? $content->content->id : ''); ?>" title="<?php echo e(isset($content->content->title) ? $content->content->title : ''); ?>" class="content-box pagi-content-box">
                                            
                                            <div class="img-container">
                                                <img src="<?php echo e(isset($meta['thumbnail']) ? $meta['thumbnail'] : ''); ?>"/>
                                                <span class="off-badge vip-badge">
                                                    <label class="text-center"><?php echo e(trans('main.vip_badge')); ?></label>
                                                </span>
                                            </div>
											<h3><?php echo str_limit($content->content->title,30,'...'); ?></h3>
                                            <div class="footer">
                                                <span class="avatar" title="<?php echo e(isset($content->user->name) ? $content->user->name : ''); ?>" onclick="window.location.href = '/profile/<?php echo e(isset($content->user->id) ? $content->user->id : 0); ?>'"><img src="<?php echo e(get_user_meta($content['user_id'],'avatar',get_option('default_user_avatar',''))); ?>"></span>
                                                <?php if(isset($metas['duration'])): ?>
                                                    <label class="pull-right content-clock"><?php echo e(convertToHoursMins($meta['duration'])); ?></label>
													<span class="boxicon mdi mdi-clock pull-right"></span>
                                                <?php else: ?>
                                                    <label class="pull-right content-clock"><?php echo e(trans('main.not_defined')); ?></label>
													<span class="boxicon mdi mdi-clock pull-right"></span>
                                                <?php endif; ?>
												<span class="boxicon mdi mdi-wallet pull-left"></span>
												<span class="boxicon mdi mdi-wallet pull-left"></span>
                                                <label class="pull-left"><?php echo e(price($content->id,$content->category_id,$meta['price'])['price_txt']); ?></label>
                                            </div>
                                        </a>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                            <?php $vipIds[] = 0; ?>
                        <?php endif; ?>
                        <?php $__currentLoopData = $contents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $content): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if(!in_array($content['id'],$vipIds)): ?>
                                <div class="col-md-3 col-sm-6 col-xs-12 pagi-content tab-con">
                            <a href="/product/<?php echo e(isset($content['id']) ? $content['id'] : ''); ?>" title="<?php echo e(isset($content['title']) ? $content['title'] : ''); ?>" class="content-box pagi-content-box">
                                
                                <div class="img-container">
                                    <img src="<?php echo e(isset($content['metas']['thumbnail']) ? $content['metas']['thumbnail'] : ''); ?>"/>
                                    <?php if($content['discount'] != null): ?>
                                        <span class="off-badge">
                                            <label class="text-center">%<?php echo e(isset($content['discount']['off']) ? $content['discount']['off'] : 0); ?><br><span><?php echo e(trans('main.discount')); ?></span></label>
                                        </span>
                                    <?php endif; ?>
                                </div>
								<h3><?php echo str_limit($content['title'],30,'...'); ?></h3>
                                <div class="footer">
                                    <span class="avatar" title="<?php echo e(isset($content['user']['name']) ? $content['user']['name'] : ''); ?>" onclick="window.location.href = '/profile/<?php echo e(isset($content['user']['id']) ? $content['user']['id'] : 0); ?>'"><img src="<?php echo e(get_user_meta($content['user_id'],'avatar',get_option('default_user_avatar',''))); ?>"></span>
                                    <?php if(isset($content['metas']['duration'])): ?>
                                        <label class="pull-right content-clock"><?php echo e(convertToHoursMins($content['metas']['duration'])); ?></label>
										<span class="boxicon mdi mdi-clock pull-right"></span>
                                    <?php else: ?>
                                        <label class="pull-right content-clock"><?php echo e(trans('main.not_defined')); ?></label>
										<span class="boxicon mdi mdi-clock pull-right"></span>
                                    <?php endif; ?>
									<span class="boxicon mdi mdi-wallet pull-left"></span>
                                    <label class="pull-left"><?php echo e(price($content['id'],$content['category_id'],$content['metas']['price'])['price_txt']); ?></label>
                                </div>
                            </a>
                        </div>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <div class="h-10"></div>
                    <div class="pagi text-center center-block col-xs-12"></div>
                    <div class="row pagi-s">
                        <?php if(isset($ads)): ?>
                            <?php $__currentLoopData = $ads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ad): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($ad->position == 'category-pagination-bottom'): ?>
                                    <a href="<?php echo e(isset($ad->url) ? $ad->url : '#'); ?>"><img src="<?php echo e(isset($ad->image) ? $ad->image : ''); ?>" class="<?php echo e(isset($ad->size) ? $ad->size : ''); ?>" id="cat-side"></a>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script>
        $(function() {
            pagination('.body-target',<?php if(isset($setting['site']['category_content_count'])): ?> <?php echo e(isset($setting['site']['category_content_count']) ? $setting['site']['category_content_count'] : 6); ?> <?php endif; ?>,0);
            $('.pagi').pagination({
                items: <?php echo count($contents); ?>,
                itemsOnPage: <?php if(isset($setting['site']['category_content_count'])): ?> <?php echo e(isset($setting['site']['category_content_count']) ? $setting['site']['category_content_count'] : 6); ?> <?php endif; ?>,
                cssStyle: 'light-theme',
                prevText: 'Pre.',
           		nextText:'Next',
                onPageClick:function(pageNumber, event) {
                    pagination('.body-target',<?php if(isset($setting['site']['category_content_count'])): ?> <?php echo e(isset($setting['site']['category_content_count']) ? $setting['site']['category_content_count'] : 6); ?> <?php endif; ?>,pageNumber-1);
                }
            });
        });
    </script>
    <script type="application/javascript" src="/assets/javascripts/category-page-custom.js"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('view.layout.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>