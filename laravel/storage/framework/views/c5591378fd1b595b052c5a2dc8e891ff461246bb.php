

<?php $__env->startSection('tab1','active'); ?>
<?php $__env->startSection('tab'); ?>
        <div class="h-20"></div>
        <?php if(count($lists) == 0): ?>
            <div class="text-center">
                <img src="/assets/images/empty/sales.png">
                <div class="h-20"></div>
                <span class="empty-first-line"><?php echo e(trans('main.no_sale')); ?></span>
                <div class="h-20"></div>
            </div>
        <?php else: ?>
            <div class="table-responsive">
                <table class="table ucp-table" id="download-table">
                    <thead class="back-orange">
                        <th width="20" class="text-center">#</th>
                        <th><?php echo e(trans('main.course_title')); ?></th>
                        <th class="text-center" width="100"><?php echo e(trans('main.customer')); ?></th>
                        <th class="text-center" width="50"><?php echo e(trans('main.price')); ?></th>
                        <th class="text-center" width="50"><?php echo e(trans('main.paid_amount')); ?></th>
                        <th class="text-center" width="100"><?php echo e(trans('main.income')); ?></th>
                        <th class="text-center" width="50"><?php echo e(trans('main.discount')); ?></th>
                        <th class="text-center" width="100"><?php echo e(trans('main.delivery_type')); ?></th>
                        <th class="text-center" width="200"><?php echo e(trans('main.date')); ?></th>
                        <th class="text-center" width="100"><?php echo e(trans('main.status')); ?></th>
                        <th class="text-center" width="40"><?php echo e(trans('main.more_info')); ?></th>
                    </thead>
                        <tbody>
                            <?php $__currentLoopData = $lists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if(isset($item->content->metas)): ?>
                                <?php $contentMeta = arrayToList($item->content->metas,'option','value'); ?>
                                    <tr>
                                        <td class="text-center" width="20"><?php echo e(isset($item->id) ? $item->id : ''); ?></td>
                                        <td class="text-left"><a href="/product/<?php echo e(isset($item->content->id) ? $item->content->id : 0); ?>" class="color-in" target="_blank"><?php echo e($item->content->title); ?></a></td>
                                        <td class="text-center"><a href="/profile/<?php echo e(isset($item->buyer->id) ? $item->buyer->id : 0); ?>" class="color-in" target="_blank"><?php echo e(isset($item->buyer->username) ? $item->buyer->username : ''); ?></a></td>
                                        <td class="text-center"><?php echo e(isset($item->transaction->price_content) ? $item->transaction->price_content : 0); ?></td>
                                        <td class="text-center"><?php echo e(isset($item->transaction->price) ? $item->transaction->price : 0); ?></td>
                                        <td class="text-center"><?php echo e(isset($item->transaction->income) ? $item->transaction->income : 0); ?></td>
                                        <?php if(isset($item->transaction->price) && $item->transaction->price > 0 && $item->transaction->price_content>0 &&  (100-($item->transaction->price/$item->transaction->price_content)*100)>0): ?>
                                            <td class="text-center">%<?php echo e(100-(($item->transaction->price/$item->transaction->price_content)*100)); ?></td>
                                        <?php else: ?>
                                            <td class="text-center">%0</td>
                                        <?php endif; ?>
                                        <td class="text-center">
                                            <?php if($item->type == "download"): ?>
                                                <span class="green-s"><?php echo e(trans('main.download')); ?></span>
                                            <?php elseif($item->type == 'subscribe'): ?>
                                                <span class="blue-s"><?php echo e(trans('main.subscribe')); ?></span>
                                            <?php else: ?>
                                                <span class="blue-s"><?php echo e(trans('main.postal')); ?></span>
                                            <?php endif; ?>
                                        </td>
                                        <td class="text-center" width="150"><?php echo e(date('d F Y | H:i',$item->create_at)); ?></td>
                                        <td class="text-center" width="100">
                                            <?php if($item->type=="download"): ?>
                                                <b class="green-s"><?php echo e(trans('main.successful')); ?></b>
                                            <?php else: ?>
                                                <?php if($item->post_feedback == null): ?>
                                                    <b><?php echo e(trans('main.waiting_delivery')); ?></b>
                                                <?php elseif($item->post_feedback == 1): ?>
                                                    <b class="green-s"><?php echo e(trans('main.successful')); ?></b>
                                                <?php elseif($item->post_feedback == 2 || $item->post_feedback == 3): ?>
                                                    <b class="red-s"><?php echo e(trans('main.failed')); ?></b>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        </td>
                                        <td class="text-center">
                                            <?php if($item->type == 'post'): ?>
                                                <a class="gray-s" href="#" data-toggle="modal" data-target="#post<?php echo e(isset($item->id) ? $item->id : 0); ?>" title="More info"><span class="crticon mdi mdi-package"></span></a>
                                            <?php else: ?>
                                                #
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="post<?php echo e(isset($item->id) ? $item->id : 0); ?>">
                                    <div class="modal-dialog">
                                        <form class="form form-horizontal" method="post" action="/user/video/buy/confirm/<?php echo e(isset($item->id) ? $item->id : 0); ?>">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                    <h4 class="modal-title"><?php echo e(trans('main.shipping_detail')); ?></h4>
                                                </div>
                                                <div class="modal-body">
                                                    <p> <?php echo e(trans('main.tracking_code')); ?>: <strong><?php if($item->post_code == null || $item->post_code == ''): ?> <?php echo '<b class="red-s">Parcel not sent yet.</b>'; ?> <?php else: ?> <?php echo e(isset($item->post_code) ? $item->post_code : ''); ?> <?php endif; ?></strong></p>
                                                    <br>
                                                    <p>  <?php echo e(trans('main.shipping_date')); ?> <strong><?php if(is_numeric($item->post_code_date)): ?> <?php echo e(date('d F Y | H:i',$item->post_code_date)); ?> <?php endif; ?></strong></p>
                                                    <br>
                                                    <p> <?php echo e(trans('main.address')); ?>: <strong><?php echo e(userAddress($item->buyer_id)); ?></strong></p>
                                                </div>
                                                <div class="modal-footer">
                                                    <span class="pull-right star-rate-text"><?php echo e(trans('main.feedback')); ?></span>&nbsp;
                                                    <span class="pull-right star-rate" data-score="<?php echo e(isset($item->rate->rate) ? $item->rate->rate : 0); ?>" disabled=""></span>
                                                    <button type="button" class="btn btn-custom" data-dismiss="modal"><?php echo e(trans('main.close')); ?></button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <?php endif; ?>
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
<?php $__env->startSection('script'); ?>
    <script>$('#balance-hover').addClass('item-box-active');</script>
    <script>
        $('.star-rate').raty({
            readOnly: true,
            starType: 'i',
            score: function () {
                return $(this).attr('data-score');
            }
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make($user['vendor'] == 1?'user.layout.balancelayout':'user.layout_user.balancelayout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>