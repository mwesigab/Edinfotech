<?php $__env->startSection('title'); ?>
    <?php echo e(trans('admin.social_networks')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page'); ?>
    <div class="card">
        <div class="card-body">
            <div id="day" class="tab-pane active">
                <form method="post" action="/admin/setting/social/store" class="form-horizontal form-bordered">

                    <input type="hidden" name="id" value="<?php echo e(isset($item->id) ? $item->id : ''); ?>">

                    <div class="form-group">
                        <label class="col-md-2 control-label" for="inputDefault"><?php echo e(trans('admin.th_title')); ?></label>
                        <div class="col-md-8">
                            <input type="text" name="title" value="<?php echo e(isset($item->title) ? $item->title : ''); ?>" class="form-control" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label" for="inputDefault"><?php echo e(trans('admin.th_icon')); ?></label>
                        <div class="col-md-8">
                            <div class="input-group">
                                <span class="input-group-prepend cu-p view-selected" data-toggle="modal" data-target="#icon" data-whatever="image">
                                    <span class="input-group-text"><i class="fa fa-eye" aria-hidden="true"></i></span>
                                </span>
                                <input type="text" name="icon" dir="ltr" value="<?php echo e(isset($item->icon) ? $item->icon : ''); ?>" class="form-control">
                                <span class="input-group-append click-for-upload cu-p">
                                    <span class="input-group-text"><i class="fa fa-upload" aria-hidden="true"></i></span>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label"><?php echo e(trans('admin.link_address')); ?></label>
                        <div class="col-md-8">
                            <input type="text" name="link" value="<?php echo e(isset($item->link) ? $item->link : ''); ?>" class="form-control text-left">
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-md-2 control-label" for="inputDefault"><?php echo e(trans('admin.sort')); ?></label>
                        <div class="col-md-2">
                            <input type="number" name="sort" value="<?php echo e(isset($item->sort) ? $item->sort : ''); ?>" class="form-control text-center">
                        </div>
                        <div class="h-20"></div>
                        <div class="col-md-6">
                            <button class="btn btn-primary pull-left" type="submit"><?php echo e(trans('admin.save_changes')); ?></button>
                        </div>
                    </div>


                </form>
                <table class="table table-bordered table-striped mb-none" id="datatable-basic">
                <thead>
                <tr>
                    <th class="text-center" width="60"><?php echo e(trans('admin.th_icon')); ?></th>
                    <th><?php echo e(trans('admin.th_title')); ?></th>
                    <th class="text-center" width="100"><?php echo e(trans('admin.link_address')); ?></th>
                    <th class="text-center" width="150"><?php echo e(trans('admin.th_controls')); ?></th>
                </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $lists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                       <tr>
                           <td class="text-center"><img src="<?php echo e(isset($list->icon) ? $list->icon : ''); ?>" width="24" /></td>
                           <td><?php echo e(isset($list->title) ? $list->title : ''); ?></td>
                           <td class="text-center"><a href="<?php echo e(isset($list->link) ? $list->link : 0); ?>" target="_blank"><?php echo e(trans('admin.view')); ?></a></td>
                           <td class="text-center">
                               <a href="/admin/setting/social/edit/<?php echo e($list->id); ?>" title="Edit"><i class="fa fa-edit" aria-hidden="true"></i></a>
                               <a href="#" data-href="/admin/setting/social/delete/<?php echo e($list->id); ?>" title="Delete" data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-times" aria-hidden="true"></i></a>
                           </td>
                       </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.newlayout.layout',['breadcom'=>['Settings','Social Networks']], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>