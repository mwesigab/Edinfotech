<?php $__env->startSection('title'); ?>
    <?php echo trans('admin.send_email'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page'); ?>

    <?php if(!empty(session('status'))): ?>
    <?php if(session('status') == 'error'): ?>
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <strong><?php echo e(trans('admin.email_unable')); ?></strong>
        </div>
    <?php else: ?>
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <strong>
                <?php echo e(trans('admin.email_sent_successfully')); ?>

            </strong>
        </div>
    <?php endif; ?>
    <?php endif; ?>

    <section class="card">
        <div class="card-body">

            <form action="/admin/email/sendMail" class="form-horizontal form-bordered" method="post">

                <div class="form-group">
                    <label class="col-md-1 control-label" for="inputDefault"><?php echo e(trans('admin.th_title')); ?></label>
                    <div class="col-md-11">
                        <input type="text" name="subject" class="form-control" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-1 control-label" for="inputDefault"><?php echo e(trans('admin.receipts')); ?></label>
                    <div class="col-md-11" dir="ltr">
                            <select name="recipent[]" multiple  class="form-control selectric text-left">
                                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($user->email); ?>"><?php echo e($user->username); ?> (<?php echo e($user->name); ?>)</option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-1 control-label" for="inputDefault"><?php echo e(trans('admin.templates')); ?></label>
                    <div class="col-md-11">
                        <select id="template" name="template" class="form-control">
                            <option value=""></option>
                            <?php $__currentLoopData = $template; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $temp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($temp->id); ?>"><?php echo e($temp->title); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-2 control-label"><?php echo e(trans('admin.attachments')); ?></label>
                    <div class="col-md-11">
                        <div class="input-group">
                            <input type="text" name="attach" dir="ltr" class="form-control">
                            <span class="input-group-append click-for-upload cu-p">
                                <span class="input-group-text"><i class="fa fa-upload" aria-hidden="true"></i></span>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-12">
                        <textarea class="summernote" name="message" required></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-12">
                        <button class="btn btn-primary pull-left" type="submit"><?php echo e(trans('admin.send')); ?></button>
                    </div>
                </div>

            </form>
        </div>
    </section>

<?php $__env->stopSection(); ?>




<?php echo $__env->make('admin.newlayout.layout',['breadcom'=>[trans('admin.send_email')]], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>