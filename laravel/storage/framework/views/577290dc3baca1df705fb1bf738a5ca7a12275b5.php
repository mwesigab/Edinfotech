

<?php $__env->startSection('tab3','active'); ?>
<?php $__env->startSection('tab'); ?>

    <div class="h-20"></div>
    <div class="row">
        <div class="col-md-6 col-xs-12 tab-con">
            <div class="ucp-section-box">
                <div class="header back-red"><?php echo e(trans('main.new_support_ticket')); ?></div>
                <div class="body">
                    <form method="post" action="/user/ticket/store">

                        <div class="form-group">
                            <label class="control-label" for="inputDefault"><?php echo e(trans('main.title')); ?></label>
                            <input type="text" name="title" class="form-control" id="inputDefault" <?php if(isset($_GET['type']) && $_GET['type'] == 'become_vendor'): ?> value="<?php echo trans('main.become_vendor_title'); ?>" disabled <?php endif; ?> required>
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="inputDefault"><?php echo e(trans('main.department')); ?></label>
                            <select name="category_id" class="form-control font-s" required>
                                <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e(isset($cat->id) ? $cat->id : ''); ?>"><?php echo e(isset($cat->title) ? $cat->title : ''); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="control-label control-label-p"><?php echo e(trans('main.attachment')); ?></label>
                            <div class="input-group">
                                <input type="text" name="attach" class="form-control text-left" dir="ltr">
                                <span class="input-group-addon click-for-upload img-icon-s"><span class="formicon mdi mdi-arrow-up-thick"></span></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label"><?php echo e(trans('main.description')); ?></label>
                            <textarea class="form-control" rows="7" name="msg" required></textarea>
                        </div>


                        <div class="form-group">
                            <button type="submit" class="btn btn-custom pull-left" value="Reply"><?php echo e(trans('main.send')); ?></button>
                        </div>


                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xs-12 tab-con">
            <?php if(count($lists) == 0): ?>
                <div class="text-center">
                    <img src="/assets/images/empty/tickets.png">
                    <div class="h-20"></div>
                    <span class="empty-first-line"><?php echo e(trans('main.no_sup_ticket')); ?></span>
                    <div class="h-20"></div>
                </div>
            <?php else: ?>
                <div class="table-responsive">
                    <table class="table ucp-table" id="ticket-table">
                        <thead class="back-blue">
                            <tr>
                                <th class="cell-ta"><?php echo e(trans('main.title')); ?></th>
                                <th width="100" class="text-center"><?php echo e(trans('main.status')); ?></th>
                                <th width="100" class="text-center"><?php echo e(trans('main.controls')); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $lists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td class="cell-ta"><?php echo e(isset($item->title) ? $item->title : ''); ?></td>
                                    <td class="text-center">
                                        <?php if($item->mode == 'open'): ?>

                                            <?php if($item->messages->last()['mode'] == 'admin'): ?>
                                                <?php echo e('Staff Reply'); ?>

                                            <?php else: ?>
                                                <?php echo e('Waiting'); ?>

                                            <?php endif; ?>

                                        <?php else: ?>
                                            <?php echo e('Closed'); ?>

                                        <?php endif; ?>
                                    </td>
                                    <td class="text-center">
                                        <a href="/user/ticket/reply/<?php echo e($item->id); ?>" title="View/Reply"><span class="crticon mdi mdi-message-text"></span></a>
                                        <?php if($item->mode == 'open'): ?>
                                            <a href="/user/ticket/close/<?php echo e($item->id); ?>" title="Close Ticket"><span class="crticon mdi mdi-close-octagon"></span></a>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            <?php endif; ?>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make($user['vendor'] == 1?'user.layout.supportlayout':'user.layout_user.supportlayout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>