<?php $__env->startSection('title'); ?>
   <?php echo e(trans('admin.th_edit')); ?> <?php echo e(trans('admin.promotions')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page'); ?>

    <section class="card">
        <div class="card-body">

            <form action="/admin/discount/content/edit/store/<?php echo e(isset($discount->id) ? $discount->id : 0); ?>" class="form-horizontal form-bordered" method="post">

                <div class="form-group">
                    <label class="col-md-2 control-label" for="inputDefault"><?php echo e(trans('admin.type')); ?></label>
                    <div class="col-md-8" >
                        <select name="type" class="form-control populate" id="type">
                                <option value=""></option>
                                <option value="content" <?php if($discount->type=='content'): ?> selected <?php endif; ?>><?php echo e(trans('admin.single_course')); ?></option>
                                <option value="category" <?php if($discount->type=='category'): ?> selected <?php endif; ?>><?php echo e(trans('admin.category_discount')); ?></option>
                                <option value="all" <?php if($discount->type=='all'): ?> selected <?php endif; ?>><?php echo e(trans('admin.all_courses_discount')); ?></option>
                        </select>
                    </div>
                </div>

                <div class="form-group <?php if($discount->type != 'content'): ?> hide-me <?php endif; ?> content">
                    <label class="col-md-2 control-label" for="inputDefault"><?php echo e(trans('admin.courses')); ?></label>
                    <div class="col-md-8" >
                        <select name="off_id_content" class="form-control populate" id="type">
                            <?php $__currentLoopData = $contents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $content): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e(isset($content->id) ? $content->id : 0); ?>" <?php if($discount->off_id==$content->id): ?> selected <?php endif; ?> ><?php echo e(isset($content->title) ? $content->title : ''); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>

                <div class="form-group <?php if($discount->type != 'category'): ?> hide-me <?php endif; ?> category">
                    <label class="col-md-2 control-label" for="inputDefault"><?php echo e(trans('admin.category')); ?></label>
                    <div class="col-md-8" >
                        <select name="off_id_category" class="form-control populate" id="type">
                            <?php $__currentLoopData = $categoreis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e(isset($category->id) ? $category->id : 0); ?>" <?php if($discount->off_id==$category->id): ?> selected <?php endif; ?>><?php echo e(isset($category->title) ? $category->title : ''); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label class="col-md-4 control-label" for="inputDefault"><?php echo e(trans('admin.start_date')); ?></label>
                            <div class="col-md-12">
                                <div class="input-group">
                                    <input type="date" id="fsdate" value="<?php echo e(date('Y/m/d',$discount->first_date)); ?>" class="text-center form-control" name="fsdate" placeholder="Start Date">
                                    <input type="hidden" id="fdate" value="<?php echo e(date('Y-m-d',$discount->first_date)); ?>" name="fdate" required>
                                    <span class="input-group-append fdatebtn" id="fdatebtn">
                                    <span class="input-group-text"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                                </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label class="col-md-4 control-label" for="inputDefault"><?php echo e(trans('admin.end_date')); ?></label>
                            <div class="col-md-12">
                                <div class="input-group">
                                    <input type="date" id="lsdate" class="text-center form-control" value="<?php echo e(date('Y/m/d',$discount->last_date)); ?>" name="lsdate" placeholder="End Date">
                                    <input type="hidden" id="ldate" name="ldate" value="<?php echo e(date('Y-m-d',$discount->last_date)); ?>" required>
                                    <span class="input-group-append ldatebtn" id="ldatebtn">
                                    <span class="input-group-text"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                                </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label class="col-md-5 control-label" for="inputDefault"><?php echo e(trans('admin.amount')); ?></label>
                            <div class="col-md-12">
                                <input type="number" min="0" max="99" name="off" value="<?php echo e(isset($discount->off) ? $discount->off : 0); ?>" class="form-control text-center" placeholder="Percent only (Eg: 20 for 20%)" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label class="col-md-5 control-label" for="inputDefault"><?php echo e(trans('admin.th_status')); ?></label>
                            <div class="col-md-12" >
                                <select  name="mode" class="form-control populate" id="type">
                                    <option value="publish" <?php if($discount->mode=='publish'): ?> selected <?php endif; ?>><?php echo e(trans('admin.active')); ?></option>
                                    <option value="draft" <?php if($discount->mode=='draft'): ?> selected <?php endif; ?>><?php echo e(trans('admin.disabled')); ?></option>
                                </select>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-2 control-label" for="inputDefault"></label>
                    <div class="col-md-8">
                        <button class="btn btn-primary" type="submit"><?php echo e(trans('admin.save_changes')); ?></button>
                    </div>
                </div>

            </form>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script>
        $(document).ready(function () {
            $('select[name="type"]').change(function () {
                $('.hide-me').hide();
                $('.'+$(this).val()).show();
            })
        })
    </script>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('admin.newlayout.layout',['breadcom'=>['Promotions','Edit']], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>