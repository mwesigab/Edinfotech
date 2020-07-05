

<?php $__env->startSection('pages'); ?>

    <div class="container-fluid">
        <div class="container">
            <div class="h-20"></div>
            <div class="col-md-6 col-xs-12 tab-con">
                <div class="ucp-section-box">
                    <div class="header back-red"><?php echo e(trans('main.add_content_to_channel')); ?></div>
                    <div class="body">
                        <form method="post" action="/user/channel/video/store/<?php echo e(isset($chanel->id) ? $chanel->id : 0); ?>">

                            <div class="form-group">
                                <label class="control-label"><?php echo e(trans('main.content')); ?></label>
                                <select name="content_id" class="form-control font-s">
                                    <?php $__currentLoopData = $userContents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $uc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e(isset($uc->id) ? $uc->id : 0); ?>"><?php echo e(isset($uc->title) ? $uc->title : ''); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>


                            <div class="form-group">
                                <button type="submit" class="btn btn-custom pull-left" value="Save Changes"><?php echo e(trans('main.save_changes')); ?></button>
                            </div>


                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xs-12 tab-con">
                <div class="table-responsive">
                            <table class="table ucp-table">
                            <thead class="back-blue">
                            <th><?php echo e(trans('main.course_title')); ?></th>
                            <th class="text-center" width="50"><?php echo e(trans('main.controls')); ?></th>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $chanel->contents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $content): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e(isset($content->content->title) ? $content->content->title : ''); ?></td>
                                    <td class="text-center" width="50">
                                        <a href="#" data-href="/user/channel/video/delete/<?php echo e(isset($content->id) ? $content->id : ''); ?>" data-toggle="modal" data-target="#confirm-delete" title="Remove video"><span class="crticon mdi mdi-delete-forever"></span></a>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                        </div>
            </div>

        </div>
    </div>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script>$('#channel-hover').addClass('item-box-active');</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.layout.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>