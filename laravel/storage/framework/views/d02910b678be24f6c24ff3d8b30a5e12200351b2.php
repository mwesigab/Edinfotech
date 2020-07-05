
<?php $__env->startSection('title'); ?>
    <?php echo e(get_option('site_title','')); ?>  - <?php echo e(trans('main.requests')); ?>


<?php $__env->stopSection(); ?>
<?php $__env->startSection('page'); ?>

    <div class="container-fluid">
        <div class="row cat-tag-section">
            <div class="container">
                <div class="col-md-6 col-xs-12 tab-con">
                    <a href="/request/new" class="btn btn-custom"><span><?php echo e(trans('main.request_course')); ?></span></a>
                    <div class="btn-group btn-g-s" data-toggle="buttons">
                        <label class="btn btn-primary <?php if(!isset($_GET['mode']) || $_GET['mode']=='all'): ?> active <?php endif; ?>">
                            <input type="radio" name="mode" value="all" <?php if(isset($_GET['mode']) && $_GET['mode']=='all'): ?> checked <?php endif; ?>> <?php echo e(trans('main.all')); ?>

                        </label>
                        <label class="btn btn-primary <?php if(isset($_GET['mode']) && $_GET['mode']=='publish'): ?> active <?php endif; ?>">
                            <input type="radio" name="mode" value="publish" <?php if(isset($_GET['mode']) && $_GET['mode']=='publish'): ?> checked <?php endif; ?>><?php echo e(trans('main.request')); ?>

                        </label>
                        <label class="btn btn-primary <?php if(isset($_GET['mode']) && $_GET['mode']=='accept'): ?> active <?php endif; ?>">
                            <input type="radio" name="mode" value="accept" <?php if(isset($_GET['mode']) && $_GET['mode']=='accept'): ?> checked <?php endif; ?>><?php echo e(trans('main.closed_request')); ?>

                        </label>
                    </div>
                </div>
                <div class="col-md-3 col-xs-12 text-left tab-con pbot">

                </div>
                <div class="col-md-3 col-xs-12 text-left tab-con">
                    <div class="box marz">
                        <div class="container-2">
                            <form>
                                <input type="search" id="search" name="q" value="<?php echo e(isset($_GET['q']) ? $_GET['q'] : ''); ?>" placeholder="Search in requests" />
                                <span class="icon"><i class="homeicon mdi mdi-magnify"></i></span>
                            </form>
                        </div>
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
            <div class="col-md-3 col-xs-12 tab-con">
                <div class="ucp-section-box sbox3">
                    <div class="header back-orange text-center"><span><?php echo e(trans('main.category')); ?></span></div>
                    <div class="body">
                    <ul id="accordion" class="cat-filters-li accordion">
                        <?php $__currentLoopData = $setting['category']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mainCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li <?php $__currentLoopData = $mainCategory->childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php if(isset($_GET['cat']) && in_array($child->id,$_GET['cat'])): ?> class="open" <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>>
                                <?php if(count($mainCategory->childs)>0): ?>
                                    <div class="link"><?php echo e(isset($mainCategory->title) ? $mainCategory->title : ''); ?><i class="mdi mdi-chevron-down"></i></div>
                                        <ul class="submenu" <?php $__currentLoopData = $mainCategory->childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php if(isset($_GET['cat']) && in_array($child->id,$_GET['cat'])): ?> style="display: block;" <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>>
                                            <?php $__currentLoopData = $mainCategory->childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li><input name="category" type="checkbox" id="cat<?php echo e(isset($child->id) ? $child->id : ''); ?>" value="<?php echo e(isset($child->id) ? $child->id : ''); ?>" class="category-item" <?php if(isset($_GET['cat']) && in_array($child->id,$_GET['cat'])): ?> checked <?php endif; ?>><label for="cat<?php echo e(isset($child->id) ? $child->id : ''); ?>"><span></span><?php echo e(isset($child->title) ? $child->title : ''); ?></label></li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                    </li>
                                <?php else: ?>
                                    <div class="link"><?php echo e(isset($mainCategory->title) ? $mainCategory->title : ''); ?><i class="mdi mdi-chevron-down"></i></div>
                                    <ul class="submenu" <?php if(isset($_GET['cat']) && in_array($mainCategory->id,$_GET['cat'])): ?> style="display: block" <?php endif; ?>>
                                        <li><input name="category" type="checkbox" id="cat<?php echo e(isset($mainCategory->id) ? $mainCategory->id : ''); ?>" value="<?php echo e(isset($mainCategory->id) ? $mainCategory->id : ''); ?>" class="category-item" <?php if(isset($_GET['cat']) && in_array($mainCategory->id,$_GET['cat'])): ?> checked <?php endif; ?>><label for="cat<?php echo e(isset($mainCategory->id) ? $mainCategory->id : ''); ?>"><span></span><?php echo e(isset($mainCategory->title) ? $mainCategory->title : ''); ?></label></li>
                                    </ul>
                                <?php endif; ?>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-9 col-xs-12">
                <div class="newest-container newest-container-b">
                    <div class="row body body-target body-target-s">
                        <?php if(!empty($list)): ?>
                            <?php $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $content): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-md-4 col-sm-6 col-xs-12 pagi-content tab-con">
                                    <?php if($content->content_id != null): ?>
                                        <a href="javascript:void(0);" title="<?php echo e(isset($content->title) ? $content->title : ''); ?>" class="content-box pagi-content-box">
                                    <?php else: ?>
                                        <a href="javascript:void(0);" title="<?php echo e(isset($content->title) ? $content->title : ''); ?>" class="content-box pagi-content-box">
                                    <?php endif; ?>
										<img src="<?php echo e(isset($content->category->req_icon) ? $content->category->req_icon : ''); ?>"/>
                                        <h3><?php echo str_limit($content->title,30,'...'); ?></h3>
                                        <div class="img-container text-center center-block">
                                        </div>
                                        <div class="footer">
                                            <span class="pull-right mod-r" data-toggle="modal" data-target="#dModal<?php echo e(isset($content->id) ? $content->id : 0); ?>"><b><?php echo e(trans('main.description')); ?></b></span>
                                            <?php if($content->mode == 'publish'): ?>
                                                <?php if($content->content_id == ''): ?>
                                                    <?php if(count($content->fans)==1): ?>
														<span class="boxicon mdi mdi-heart pull-left"></span>
                                                        <span class="pull-left request-unfollow-icon" title="<?php echo e(trans('main.unfollow')); ?>" onclick="window.location.href ='/request/unfollow/<?php echo e(isset($content->id) ? $content->id : 0); ?>'"><?php echo e(isset($content->fans_count) ? $content->fans_count : 0); ?> <?php echo e(trans('main.followers')); ?></span>
                                                    <?php else: ?>
														<span class="boxicon mdi mdi-heart-outline pull-left"></span>
                                                        <span class="pull-left request-follow-icon" title="<?php echo e(trans('main.follow')); ?>" onclick="window.location.href ='/request/follow/<?php echo e(isset($content->id) ? $content->id : 0); ?>'"><?php echo e(isset($content->fans_count) ? $content->fans_count : 0); ?> <?php echo e(trans('main.followers')); ?></span>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                                <?php if($content->content_id != ''): ?>
													<span class="boxicon mdi mdi-check-bold pull-left"></span>
                                                    <span class="pull-left request-accept-icon"><?php echo e(trans('main.closed_request')); ?></span>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        </div>
                                    </a>
                                    <div id="dModal<?php echo e(isset($content->id) ? $content->id : 0); ?>" class="modal fade"  role="dialog">
                                                    <div class="modal-dialog">

                                                        <!-- Modal content-->
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                <h4 class="modal-title"><?php echo e(trans('main.description')); ?></h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p><?php echo e(isset($content->description) ? $content->description : 'No description'); ?></p>
                                                            </div>
                                                            <div class="modal-body no-absolute-content">
                                                                <?php if($content->content_id != ''): ?>
                                                                    <p>
                                                                        <span><?php echo e(trans('main.responded_request')); ?></span>
                                                                        <a href="/product/<?php echo e(isset($content->content->id) ? $content->content->id : ''); ?>"><b><?php echo e(isset($content->content->title) ? $content->content->title : ''); ?></b></a>
                                                                    </p>
                                                                <?php else: ?>
                                                                        <p><b><?php echo e(trans('main.send_respond')); ?></b></p>
                                                                        <p>
                                                                            <input type="text" id="input-suggestion_<?php echo e(isset($content->id) ? $content->id : 0); ?>" class="form-control provider-json" placeholder="Enter at least 3 characters to search">
                                                                        </p>
                                                                <?php endif; ?>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <?php if($content->content_id == ''): ?><button type="button" class="btn btn-default btn-custom input-suggestion-btn" data-id="<?php echo e(isset($content->id) ? $content->id : 0); ?>"><?php echo e(trans('main.send')); ?></button><?php endif; ?>
                                                                <button type="button" class="btn btn-custom" data-dismiss="modal"><?php echo e(trans('main.close')); ?></button>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </div>
                    <div class="h-10"></div>
                    <div class="pagi text-center center-block col-xs-12"></div>
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
                items: <?php echo count($list); ?>,
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