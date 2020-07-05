<?php $__env->startSection('title'); ?>
    <?php echo e(trans('admin.financial_documents')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page'); ?>
    <a href="/admin/balance/list/excel" class="btn btn-primary">Export as xls</a>
    <div class="h-10"></div>
    <section class="card">
        <div class="card-body">
            <table class="table table-bordered table-striped mb-none" id="datatable-details">
                <thead>
                <tr>
                    <th class="text-center" width="170"><?php echo e(trans('admin.th_date')); ?></th>
                    <th class="text-center"><?php echo e(trans('admin.th_title')); ?></th>
                    <th class="text-center"><?php echo e(trans('admin.document_type')); ?></th>
                    <th class="text-center"><?php echo e(trans('admin.amount')); ?></th>
                    <th class="text-center"><?php echo e(trans('admin.creator')); ?></th>
                    <td class="text-center"><?php echo e(trans('admin.username')); ?></td>
                    <th class="text-center"><?php echo e(trans('admin.description')); ?></th>
                    <td class="text-center"><?php echo e(trans('admin.th_controls')); ?></td>
                </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $lists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td class="text-center" width="170"><?php echo e(date('d F Y / H:i',$item->create_at)); ?></td>
                            <td class="text-center"><?php echo e($item->title); ?></td>
                            <td class="text-center">
                                <?php if($item->type == 'add'): ?>
                                    <span class="f-w-b color-green"><?php echo e(trans('admin.addiction')); ?></span>
                                <?php else: ?>
                                    <span class="color-red-i f-w-b"><?php echo e(trans('admin.deduction')); ?></span>
                                <?php endif; ?>
                            </td>
                            <td class="text-center">
                                <?php if($item->type == 'add'): ?>
                                    <span class="f-w-b color-green"><?php echo e(isset($item->price) ? $item->price : 0); ?>+</span>
                                <?php else: ?>
                                    <span class="color-red-i f-w-b"><?php echo e(isset($item->price) ? $item->price : 0); ?>-</span>
                                <?php endif; ?>
                            </td>
                            <td class="text-center">
                                <?php if($item->mode == 'auto'): ?>
                                    <span><?php echo e(trans('admin.automatic')); ?></span>
                                <?php elseif($item->mode == 'user'): ?>
                                    <span><a href="/admin/user/item/<?php echo e(isset($item->exporter->id) ? $item->exporter->id : 0); ?>" title="<?php echo e(isset($item->exporter->name) ? $item->exporter->name : ''); ?>"><?php echo e(isset($item->exporter->username) ? $item->exporter->username : ''); ?></a></span>
                                <?php endif; ?>
                            </td>
                            <td class="text-center"><a href="/admin/user/edit/<?php echo e(isset($item->user->id) ? $item->user->id : ''); ?>" title="<?php echo e(isset($item->user->name) ? $item->user->name : ''); ?>"><?php echo e(isset($item->user->username) ? $item->user->username : 'Fund'); ?></a></td>
                            <td class="text-center"><?php echo e(isset($item->description) ? $item->description : ''); ?></td>
                            <td class="text-center">
                                <a href="/admin/balance/print/<?php echo e($item->id); ?>" target="_blank" title="Print Document" ><i class="fa fa-print" aria-hidden="true"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </section>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.newlayout.layout',['breadcom'=>['Accounting','Financial Documents']], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>