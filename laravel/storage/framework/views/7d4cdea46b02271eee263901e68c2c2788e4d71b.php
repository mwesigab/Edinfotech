

<?php $__env->startSection('tab3','active'); ?>
<?php $__env->startSection('tab'); ?>
        <div class="h-20"></div>
        <?php if(count($lists) == 0): ?>
            <div class="text-center">
                <img src="/assets/images/empty/financialdocs.png">
                <div class="h-20"></div>
                <span class="empty-first-line"><?php echo e(trans('main.no_financial_doc')); ?></span>
                <div class="h-20"></div>
            </div>
        <?php else: ?>
            <div class="table-responsive">
                <table class="table ucp-table" id="log-table">
                    <thead class="back-orange">
                        <th width="20" class="text-center">#</th>
                        <th class="cell-ta"><?php echo e(trans('main.title')); ?></th>
                        <th class="cell-ta"><?php echo e(trans('main.description')); ?></th>
                        <th class="text-center" width="100"><?php echo e(trans('main.amount')); ?> (<?php echo e(currencySign()); ?>)</th>
                        <th class="text-center" width="100"><?php echo e(trans('main.type')); ?></th>
                        <th class="text-center" width="100"><?php echo e(trans('main.creator')); ?></th>
                        <th class="text-center" width="200"><?php echo e(trans('main.date')); ?></th>

                    </thead>
                    <tbody>
                            <?php $__currentLoopData = $lists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td class="text-center"><?php echo e(isset($item->id) ? $item->id : 0); ?></td>
                                    <td class="cell-ta"><?php echo e(isset($item->title) ? $item->title : ''); ?></td>
                                    <td class="cell-ta"><?php echo e(isset($item->description) ? $item->description : ''); ?></td>
                                    <td class="text-center"><b <?php if($item->type =='add'): ?> class="green-s" <?php else: ?> class="red-s" <?php endif; ?>><?php echo e(isset($item->price) ? $item->price : ''); ?></b></td>
                                    <td class="text-center">
                                        <?php if($item->type =='add'): ?>
                                            <b class="green-s"><?php echo e(trans('main.addiction')); ?></b>
                                        <?php else: ?>
                                            <b class="red-s"><?php echo e(trans('main.deduction')); ?></b>
                                        <?php endif; ?>
                                    </td>
                                    <td class="text-center">
                                        <?php if($item->mode == 'auto'): ?>
                                            <span><?php echo e(trans('main.automatic')); ?></span>
                                        <?php else: ?>
                                            <span><?php echo e(isset($item->exporter->name) ? $item->exporter->name : $item->exporter->username); ?></span>
                                        <?php endif; ?>
                                    </td>
                                    <td class="text-center" width="150"><?php echo e(date('d F Y | H:i',$item->create_at)); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                </table>
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
        <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make($user['vendor'] == 1?'user.layout.balancelayout':'user.layout_user.balancelayout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>