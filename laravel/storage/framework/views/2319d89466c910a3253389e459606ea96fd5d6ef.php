<?php $__env->startSection('title'); ?>
    <?php echo e(trans('admin.financial_analyser')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page'); ?>

    <section class="card">
        <div class="card-body">
            <form>
                <div class="row">
                    <div class="col-md-5">
                        <div class="input-group">
                            <input type="date" id="fsdate" value="<?php echo isset($_GET['fsdate']) ? $_GET['fsdate'] : ''; ?>" class="text-center form-control" name="fsdate" placeholder="Start Date">
                            <input type="hidden" id="fdate" name="fdate" value="<?php echo isset($_GET['fdate']) ? $_GET['fdate'] : ''; ?>">
                            <span class="input-group-append fdatebtn" id="fdatebtn">
                                <span class="input-group-text"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                            </span>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="input-group">
                            <input type="date" id="lsdate" value="<?php echo isset($_GET['lsdate']) ? $_GET['lsdate'] : ''; ?>" class="text-center form-control" name="lsdate" placeholder="End Date">
                            <input type="hidden" id="ldate" name="ldate" value="<?php echo isset($_GET['ldate']) ? $_GET['ldate'] : ''; ?>">
                            <span class="input-group-append ldatebtn" id="ldatebtn">
                                <span class="input-group-text"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                            </span>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <input type="submit" class="text-center btn btn-primary w-100" value="Show Results">
                        </div>
                    </div>
                </div>
            </form>
            <div class="h-20"></div>
            <?php if(count($lists)>0): ?>
                <div class="alert alert-info">
                    <span><?php echo e(trans('admin.from')); ?></span>
                    <span class="f-w-b"><?php echo e(date('d F Y / H:i',$last->create_at)); ?></span>
                    <span><?php echo e(trans('admin.till')); ?></span>
                    <span class="f-w-b"><?php echo e(date('d F Y / H:i',$first->create_at)); ?></span>
                    <span><?php echo e(trans('admin.your_business_income_is')); ?></span>
                    <span class="f-w-b" dir="ltr"><?php echo e(isset($alladd) ? $alladd : 0); ?></span>
                    <span><?php echo e(trans('admin.cur_dollar')); ?> <?php echo e(trans('admin.and_total_cost_is')); ?></span>
                    <span class="f-w-b color-red-i" dir="ltr"><?php echo e(isset($allminus) ? $allminus : 0); ?></span>
                    <span><?php echo e(trans('admin.cur_dollar')); ?>.</span>
                    <span><?php echo e(trans('admin.business_net_profit')); ?></span>
                    <b class="color-blue" dir="ltr"><?php echo e($alladd-$allminus); ?></b>
                    <span><?php echo e(trans('admin.cur_dollar')); ?></span>
                </div>
            <?php endif; ?>
        </div>
    </section>
    <section class="card">
        <div class="card-body">
            <table class="table table-bordered table-striped mb-none" id="datatable-details">
                <thead>
                <tr>
                    <th class="text-center" width="50">#</th>
                    <th class="text-center" width="170"><?php echo e(trans('admin.th_date')); ?></th>
                    <th class="text-center"><?php echo e(trans('admin.th_title')); ?></th>
                    <th class="text-center"><?php echo e(trans('admin.document_type')); ?></th>
                    <th class="text-center"><?php echo e(trans('admin.amount')); ?></th>
                    <th class="text-center"><?php echo e(trans('admin.creator')); ?></th>
                    <th class="text-center"><?php echo e(trans('admin.description')); ?></th>
                    <td class="text-center"><?php echo e(trans('admin.th_controls')); ?></td>
                </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $lists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td class="text-center"><?php echo e($item->id); ?></td>
                            <td class="text-center" width="170"><?php echo e(date('d F Y : H:i',$item->create_at)); ?></td>
                            <td class="text-center"><?php echo e($item->title); ?></td>
                            <td class="text-center">
                                <?php if($item->type == 'add'): ?>
                                    <span class="f-w-b color-green"><?php echo e(trans('admin.addiction')); ?></span>
                                <?php else: ?>
                                    <span class="f-w-b color-red-i"><?php echo e(trans('admin.deduction')); ?></span>
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
                                    <span><a href="/admin/user/item/<?php echo e(isset($item->exporter->id) ? $item->exporter->id : 0); ?>"><?php echo e(isset($item->exporter->name) ? $item->exporter->name : ''); ?></a></span>
                                <?php endif; ?>
                            </td>
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

<?php echo $__env->make('admin.newlayout.layout',['breadcom'=>['Accounting','Financial Analyser']], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>