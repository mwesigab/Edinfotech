<?php $__env->startSection('title'); ?>
    <?php echo e(trans('admin.th_edit')); ?> <?php echo e(trans('admin.departments')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page'); ?>
    <div class="card">
        <div class="card-body">
            <div class="tabs">
                <ul class="nav nav-pills">
                    <li class="nav-item">
                        <a href="#list" class="nav-link" data-toggle="tab"> <?php echo e(trans('admin.departments')); ?> </a>
                    </li>
                    <li class="nav-item">
                        <a href="#newitem" class="nav-link" data-toggle="tab"><?php echo e(trans('admin.new_department')); ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#edititem" data-toggle="tab"><?php echo e(trans('admin.th_edit')); ?></a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div id="list" class="tab-pane ">
                        <table class="table table-bordered table-striped mb-none" id="datatable-details">
                            <thead>
                            <tr>
                                <th><?php echo e(trans('admin.th_title')); ?></th>
                                <th class="text-center" width="100"><?php echo e(trans('admin.support_tickets')); ?></th>
                                <th class="text-center" width="100"><?php echo e(trans('admin.th_controls')); ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $lists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($list->title); ?></td>
                                    <td class="text-center"><?php echo e(isset($list->tickets_count) ? $list->tickets_count : '0'); ?></td>
                                    <td class="text-center">
                                        <a href="/admin/ticket/category/edit/<?php echo e($list->id); ?>" title="Edit"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                        <a href="#" data-href="/admin/ticket/category/delete/<?php echo e($list->id); ?>" title="Delete" data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-times" aria-hidden="true"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                    <div id="newitem" class="tab-pane ">
                        <form method="post" action="/admin/ticket/category/store" class="form-horizontal form-bordered">


                            <div class="form-group">
                                <label class="col-md-3 control-label" for="inputDefault"><?php echo e(trans('admin.th_title')); ?></label>
                                <div class="col-md-6">
                                    <input type="text" name="title" value="" class="form-control">
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
                    <div id="edititem" class="tab-pane active">
                        <form method="post" action="/admin/ticket/category/store" class="form-horizontal form-bordered">

                            <input type="hidden" name="edit" value="<?php echo e(isset($item->id) ? $item->id : ''); ?>">

                            <div class="form-group">
                                <label class="col-md-3 control-label" for="inputDefault"><?php echo e(trans('admin.th_title')); ?></label>
                                <div class="col-md-6">
                                    <input type="text"  name="title" value="<?php echo e(isset($item->title) ? $item->title : ''); ?>" class="form-control">
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


<?php echo $__env->make('admin.newlayout.layout',['breadcom'=>['Support','Departments','Edit']], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>