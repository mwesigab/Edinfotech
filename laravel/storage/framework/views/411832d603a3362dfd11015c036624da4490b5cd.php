<?php $__env->startSection('title'); ?>
   <?php echo e(trans('admin.filter_tags')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page'); ?>
    <div class="card">
        <div class="card-body">
            <div class="tabs">
                <ul class="nav nav-pills">
                    <li class="nav-item"><a class="nav-link active" href="#list" data-toggle="tab"> <?php echo e(trans('admin.filter_tags')); ?> </a></li>
                    <li class="nav-item"><a class="nav-link" href="#newitem" data-toggle="tab"> <?php echo e(trans('admin.new_tag')); ?> </a></li>
                </ul>
                <div class="tab-content">
                    <div id="list" class="tab-pane active">
                        <table class="table table-bordered table-striped mb-none" id="datatable-details">
                            <thead>
                            <tr>
                                <th><?php echo e(trans('admin.th_title')); ?></th>
                                <th class="text-center" width="100"><?php echo e(trans('admin.th_controls')); ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $lists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($list->tag); ?></td>
                                    <td class="text-center">
                                        <a href="/admin/content/category/filter/tag/<?php echo e(isset($id) ? $id : ''); ?>/edit/<?php echo e($list->id); ?>#edit" title="Edit"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                        <a href="#" data-href="/admin/content/category/filter/tag/delete/<?php echo e($list->id); ?>" title="Delete" data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-times" aria-hidden="true"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                    <div id="newitem" class="tab-pane ">
                        <form method="post" action="/admin/content/category/filter/tag/store/new" class="form-horizontal form-bordered">

                            <input type="hidden" name="filter_id" value="<?php echo e(isset($id) ? $id : ''); ?>">

                            <div class="form-group">
                                <label class="col-md-3 control-label" for="inputDefault"><?php echo e(trans('admin.tag_title')); ?></label>
                                <div class="col-md-6">
                                    <input type="text" name="tag" value="" class="form-control" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label"><?php echo e(trans('admin.sort')); ?></label>
                                <div class="col-md-6">
                                    <input type="number" name="sort" class="spinner-input form-control" maxlength="3">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label"></label>
                                <div class="col-md-6">
                                    <button class="btn btn-primary" type="submit"><?php echo e(trans('admin.save_changes')); ?></button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('admin.newlayout.layout', ['breadcom'=>['Courses','Categories','Filters',$filter->filter,'Tags']], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>