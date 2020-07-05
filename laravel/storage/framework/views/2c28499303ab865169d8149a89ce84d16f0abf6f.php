

<?php $__env->startSection('tab2','active'); ?>
<?php $__env->startSection('tab'); ?>
    <div class="h-20"></div>
    <?php if(count($lists) == 0): ?>
        <div class="text-center">
            <img src="/assets/images/empty/comments.png">
            <div class="h-20"></div>
            <span class="empty-first-line"><?php echo e(trans('main.no_comment')); ?></span>
            <div class="h-20"></div>
        </div>
    <?php else: ?>
        <div class="col-xs-12">
            <div class="row">
                <div class="table-responsive">
                    <table class="table ucp-table">
                        <thead class="back-orange">
                        <tr>
                            <th class="cell-ta"><?php echo e(trans('main.comment')); ?></th>
                            <th width="400" class="text-center"><?php echo e(trans('main.course')); ?></th>
                            <th width="200" class="text-center"><?php echo e(trans('main.user')); ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $lists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td class="lh180 cell-ta"><?php echo e(isset($item->comment) ? $item->comment : ''); ?></td>
                                <td class="text-center"><a href="/product/<?php echo e(isset($item->content->id) ? $item->content->id : 0); ?>"><?php echo e(isset($item->content->title) ? $item->content->title : 'Removed'); ?></a></td>
                                <td class="text-center"><a href="/profile/<?php echo e(isset($item->user->id) ? $item->user->id : 0); ?>"><?php echo e(isset($item->name) ? $item->name : $item->user->username); ?></a> </td>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make($user['vendor'] == 1?'user.layout.supportlayout':'user.layout_user.supportlayout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>