<?php $__env->startSection('tab1','active'); ?>
<?php $__env->startSection('tab'); ?>
    <div class="h-20"></div>
    <?php if(count($lists) == 0): ?>
        <div class="text-center">
            <img src="/assets/images/empty/Videos.png">
            <div class="h-20"></div>
            <span class="empty-first-line"><?php echo e(trans('main.no_course')); ?></span>
            <div class="h-10"></div>
            <span class="empty-second-line">
                <span><?php echo e(trans('main.go_to')); ?></span>
                <a href="/user/content/new"><?php echo e(trans('main.upload_page')); ?></a>
                <span><?php echo e(trans('main.upload_your_first_course')); ?></span>
            </span>
            <div class="h-20"></div>
        </div>
    <?php else: ?>
        <div class="table-responsive">
            <table class="table ucp-table" id="content-table">
                                    <thead class="thead-s">
                                    <th class="text-center" width="80"><?php echo e(trans('main.item_no')); ?></th>
                                    <th><?php echo e(trans('main.title')); ?></th>
                                    <th class="text-center" width="200"><?php echo e(trans('main.publish_date')); ?></th>
                                    <th class="text-center" width="50"><?php echo e(trans('main.sales')); ?></th>
                                    <th class="text-center" width="50"><?php echo e(trans('main.parts')); ?></th>
                                    <th class="text-center" width="200"><?php echo e(trans('main.category')); ?></th>
                                    <th class="text-center" width="100"><?php echo e(trans('main.status')); ?></th>
                                    <th class="text-center" width="100"><?php echo e(trans('main.controls')); ?></th>
                                    </thead>
                                    <tbody>
                                    <?php $__currentLoopData = $lists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td class="text-center" width="50">VT-<?php echo e(isset($item->id) ? $item->id : 0); ?></td>
                                            <?php if($item->mode == 'publish'): ?>
                                                <td><a href="/product/<?php echo e(isset($item->id) ? $item->id : 0); ?>" target="_blank"><?php echo e($item->title); ?></a></td>
                                            <?php else: ?>
                                                <td><?php echo e($item->title); ?></td>
                                            <?php endif; ?>
                                            <td class="text-center" width="150"><?php echo e(date('d F Y | H:i',$item->create_at)); ?></td>
                                            <td class="text-center"><?php echo e(isset($item->sells_count) ? $item->sells_count : '0'); ?></td>
                                            <td class="text-center"><?php echo e(isset($item->partsactive_count) ? $item->partsactive_count : '0'); ?></td>
                                            <td class="text-center"><a href="/category/<?php echo e(isset($item->category->class) ? $item->category->class : ''); ?>"><?php echo e(isset($item->category->title) ? $item->category->title : ''); ?></a></td>
                                            <td class="text-center">
                                                <?php if($item->mode == 'publish'): ?>
                                                    <b class="green-s"><?php echo e(trans('main.published')); ?></b>
                                                <?php elseif($item->mode == 'draft'): ?>
                                                    <b class="orange-s"><?php echo e(trans('main.draft')); ?></b>
                                                <?php elseif($item->mode == 'request'): ?>
                                                    <span class="red-s"><?php echo e(trans('main.waiting')); ?></span>
                                                <?php elseif($item->mode == 'delete'): ?>
                                                    <span class="red-s"><?php echo e(trans('main.unpublish_request')); ?></span>
                                                <?php endif; ?>
                                            </td>
                                            <td class="text-center">
                                                <a href="/user/content/edit/<?php echo e($item->id); ?>" title="Edit" class="gray-s"><span class="crticon mdi mdi-lead-pencil"></span></a>
                                                <a href="/user/content/delete/<?php echo e($item->id); ?>" title="Delete" class="gray-s"><span class="crticon mdi mdi-delete-forever"></span></a>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
        </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make($user['vendor'] == 1?'user.layout.videolayout':'user.layout_user.videolayout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>