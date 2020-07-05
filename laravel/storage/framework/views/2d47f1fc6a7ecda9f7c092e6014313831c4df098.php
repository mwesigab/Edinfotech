<?php $__env->startSection('title'); ?>
    <?php echo e(trans('admin.verification_requests')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page'); ?>

    <section class="card">
        <div class="card-body">
            <table class="table table-bordered table-striped mb-none" id="datatable-details">
                <thead>
                <tr>
                    <th ><?php echo e(trans('admin.request_description')); ?></th>
                    <th class="text-center" width="150"><?php echo e(trans('admin.th_date')); ?></th>
                    <th class="text-center"><?php echo e(trans('admin.creator')); ?></th>
                    <th class="text-center"><?php echo e(trans('admin.channel_title')); ?></th>
                    <th class="text-center"><?php echo e(trans('admin.documents')); ?></th>
                    <th class="text-center" width="50"><?php echo e(trans('admin.th_status')); ?></th>
                    <th class="text-center" width="100"><?php echo e(trans('admin.th_controls')); ?></th>
                </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $lists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($item->title); ?></td>
                            <td class="text-center" width="150"><?php echo e(date('d F Y / H:i',$item->create_at)); ?></td>
                            <td class="text-center" title="<?php echo e(isset($item->user->username) ? $item->user->username : ''); ?>"><?php echo e(isset($item->user->name) ? $item->user->name : ''); ?></td>
                            <td class="text-center" title="<?php echo e(isset($item->channel->title) ? $item->channel->title : ''); ?>"><?php echo e(isset($item->channel->title) ? $item->channel->title : ''); ?></td>
                            <td class="text-center" ><?php if(isset($item->attach)): ?> <?php echo '<a target="_blank" href="'.$item->attach.'">Download</a>'; ?> <?php else: ?> No data <?php endif; ?></td>
                            <td class="text-center">
                                <?php if($item->mode == 'publish'): ?>
                                    <span class="c-g f-w-b"><?php echo e(trans('admin.active')); ?></span>
                                <?php else: ?>
                                    <span class="c-r f-w-b"><?php echo e(trans('admin.disabled')); ?></span>
                                <?php endif; ?>
                            </td>
                            <td class="text-center">
                                <?php if($item->mode == 'publish'): ?>
                                    <a href="/admin/channel/request/draft/<?php echo e($item->id); ?>" title="Disable Channel"><i class="fa fa-arrow-down" aria-hidden="true"></i></a>
                                <?php else: ?>
                                    <a href="/admin/channel/request/publish/<?php echo e($item->id); ?>" title="Publish Channel"><i class="fa fa-arrow-up" aria-hidden="true"></i></a>
                                <?php endif; ?>
                                <a href="#" data-href="/admin/channel/request/delete/<?php echo e($item->id); ?>" title="Delete" data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-times" aria-hidden="true"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </section>

<?php $__env->stopSection(); ?>



<?php echo $__env->make('admin.newlayout.layout',['breadcom'=>['Requests','List']], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>