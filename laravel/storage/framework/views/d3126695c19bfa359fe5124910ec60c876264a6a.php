
<?php $__env->startSection('title'); ?>
    <?php echo e(get_option('site_title','')); ?> Search - <?php echo e(isset($_GET['q']) ? $_GET['q'] : ''); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page'); ?>

    <div class="container-fluid">
        <div class="row cat-search-section">
            <div class="container">
                <div class="col-md-6 col-sm-6 col-xs-12 cat-icon-container">
                    <span> <?php echo e(isset($search_title) ? $search_title : 'Search'); ?> "<?php echo e(isset($_GET['q']) ? $_GET['q'] : ''); ?>"</span>
                </div>
                <div class="col-md-3">
                    <div class="h-10"></div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                        <form>
                            <select class="form-control font-s" name="search_type">
                                <option value="content_title" <?php if(isset($_GET['type']) && $_GET['type']=='content_title'): ?> selected <?php endif; ?>><?php echo e(trans('main.course_title')); ?></option>
                                <option value="content_code" <?php if(isset($_GET['type']) && $_GET['type']=='content_code'): ?> selected <?php endif; ?>><?php echo e(trans('main.item_no')); ?></option>
                                <option value="content_filter" <?php if(isset($_GET['type']) && $_GET['type']=='content_filter'): ?> selected <?php endif; ?>><?php echo e(trans('main.filters')); ?></option>
                                <option value="user_name" <?php if(isset($_GET['type']) && $_GET['type']=='user_name'): ?> selected <?php endif; ?>><?php echo e(trans('main.username')); ?></option>
                            </select>
                        </form>
                </div>
            </div>
        </div>
    </div>
    <div class="h-10"></div>
    <div class="h-20"></div>
    <div class="container-fluid">
        <div class="row">
            <div class="container">
                <div class="col-md-12 col-xs-12">
                    <?php if(!isset($_GET['type']) || (isset($_GET['type']) && $_GET['type']!='user_name')): ?>
                        <div class="newest-container newest-container-b">
                        <div class="row body body-target body-target-s">
                            <?php if($contents): ?>
                                <?php $__currentLoopData = $contents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $content): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-md-3 col-sm-6 col-xs-12 pagi-content tab-con">
                                    <a href="/product/<?php echo e(isset($content['id']) ? $content['id'] : ''); ?>" title="<?php echo e(isset($content['title']) ? $content['title'] : ''); ?>" class="content-box">
                                        <img src="<?php echo e(isset($content['metas']['thumbnail']) ? $content['metas']['thumbnail'] : ''); ?>"/>
										<h3><?php echo str_limit($content['title'],30,'...'); ?></h3>
                                        <div class="footer">
                                            <label class="pull-right"><?php echo e(isset($content['metas']['duration']) ? $content['metas']['duration'] : ''); ?> <?php echo e(trans('main.min')); ?></label>
											<span class="boxicon mdi mdi-clock pull-right"></span>
											<span class="boxicon mdi mdi-wallet pull-left"></span>
                                            <?php if(isset($content['metas']['price']) && $content['metas']['price']>0): ?>
                                                <label class="pull-left"><?php echo e(currencySign()); ?><?php echo e(isset($content['metas']['price']) ? $content['metas']['price'] : ''); ?></label>
                                            <?php else: ?>
                                                <label class="pull-left"><?php echo e(trans('main.free_item')); ?></label>
                                            <?php endif; ?>
                                        </div>
                                    </a>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php else: ?>
                                <h3><?php echo e(trans('main.no_search_result')); ?></h3>
                            <?php endif; ?>
                        </div>
                        <div class="h-10"></div>
                        <?php if($contents): ?>
                            <div class="pagi text-center center-block col-xs-12"></div>
                         <?php endif; ?>
                    </div>
                    <?php else: ?>
                        <div class="newest-container newest-container-b">
                            <div class="row body body-target body-target-s">
                                <?php if($contents): ?>
                                    <?php $__currentLoopData = $contents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $content): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="col-md-2 col-sm-3 col-xs-6 pagi-content">
                                            <a href="/prfile/<?php echo e(isset($content['id']) ? $content['id'] : ''); ?>" title="<?php echo e(isset($content['name']) ? $content['name'] : ''); ?>" class="user-box pagi-content-box">
                                                <img src="<?php echo e(isset($content['metas']['avatar']) ? $content['metas']['avatar'] : ''); ?>"/>
                                                <h3><?php echo isset($content['name']) ? $content['name'] : ''; ?></h3>
                                            </a>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                    <h3><?php echo e(trans('main.no_search_result')); ?></h3>
                                <?php endif; ?>
                            </div>
                            <div class="h-10"></div>
                            <?php if($contents): ?>
                                <div class="pagi text-center center-block col-xs-12"></div>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
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
            prevText: '<i class="fa fa-angle-left"></i>',
            nextText:'<i class="fa fa-angle-right"></i>',
            onPageClick:function(pageNumber, event) {
            pagination('.body-target',<?php if(isset($setting['site']['category_content_count'])): ?> <?php echo e(isset($setting['site']['category_content_count']) ? $setting['site']['category_content_count'] : 6); ?> <?php endif; ?>,pageNumber-1);
        }
        });
        });
    </script>
    <script type="application/javascript" src="/assets/javascripts/category-page-custom.js"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('view.layout.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>