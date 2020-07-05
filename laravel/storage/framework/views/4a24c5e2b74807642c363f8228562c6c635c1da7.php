<?php $__env->startSection('title'); ?>
<?php echo e(trans('admin.transactions_bradcom')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page'); ?>

    <section class="card">

        <div class="card-body">
                <form>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="input-group">
                                <input type="date" id="fsdate" value="<?php echo isset($_GET['fsdate']) ? $_GET['fsdate'] : ''; ?>" class="text-center form-control" name="fsdate" placeholder="Start Date">
                                <input type="hidden" id="fdate" name="fdate">
                                <span class="input-group-append fdatebtn" id="fdatebtn">
                                    <span class="input-group-text"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                                </span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group">
                                <input type="date" id="lsdate" value="<?php echo isset($_GET['lsdate']) ? $_GET['lsdate'] : ''; ?>" class="text-center form-control" name="lsdate" placeholder="End Date">
                                <input type="hidden" id="ldate" name="ldate">
                                <span class="input-group-append ldatebtn" id="ldatebtn">
                                    <span class="input-group-text"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                                </span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <input type="submit" class="text-center btn btn-primary w-100" value="Show Results">
                        </div>
                    </div>
                </form>
            <div class="h-20"></div>
            <?php if(count($lists)>0): ?>
                <div class="alert alert-info">
                    <span><?php echo e(trans('admin.since')); ?></span>
                    <span class="f-w-b"><?php echo e(date('d F Y : H:i',$first->create_at)); ?></span>
                    <span><?php echo e(trans('admin.till')); ?></span>
                    <span class="f-w-b"><?php echo e(date('d F Y : H:i',$last->create_at)); ?></span>
                    <span></span><?php echo e(trans('admin.total_transactions_amount')); ?></span>
                    <span class="f-w-b"><?php echo e(isset($allPrice) ? $allPrice : 0); ?></span>
                    <span><?php echo e(trans('admin.cur_dollar')); ?></span>
                    <span><?php echo e(trans('admin.and_business_income_is')); ?></span>
                    <span class="f-w-b"><?php echo e(isset($siteIncome) ? $siteIncome : 0); ?></span>
                    <span><?php echo e(trans('admin.cur_dollar')); ?></span>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <section class="card">
        <header class="card-heading">
            <div class="card-actions">
                <a href="#" class="card-action card-action-toggle" data-card-toggle></a>
                <a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
            </div>

            <h2 class="card-title"></h2><?php echo e(trans('admin.transactions_list_header')); ?></h2>
        </header>
        <div class="card-body">
            <table class="table table-bordered table-striped mb-none" id="datatable-details">
                <thead>
                <tr>
                    <th class="text-center"><?php echo e(trans('admin.th_customer')); ?></th>
                    <th class="text-center"><?php echo e(trans('admin.th_vendor')); ?></th>
                    <th class="text-center"><?php echo e(trans('admin.th_course')); ?></th>
                    <th class="text-center"><?php echo e(trans('admin.total_payment_table_header')); ?></th>
                    <th class="text-center"><?php echo e(trans('admin.business_income_table_header')); ?></th>
                    <th class="text-center" width="150"><?php echo e(trans('admin.th_date')); ?></th>
                    <th class="text-center" width="50"><?php echo e(trans('admin.th_status')); ?></th>
                </tr>
                </thead>
                <tbody>
                    <?php if(!empty($lists)): ?>
                        <?php $__currentLoopData = $lists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <th class="text-center"><a href="/profile/<?php echo e(isset($item->buyer->id) ? $item->buyer->id : 0); ?>" target="_blank"><?php echo e(isset($item->buyer->name) ? $item->buyer->name : ''); ?></a></th>
                                <th class="text-center"><a href="/profile/<?php echo e(isset($item->user->id) ? $item->user->id : 0); ?>" target="_blank"><?php echo e(isset($item->user->name) ? $item->user->name : ''); ?></a></th>
                                <th class="text-center"><a href="/product/<?php echo e(isset($item->content->id) ? $item->content->id : 0); ?>" target="_blank"><?php echo e(isset($item->content->title) ? $item->content->title : ''); ?></a></th>
                                <th class="text-center"><?php echo e(isset($item->price) ? $item->price : 0); ?><br><?php echo e(trans('admin.cur_dollar')); ?></th>
                                <th class="text-center"><?php echo e(isset($item->income) ? $item->income : 0); ?><br><?php echo e(trans('admin.cur_dollar')); ?></th>
                                <td class="text-center" width="150"><?php echo e(date('d F Y : H:i',$item->create_at)); ?></td>
                                <td class="text-center">
                                    <?php if($item->mode == 'deliver'): ?>
                                        <i class="fa fa-check c-g" aria-hidden="true" title="Successfully Paid"></i>
                                    <?php else: ?>
                                        <i class="fa fa-times c-r" aria-hidden="true" title="Waiting For Payment"></i>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.newlayout.layout',['breadcom'=>['Reports','Transactions']], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>