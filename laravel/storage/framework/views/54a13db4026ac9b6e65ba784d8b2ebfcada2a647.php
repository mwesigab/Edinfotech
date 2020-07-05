<?php $__env->startSection('tab4','active'); ?>
<?php $__env->startSection('tab'); ?>

    <div class="h-20"></div>
    <?php if(count($lists) == 0): ?>
        <div class="text-center">
            <img src="/assets/images/empty/notification.png">
            <div class="h-20"></div>
            <span class="empty-first-line"><?php echo e(trans('main.no_notification_es')); ?></span>
            <div class="h-20"></div>
        </div>
    <?php else: ?>
    <div class="col-xs-12">
            <div class="row">
                <div class="table-responsive">
                    <table class="table ucp-table" id="notification-table">
                        <thead class="back-orange">
                        <tr>
                            <th width="200" class="cell-ta"><?php echo e(trans('main.title')); ?></th>
                            <th class="cell-ta"><?php echo e(trans('main.text')); ?></th>
                            <th width="200" class="text-center"><?php echo e(trans('main.date')); ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $lists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td class="lh180 cell-ta"><?php echo e(isset($item->title) ? $item->title : ''); ?></td>
                                <td class="lh180 cell-ta"><?php echo isset($item->msg) ? $item->msg : ''; ?></td>
                                <td class="text-center"><?php echo e(date('d F Y H:i',$item->create_at)); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        <div class="row">
        <?php if(!isset($_GET['p']) && $count>20): ?>
            <a href="?p=1" class="next-pagination pull-left"><span class="pagicon mdi mdi-chevron-left"></span></a>
        <?php endif; ?>
        <?php if(isset($_GET['p']) && $count>($_GET['p']+1)*20): ?>
            <a href="?p=<?php echo e($_GET['p']+1); ?>" class="next-pagination pull-left"><span class="pagicon mdi mdi-chevron-left"></span></a>
        <?php endif; ?>
        <?php if(isset($_GET['p']) && $_GET['p']>0): ?>
            <a href="?p=<?php echo e($_GET['p']-1); ?>" class="next-pagination pull-right"><span class="pagicon mdi mdi-chevron-right"></span></a>
        <?php endif; ?>
        </div>
    </div>
    <?php endif; ?>
    <div class="h-20"></div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make($user['vendor'] == 1?'user.layout.supportlayout':'user.layout_user.supportlayout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>