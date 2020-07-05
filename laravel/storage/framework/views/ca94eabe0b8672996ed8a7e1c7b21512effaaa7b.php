<?php $__env->startSection('title'); ?>
    <?php echo e(trans('admin.new_post')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page'); ?>
    <section class="card">
        <div class="card-body">

            <form action="/admin/blog/post/store" class="form-horizontal form-bordered" method="post">

                <div class="form-group">
                    <label class="col-md-2 control-label" for="inputDefault"><?php echo e(trans('admin.th_title')); ?></label>
                    <div class="col-md-10">
                        <input type="text" name="title" class="form-control" required>
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-md-2 control-label" for="inputDefault"><?php echo e(trans('admin.category')); ?></label>
                    <div class="col-md-10">
                        <select id="category_id" class="form-control">
                            <option value=""></option>
                            <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($cat->id); ?>"><?php echo e($cat->title); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-2 control-label" for="inputDefault"><?php echo e(trans('admin.thumbnail')); ?></label>
                    <div class="col-md-10">
                        <div class="input-group">
                            <span class="input-group-prepend view-selected cu-p" data-toggle="modal" data-target="#ImageModal" data-whatever="image">
                                <span class="input-group-text"><i class="fa fa-eye" aria-hidden="true"></i></span>
                            </span>
                            <input type="text" name="image" dir="ltr" class="form-control">
                            <span class="input-group-append click-for-upload cu-p"><span class="input-group-text"><i class="fa fa-upload" aria-hidden="true"></i></span></span>
                        </div>
                    </div>
                </div>

                <label class="col-md-2 control-label" for="inputDefault"><?php echo e(trans('admin.short_description')); ?></label>
                <div class="form-group">
                    <div class="col-md-12">
                        <textarea class="summernote" name="pre_content" required></textarea>
                    </div>
                </div>

                <label class="col-md-2 control-label" for="inputDefault"><?php echo e(trans('admin.description')); ?></label>
                <div class="form-group">
                    <div class="col-md-12">
                        <textarea class="summernote" name="content" required></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-2 control-label" for="inputDefault"><?php echo e(trans('admin.tags')); ?></label>
                    <div class="col-md-10">
                        <input type="text" name="tags" class="form-control inputtags">
                    </div>
                </div>

                <div class="col-12">
                    <div class="custom-switches-stacked">
                        <label class="custom-switch">
                            <input type="hidden" name="comment" value="disable">
                            <input type="checkbox" name="comment" value="enable" checked class="custom-switch-input"/>
                            <span class="custom-switch-indicator"></span>
                            <label class="custom-switch-description" for="inputDefault"><?php echo e(trans('admin.comments_enabled')); ?></label>
                        </label>
                        <label class="custom-switch">
                            <input type="hidden" name="mode" value="draft">
                            <input type="checkbox" name="mode" value="publish" checked class="custom-switch-input"/>
                            <span class="custom-switch-indicator"></span>
                            <label class="custom-switch-description" for="inputDefault"><?php echo e(trans('admin.publish')); ?></label>
                        </label>
                    </div>
                    <div class="h-15"></div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <button class="btn btn-primary pull-left" type="submit"><?php echo e(trans('admin.save_changes')); ?></button>
                    </div>
                </div>

            </form>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script>$(".inputtags").tagsinput('items');</script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.newlayout.layout',['breadcom'=>[trans('admin.blog_posts'),trans('admin.new_post')]], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>