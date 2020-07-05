<?php $__env->startSection('title'); ?>
   <?php echo e(trans('admin.banners_list')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page'); ?>

    <div class="card card-primary">
        <div class="card-body">
            <form method="post" action="/admin/setting/store">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label><?php echo e(trans('admin.top_left')); ?></label>
                            <div class="input-group">
                                <span class="input-group-prepend view-selected ads-boxs-1" data-toggle="modal" data-target="#ImageModal" data-whatever="image">
                                    <span class="input-group-text"><i class="fa fa-eye" aria-hidden="true"></i></span>
                                </span>
                                <input type="text" name="triangle-banner-top-image" value="<?php echo e(get_option('triangle-banner-top-image')); ?>" dir="ltr" class="form-control">
                                <span class="input-group-append click-for-upload ads-boxs-1">
                                    <span class="input-group-text"><i class="fa fa-upload" aria-hidden="true"></i></span>
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label><?php echo e(trans('admin.top_left_link')); ?></label>
                            <input type="text" class="form-control" name="triangle-banner-top-url" value="<?php echo e(get_option('triangle-banner-top-url')); ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label><?php echo e(trans('admin.bottom_left')); ?></label>
                            <div class="input-group">
                                <span class="input-group-prepend view-selected ads-boxs-1" data-toggle="modal" data-target="#ImageModal" data-whatever="image">
                                    <span class="input-group-text"><i class="fa fa-eye" aria-hidden="true"></i></span>
                                </span>
                                <input type="text" name="triangle-banner-bottom-image" value="<?php echo e(get_option('triangle-banner-bottom-image')); ?>" dir="ltr" class="form-control">
                                <span class="input-group-append click-for-upload ads-boxs-1">
                                    <span class="input-group-text"><i class="fa fa-upload" aria-hidden="true"></i></span>
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label><?php echo e(trans('admin.bottom_left_link')); ?></label>
                            <input type="text" class="form-control" name="triangle-banner-bottom-url" value="<?php echo e(get_option('triangle-banner-bottom-url')); ?>">
                        </div>
                    </div>
                </div>
                <div class="h-15"></div>
                <div class="form-group">
                    <label><?php echo e(trans('admin.bottom_sticky')); ?></label>
                    <textarea class="form-control text-left" dir="ltr" rows="10" name="banner-html-box"><?php echo get_option('banner-html-box',''); ?></textarea>
                </div>
                <div class="form-group">
                    <div class="h-15"></div>
                    <input type="submit" value="Save Changes" class="btn btn-primary pull-left">
                </div>
            </form>
        </div>
    </div>
    <section class="card">
        <div class="card-body">
            <table class="table table-bordered table-striped mb-none" id="datatable-details">
                <thead>
                <tr>
                    <th><?php echo e(trans('admin.th_title')); ?></th>
                    <th class="text-center"><?php echo e(trans('admin.position')); ?></th>
                    <th class="text-center"><?php echo e(trans('admin.banner_size')); ?></th>
                    <th class="text-center" width="100"><?php echo e(trans('admin.th_status')); ?></th>
                    <th class="text-center" width="100"><?php echo e(trans('admin.th_controls')); ?></th>
                </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $lists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <th ><?php echo e(isset($list->title) ? $list->title : ''); ?></th>
                            <th class="text-center">
                                <?php
                                switch($list->position){
                                    case('main-slider-side'):
                                        echo 'Homepage-Beside Slider';
                                        break;
                                    case('main-article-side'):
                                        echo 'Homepage-Beside Articles';
                                        break;
                                    case('category-side'):
                                        echo 'Category Page-Sidebar';
                                        break;
                                    case('category-pagination-bottom'):
                                        echo 'Category Page-Bottom';
                                        break;
                                    case('product-page'):
                                        echo 'Product Page-Sidebar';
                                        break;
                                }
                                ?>
                            </th>
                            <th class="text-center" width="200">
                                <?php if($list->size=='col-md-12 col-sm-12 col-xs-12'): ?>
                                    <?php echo e('Original'); ?>

                                <?php elseif($list->size=='col-md-6 col-sm-6 col-xs-12'): ?>
                                    <?php echo e('1/2'); ?>

                                <?php elseif($list->size=='col-md-4 col-sm-6 col-xs-12'): ?>
                                    <?php echo e('1/3'); ?>

                                <?php elseif($list->size=='col-md-3 col-sm-6 col-xs-12'): ?>
                                    <?php echo e('1/4'); ?>

                                <?php endif; ?>
                            </th>
                            <th class="text-center">
                                <?php if($list->mode == 'publish'): ?>
                                    <span class="color-green"><?php echo e(trans('admin.active')); ?></span>
                                <?php elseif($list->mode == 'draft'): ?>
                                    <span class="color-orange"><?php echo e(trans('admin.disabled')); ?></span>
                                <?php endif; ?>
                            </th>
                            <th class="text-center">
                                <a href="/admin/ads/box/edit/<?php echo e($list->id); ?>" title="Edit"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                <a href="#" data-href="/admin/ads/box/delete/<?php echo e($list->id); ?>" title="Delete" data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-times" aria-hidden="true"></i></a>
                            </th>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </section>

<?php $__env->stopSection(); ?>



<?php echo $__env->make('admin.newlayout.layout',['breadcom'=>['Advertising','Banners']], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>