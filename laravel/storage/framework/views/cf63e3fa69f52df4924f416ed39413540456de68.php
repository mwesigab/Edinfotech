<?php $__env->startSection('title'); ?>
    <?php echo e(trans('admin.badges_pagetitle')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page'); ?>
    <div class="card">
        <div class="card-body">
            <ul class="nav nav-pills">
                <li class="nav-item"><a class="nav-link active" href="#day" data-toggle="tab"> <?php echo e(trans('admin.badges_tab_com_age')); ?></a></li>
                <li class="nav-item"><a class="nav-link" href="#videocount" data-toggle="tab"> <?php echo e(trans('admin.badges_tab_courses_count')); ?> </a></li>
                <li class="nav-item"><a class="nav-link" href="#sellcount" data-toggle="tab"> <?php echo e(trans('admin.badges_tab_sales')); ?> </a></li>
                <li class="nav-item"><a class="nav-link" href="#buycount" data-toggle="tab"> <?php echo e(trans('admin.badges_tab_purchase')); ?> </a></li>
                <li class="nav-item"><a class="nav-link" href="#supportrate" data-toggle="tab"> <?php echo e(trans('admin.badges_tab_support_feedback')); ?> </a></li>
                <li class="nav-item"><a class="nav-link" href="#productrate" data-toggle="tab"> <?php echo e(trans('admin.badges_tab_course_rating')); ?></a></li>
                <li class="nav-item"><a class="nav-link" href="#postrate" data-toggle="tab"><?php echo e(trans('admin.badges_tab_postal_feedback')); ?> </a></li>
            </ul>
            <hr>
            <div class="tab-content">
                <div id="day" class="tab-pane active">
                    <form method="post" action="/admin/user/rate/store" class="form-horizontal form-bordered">

                        <input type="hidden" name="mode" value="day">
                        <input type="hidden" name="edit" value="<?php echo e(isset($item->id) ? $item->id : ''); ?>">

                        <div class="form-group">
                            <label class="col-md-3 control-label" for="inputDefault"><?php echo e(trans('admin.badge_title')); ?></label>
                            <div class="col-md-6">
                                <input type="text" name="description" value="<?php echo e(isset($item->description) ? $item->description : ''); ?>" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label" for="inputDefault"><?php echo e(trans('admin.badge_icon')); ?></label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-prepend view-selected cu-p" data-toggle="modal" data-target="#ImageModal" data-whatever="image">
                                        <span class="input-group-text"><i class="fa fa-eye" aria-hidden="true"></i></span>
                                    </span>
                                    <input type="text" name="image" dir="ltr" value="<?php echo e(isset($item->image) ? $item->image : ''); ?>" class="form-control">
                                    <span class="input-group-append click-for-upload cu-p">
                                        <span class="input-group-text"><i class="fa fa-upload" aria-hidden="true"></i></span>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label"><?php echo e(trans('admin.gift_charge')); ?></label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input type="text" name="price" value="<?php echo e(isset($item->gift) ? $item->gift : ''); ?>" class="form-control text-center numtostr">
                                    <div class="input-group-append click-for-upload cu-p">
                                        <span class="input-group-text"><?php if(!empty($item->gift)): ?> <?php echo e(num2str($item->gift)); ?> <?php endif; ?> <?php echo e(trans('admin.cur_dollar')); ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label" for="inputDefault"><?php echo e(trans('admin.badge_commission')); ?></label>
                            <div class="col-md-6">
                                <input type="number" name="commision" value="<?php echo e(isset($item->commision) ? $item->commision : 0); ?>" placeholder="%" class="form-control text-center">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label"><?php echo e(trans('admin.registration_days')); ?></label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <span class="input-group-text"><?php echo e(trans('admin.from')); ?></span>
                                    </span>
                                    <input type="number" class="form-control" value="<?php echo e(isset($item->start) ? $item->start : ''); ?>" name="start" required>
                                    <span class="input-group-append">
                                        <span class="input-group-text"><?php echo e(trans('admin.to')); ?></span>
                                    </span>
                                    <input type="number" class="form-control" value="<?php echo e(isset($item->end) ? $item->end : ''); ?>" name="end" required>
                                    <div class="input-group-append">
                                        <div class="input-group-text"><?php echo e(trans('admin.days')); ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label"></label>
                            <div class="col-md-6">
                                <button class="btn btn-primary" type="submit"><?php echo e(trans('admin.save_changes')); ?></button>
                            </div>
                        </div>

                    </form>
                    <table class="table table-bordered table-striped mb-none" id="datatable-basic">
                        <thead>
                        <tr>
                            <th class="text-center" width="100"><?php echo e(trans('admin.badge_icon')); ?></th>
                            <th><?php echo e(trans('admin.badge_title')); ?></th>
                            <th class="text-center" width="200"><?php echo e(trans('admin.role')); ?></th>
                            <th class="text-center" width="200">(<?php echo e(trans('admin.cur_dollar')); ?>) <?php echo e(trans('admin.gift_charge')); ?> </th>
                            <th class="text-center" width="200"><?php echo e(trans('admin.badge_commission')); ?></th>
                            <th class="text-center" width="150"><?php echo e(trans('admin.th_controls')); ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $lists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($list->mode == 'day'): ?>
                                <tr>
                                    <td class="text-center"><img src="<?php echo e($list->image); ?>" width="24" /></td>
                                    <td><?php echo e($list->description); ?></td>
                                    <td class="text-center"><?php echo e(str_replace(',',' to ',$list->value)); ?></td>
                                    <td class="text-center"><?php echo e(isset($list->gift) ? $list->gift : 0); ?></td>
                                    <td class="text-center"><?php echo e(isset($list->commision) ? $list->commision : 0); ?></td>
                                    <td class="text-center">
                                        <a href="/admin/user/rate/edit/<?php echo e($list->id); ?>/day#day" title="Edit"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                        <a href="#" data-href="/admin/user/rate/delete/<?php echo e($list->id); ?>/day" title="Delete" data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-times" aria-hidden="true"></i></a>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
                <div id="videocount" class="tab-pane">
                    <form method="post" action="/admin/user/rate/store" class="form-horizontal form-bordered">

                        <input type="hidden" name="mode" value="videocount">
                        <input type="hidden" name="edit" value="<?php echo e(isset($item->id) ? $item->id : ''); ?>">

                        <div class="form-group">
                            <label class="col-md-3 control-label" for="inputDefault"><?php echo e(trans('admin.badge_title')); ?></label>
                            <div class="col-md-6">
                                <input type="text" name="description" value="<?php echo e(isset($item->description) ? $item->description : ''); ?>" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label" for="inputDefault"><?php echo e(trans('admin.badge_icon')); ?></label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-prepend view-selected cu-p" data-toggle="modal" data-target="#ImageModal" data-whatever="image">
                                        <span class="input-group-text"><i class="fa fa-eye" aria-hidden="true"></i></span>
                                    </span>
                                    <input type="text" name="image" dir="ltr" value="<?php echo e(isset($item->image) ? $item->image : ''); ?>" class="form-control">
                                    <span class="input-group-append click-for-upload cu-p">
                                        <span class="input-group-text"><i class="fa fa-upload" aria-hidden="true"></i></span>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label"><?php echo e(trans('admin.gift_charge')); ?></label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input type="text" name="price" value="<?php echo e(isset($item->gift) ? $item->gift : ''); ?>" class="form-control text-center numtostr">
                                    <span class="input-group-append click-for-upload cu-p">
                                        <span class="input-group-text"><?php if(!empty($item->gift)): ?> <?php echo e(num2str($item->gift)); ?> <?php endif; ?> <?php echo e(trans('admin.cur_dollar')); ?></span>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label" for="inputDefault"><?php echo e(trans('admin.badge_commission')); ?></label>
                            <div class="col-md-6">
                                <input type="number" name="commision" value="<?php echo e(isset($item->commision) ? $item->commision : 0); ?>" placeholder="%" class="form-control text-center">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label"><?php echo e(trans('admin.badges_tab_courses_count')); ?></label>
                            <div class="col-md-6">
                                <div class="input-group">
														<span class="input-group-prepend">
                                                            <span class="input-group-text"><?php echo e(trans('admin.from')); ?></span>
														</span>
                                    <input type="number" class="form-control" value="<?php echo e(isset($item->start) ? $item->start : ''); ?>" name="start" required>
                                    <span class="input-group-append">
                                        <span class="input-group-text"><?php echo e(trans('admin.to')); ?></span>
                                    </span>
                                    <input type="number" class="form-control" value="<?php echo e(isset($item->end) ? $item->end : ''); ?>" name="end" required>
                                    <span class="input-group-append">
                                        <span class="input-group-text"><?php echo e(trans('admin.courses')); ?></span>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label"></label>
                            <div class="col-md-6">
                                <button class="btn btn-primary" type="submit"><?php echo e(trans('admin.save_changes')); ?></button>
                            </div>
                        </div>

                    </form>
                    <table class="table table-bordered table-striped mb-none" id="datatable-basic">
                        <thead>
                        <tr>
                            <th class="text-center" width="60"><?php echo e(trans('admin.badge_icon')); ?></th>
                            <th><?php echo e(trans('admin.badge_title')); ?></th>
                            <th class="text-center" width="200"><?php echo e(trans('admin.role')); ?></th>
                            <th class="text-center" width="200">(<?php echo e(trans('admin.cur_dollar')); ?>) <?php echo e(trans('admin.gift_charge')); ?></th>
                            <th class="text-center" width="200"><?php echo e(trans('admin.badge_commission')); ?></th>
                            <th class="text-center" width="150"><?php echo e(trans('admin.th_controls')); ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $lists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php if($list->mode == 'videocount'): ?>
                            <tr>
                                <td class="text-center"><img src="<?php echo e($list->image); ?>" width="24" /></td>
                                <td><?php echo e($list->description); ?></td>
                                <td class="text-center"><?php echo e(str_replace(',',' to ',$list->value)); ?></td>
                                <td class="text-center"><?php echo e(isset($list->gift) ? $list->gift : 0); ?></td>
                                <td class="text-center"><?php echo e(isset($list->commision) ? $list->commision : 0); ?></td>
                                <td class="text-center">
                                    <a href="/admin/user/rate/edit/<?php echo e($list->id); ?>/videocount#videocount" title="Edit"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                    <a href="#" data-href="/admin/user/rate/delete/<?php echo e($list->id); ?>/videocount" title="Delete" data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-times" aria-hidden="true"></i></a>
                                </td>
                            </tr>
                        <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
                <div id="sellcount" class="tab-pane">
                    <form method="post" action="/admin/user/rate/store" class="form-horizontal form-bordered">

                        <input type="hidden" name="mode" value="sellcount">
                        <input type="hidden" name="edit" value="<?php echo e(isset($item->id) ? $item->id : ''); ?>">

                        <div class="form-group">
                            <label class="col-md-3 control-label" for="inputDefault"><?php echo e(trans('admin.badge_title')); ?></label>
                            <div class="col-md-6">
                                <input type="text" name="description" value="<?php echo e(isset($item->description) ? $item->description : ''); ?>" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label" for="inputDefault"><?php echo e(trans('admin.badge_icon')); ?></label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-prepend view-selected cu-p" data-toggle="modal" data-target="#ImageModal" data-whatever="image" >
                                        <span class="input-group-text"><i class="fa fa-eye" aria-hidden="true"></i></span>
                                    </span>
                                    <input type="text" name="image" dir="ltr" value="<?php echo e(isset($item->image) ? $item->image : ''); ?>" class="form-control">
                                    <span class="input-group-append click-for-upload cu-p">
                                        <span class="input-group-text"><i class="fa fa-upload" aria-hidden="true"></i></span>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label"><?php echo e(trans('admin.gift_charge')); ?></label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input type="text" name="price" value="<?php echo e(isset($item->gift) ? $item->gift : ''); ?>" class="form-control text-center numtostr">
                                    <div class="input-group-append click-for-upload cu-p">
                                        <span class="input-group-text"><?php if(!empty($item->gift)): ?> <?php echo e(num2str($item->gift)); ?> <?php endif; ?> <?php echo e(trans('admin.cur_dollar')); ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label" for="inputDefault"><?php echo e(trans('admin.badge_commission')); ?></label>
                            <div class="col-md-6">
                                <input type="number" name="commision" value="<?php echo e(isset($item->commision) ? $item->commision : 0); ?>" placeholder="%" class="form-control text-center">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label"><?php echo e(trans('admin.sales_count')); ?></label>
                            <div class="col-md-6">
                                <div class="input-group">
														<span class="input-group-prepend">
                                                            <span class="input-group-text"><?php echo e(trans('admin.from')); ?></span>
														</span>
                                    <input type="number" class="form-control" value="<?php echo e(isset($item->start) ? $item->start : ''); ?>" name="start" required>
                                    <span class="input-group-append">
                                        <span class="input-group-text"><?php echo e(trans('admin.to')); ?></span>
                                    </span>
                                    <input type="number" class="form-control" value="<?php echo e(isset($item->end) ? $item->end : ''); ?>" name="end" required>
                                    <span class="input-group-append">
                                        <span class="input-group-text"><?php echo e(trans('admin.sales')); ?></span>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label"></label>
                            <div class="col-md-6">
                                <button class="btn btn-primary" type="submit"><?php echo e(trans('admin.save_changes')); ?></button>
                            </div>
                        </div>

                    </form>
                    <table class="table table-bordered table-striped mb-none" id="datatable-basic">
                        <thead>
                        <tr>
                            <th class="text-center" width="60"><?php echo e(trans('admin.badge_icon')); ?></th>
                            <th><?php echo e(trans('admin.badge_title')); ?></th>
                            <th class="text-center" width="200"><?php echo e(trans('admin.role')); ?></th>
                            <th class="text-center" width="200">(<?php echo e(trans('admin.cur_dollar')); ?>) <?php echo e(trans('admin.gift_charge')); ?></th>
                            <th class="text-center" width="200"><?php echo e(trans('admin.badge_commission')); ?></th>
                            <th class="text-center" width="150"><?php echo e(trans('admin.th_controls')); ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $lists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php if($list->mode == 'sellcount'): ?>
                            <tr>
                                <td class="text-center"><img src="<?php echo e($list->image); ?>" width="24" /></td>
                                <td><?php echo e($list->description); ?></td>
                                <td class="text-center"><?php echo e(str_replace(',',' to ',$list->value)); ?></td>
                                <td class="text-center"><?php echo e(isset($list->gift) ? $list->gift : 0); ?></td>
                                <td class="text-center"><?php echo e(isset($list->commision) ? $list->commision : 0); ?></td>
                                <td class="text-center">
                                    <a href="/admin/user/rate/edit/<?php echo e($list->id); ?>/sellcount#sellcount" title="Edit"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                    <a href="#" data-href="/admin/user/rate/delete/<?php echo e($list->id); ?>/sellcount" title="Delete" data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-times" aria-hidden="true"></i></a>
                                </td>
                            </tr>
                        <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
                <div id="buycount" class="tab-pane">
                    <form method="post" action="/admin/user/rate/store" class="form-horizontal form-bordered">

                        <input type="hidden" name="mode" value="buycount">
                        <input type="hidden" name="edit" value="<?php echo e(isset($item->id) ? $item->id : ''); ?>">

                        <div class="form-group">
                            <label class="col-md-3 control-label" for="inputDefault"><?php echo e(trans('admin.badge_title')); ?></label>
                            <div class="col-md-6">
                                <input type="text" name="description" value="<?php echo e(isset($item->description) ? $item->description : ''); ?>" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label" for="inputDefault"><?php echo e(trans('admin.badge_icon')); ?></label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-prepend view-selected cu-p" data-toggle="modal" data-target="#ImageModal" data-whatever="image">
                                        <span class="input-group-text"><i class="fa fa-eye" aria-hidden="true"></i></span>
                                    </span>
                                    <input type="text" name="image" dir="ltr" value="<?php echo e(isset($item->image) ? $item->image : ''); ?>" class="form-control">
                                    <span class="input-group-append click-for-upload cu-p">
                                        <span class="input-group-text"><i class="fa fa-upload" aria-hidden="true"></i></span>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label"><?php echo e(trans('admin.gift_charge')); ?></label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input type="text" name="price" value="<?php echo e(isset($item->gift) ? $item->gift : ''); ?>" class="form-control text-center numtostr">
                                    <div class="input-group-append click-for-upload cu-p">
                                        <span class="input-group-text"><?php if(!empty($item->gift)): ?> <?php echo e(num2str($item->gift)); ?> <?php endif; ?> <?php echo e(trans('admin.cur_dollar')); ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label" for="inputDefault"><?php echo e(trans('admin.badge_commission')); ?></label>
                            <div class="col-md-6">
                                <input type="number" name="commision" value="<?php echo e(isset($item->commision) ? $item->commision : 0); ?>" placeholder="%" class="form-control text-center">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label"><?php echo e(trans('admin.purchases_count')); ?></label>
                            <div class="col-md-6">
                                <div class="input-group">
														<span class="input-group-prepend">
                                                            <span class="input-group-text"><?php echo e(trans('admin.from')); ?></span>
														</span>
                                    <input type="number" class="form-control" value="<?php echo e(isset($item->start) ? $item->start : ''); ?>" name="start" required>
                                    <span class="input-group-append">
                                        <span class="input-group-text"><?php echo e(trans('admin.to')); ?></span>
                                    </span>
                                    <input type="number" class="form-control" value="<?php echo e(isset($item->end) ? $item->end : ''); ?>" name="end" required>
                                    <span class="input-group-append">
                                        <span class="input-group-text"><?php echo e(trans('admin.purchases')); ?></span>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label"></label>
                            <div class="col-md-6">
                                <button class="btn btn-primary" type="submit"><?php echo e(trans('admin.save_changes')); ?></button>
                            </div>
                        </div>

                    </form>
                    <table class="table table-bordered table-striped mb-none" id="datatable-basic">
                        <thead>
                        <tr>
                            <th class="text-center" width="60"><?php echo e(trans('admin.badge_icon')); ?></th>
                            <th><?php echo e(trans('admin.badge_title')); ?></th>
                            <th class="text-center" width="200"><?php echo e(trans('admin.role')); ?></th>
                            <th class="text-center" width="200">(<?php echo e(trans('admin.cur_dollar')); ?>) <?php echo e(trans('admin.gift_charge')); ?></th>
                            <th class="text-center" width="200"><?php echo e(trans('admin.badge_commission')); ?></th>
                            <th class="text-center" width="150"><?php echo e(trans('admin.th_controls')); ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $lists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php if($list->mode == 'buycount'): ?>
                            <tr>
                                <td class="text-center"><img src="<?php echo e($list->image); ?>" width="24" /></td>
                                <td><?php echo e($list->description); ?></td>
                                <td class="text-center"><?php echo e(str_replace(',',' to ',$list->value)); ?></td>
                                <td class="text-center"><?php echo e(isset($list->gift) ? $list->gift : 0); ?></td>
                                <td class="text-center"><?php echo e(isset($list->commision) ? $list->commision : 0); ?></td>
                                <td class="text-center">
                                    <a href="/admin/user/rate/edit/<?php echo e($list->id); ?>/buycount#buycount" title="Edit"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                    <a href="#" data-href="/admin/user/rate/delete/<?php echo e($list->id); ?>/buycount" title="Delete" data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-times" aria-hidden="true"></i></a>
                                </td>
                            </tr>
                        <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
                <div id="supportrate" class="tab-pane">
                    <form method="post" action="/admin/user/rate/store" class="form-horizontal form-bordered">

                        <input type="hidden" name="mode" value="supportrate">
                        <input type="hidden" name="edit" value="<?php echo e(isset($item->id) ? $item->id : ''); ?>">

                        <div class="form-group">
                            <label class="col-md-3 control-label" for="inputDefault"><?php echo e(trans('admin.badge_title')); ?></label>
                            <div class="col-md-6">
                                <input type="text" name="description" value="<?php echo e(isset($item->description) ? $item->description : ''); ?>" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label" for="inputDefault"><?php echo e(trans('admin.badge_icon')); ?></label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-prepend view-selected cu-p" data-toggle="modal" data-target="#ImageModal" data-whatever="image">
                                        <span class="input-group-text"><i class="fa fa-eye" aria-hidden="true"></i></span>
                                    </span>
                                    <input type="text" name="image" dir="ltr" value="<?php echo e(isset($item->image) ? $item->image : ''); ?>" class="form-control">
                                    <span class="input-group-append click-for-upload cu-p">
                                        <span class="input-group-text"><i class="fa fa-upload" aria-hidden="true"></i></span>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label"><?php echo e(trans('admin.gift_charge')); ?></label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input type="text" name="price" value="<?php echo e(isset($item->gift) ? $item->gift : ''); ?>" class="form-control text-center numtostr">
                                    <div class="input-group-append click-for-upload cu-p">
                                        <span class="input-group-text"><?php if(!empty($item->gift)): ?> <?php echo e(num2str($item->gift)); ?> <?php endif; ?> <?php echo e(trans('admin.cur_dollar')); ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label" for="inputDefault"><?php echo e(trans('admin.badge_commission')); ?></label>
                            <div class="col-md-6">
                                <input type="number" name="commision" value="<?php echo e(isset($item->commision) ? $item->commision : 0); ?>" placeholder="%" class="form-control text-center">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label"><?php echo e(trans('admin.badges_tab_support_feedback')); ?></label>
                            <div class="col-md-6">
                                <div class="input-group">
														<span class="input-group-prepend">
                                                            <span class="input-group-text"><?php echo e(trans('admin.from')); ?></span>
														</span>
                                    <input type="number" class="form-control" value="<?php echo e(isset($item->start) ? $item->start : ''); ?>" name="start" required>
                                    <span class="input-group-append">
                                        <span class="input-group-text"><?php echo e(trans('admin.to')); ?></span>
                                    </span>
                                    <input type="number" class="form-control" value="<?php echo e(isset($item->end) ? $item->end : ''); ?>" name="end" required>
                                    <span class="input-group-append">
                                        <span class="input-group-text"><?php echo e(trans('admin.stars')); ?></span>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label"></label>
                            <div class="col-md-6">
                                <button class="btn btn-primary" type="submit"><?php echo e(trans('admin.save_changes')); ?></button>
                            </div>
                        </div>

                    </form>
                    <table class="table table-bordered table-striped mb-none" id="datatable-basic">
                        <thead>
                        <tr>
                            <th class="text-center" width="60"><?php echo e(trans('admin.badge_icon')); ?></th>
                            <th><?php echo e(trans('admin.badge_title')); ?></th>
                            <th class="text-center" width="200"><?php echo e(trans('admin.role')); ?></th>
                            <th class="text-center" width="200">(<?php echo e(trans('admin.cur_dollar')); ?>) <?php echo e(trans('admin.gift_charge')); ?></th>
                            <th class="text-center" width="200"><?php echo e(trans('admin.badge_commission')); ?></th>
                            <th class="text-center" width="150"><?php echo e(trans('admin.th_controls')); ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $lists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php if($list->mode == 'supportrate'): ?>
                            <tr>
                                <td class="text-center"><img src="<?php echo e($list->image); ?>" width="24" /></td>
                                <td><?php echo e($list->description); ?></td>
                                <td class="text-center"><?php echo e(str_replace(',',' to ',$list->value)); ?></td>
                                <td class="text-center"><?php echo e(isset($list->gift) ? $list->gift : 0); ?></td>
                                <td class="text-center"><?php echo e(isset($list->commision) ? $list->commision : 0); ?></td>
                                <td class="text-center">
                                    <a href="/admin/user/rate/edit/<?php echo e($list->id); ?>/supportrate#supportrate" title="Edit"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                    <a href="#" data-href="/admin/user/rate/delete/<?php echo e($list->id); ?>/supportrate" title="Delete" data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-times" aria-hidden="true"></i></a>
                                </td>
                            </tr>
                        <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
                <div id="productrate" class="tab-pane">
                    <form method="post" action="/admin/user/rate/store" class="form-horizontal form-bordered">

                        <input type="hidden" name="mode" value="productrate">
                        <input type="hidden" name="edit" value="<?php echo e(isset($item->id) ? $item->id : ''); ?>">

                        <div class="form-group">
                            <label class="col-md-3 control-label" for="inputDefault"><?php echo e(trans('admin.badge_title')); ?></label>
                            <div class="col-md-6">
                                <input type="text" name="description" value="<?php echo e(isset($item->description) ? $item->description : ''); ?>" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label" for="inputDefault"><?php echo e(trans('admin.badge_icon')); ?></label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-prepend view-selected cu-p" data-toggle="modal" data-target="#ImageModal" data-whatever="image">
                                        <span class="input-group-text"><i class="fa fa-eye" aria-hidden="true"></i></span>
                                    </span>
                                    <input type="text" name="image" dir="ltr" value="<?php echo e(isset($item->image) ? $item->image : ''); ?>" class="form-control">
                                    <span class="input-group-append click-for-upload cu-p">
                                        <span class="input-group-text"><i class="fa fa-upload" aria-hidden="true"></i></span>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label"><?php echo e(trans('admin.gift_charge')); ?></label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input type="text" name="price" value="<?php echo e(isset($item->gift) ? $item->gift : ''); ?>" class="form-control text-center numtostr">
                                    <div class="input-group-append click-for-upload cu-p">
                                        <span class="input-group-text"><?php if(!empty($item->gift)): ?> <?php echo e(num2str($item->gift)); ?> <?php endif; ?> <?php echo e(trans('admin.cur_dollar')); ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label" for="inputDefault"><?php echo e(trans('admin.badge_commission')); ?></label>
                            <div class="col-md-6">
                                <input type="number" name="commision" value="<?php echo e(isset($item->commision) ? $item->commision : 0); ?>" placeholder="%" class="form-control text-center">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label"><?php echo e(trans('admin.badges_tab_course_rating')); ?></label>
                            <div class="col-md-6">
                                <div class="input-group">
														<span class="input-group-prepend">
                                                            <span class="input-group-text"><?php echo e(trans('admin.from')); ?></span>
														</span>
                                    <input type="number" class="form-control" value="<?php echo e(isset($item->start) ? $item->start : ''); ?>" name="start" required>
                                    <span class="input-group-append">
                                        <span class="input-group-text"><?php echo e(trans('admin.to')); ?></span>
                                    </span>
                                    <input type="number" class="form-control" value="<?php echo e(isset($item->end) ? $item->end : ''); ?>" name="end" required>
                                    <span class="input-group-append">
                                        <span class="input-group-text"><?php echo e(trans('admin.stars')); ?></span>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label"></label>
                            <div class="col-md-6">
                                <button class="btn btn-primary" type="submit"><?php echo e(trans('admin.save_changes')); ?></button>
                            </div>
                        </div>

                    </form>
                    <table class="table table-bordered table-striped mb-none" id="datatable-basic">
                        <thead>
                        <tr>
                            <th class="text-center" width="60"><?php echo e(trans('admin.badge_icon')); ?></th>
                            <th><?php echo e(trans('admin.badge_title')); ?></th>
                            <th class="text-center" width="200"><?php echo e(trans('admin.role')); ?></th>
                            <th class="text-center" width="200">(<?php echo e(trans('admin.cur_dollar')); ?>) <?php echo e(trans('admin.gift_charge')); ?></th>
                            <th class="text-center" width="200"><?php echo e(trans('admin.badge_commission')); ?></th>
                            <th class="text-center" width="150"><?php echo e(trans('admin.th_controls')); ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $lists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php if($list->mode == 'productrate'): ?>
                            <tr>
                                <td class="text-center"><img src="<?php echo e($list->image); ?>" width="24" /></td>
                                <td><?php echo e($list->description); ?></td>
                                <td class="text-center"><?php echo e(str_replace(',',' to ',$list->value)); ?></td>
                                <td class="text-center"><?php echo e(isset($list->gift) ? $list->gift : 0); ?></td>
                                <td class="text-center"><?php echo e(isset($list->commision) ? $list->commision : 0); ?></td>
                                <td class="text-center">
                                    <a href="/admin/user/rate/edit/<?php echo e($list->id); ?>/productrate#productrate" title="Edit"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                    <a href="#" data-href="/admin/user/rate/delete/<?php echo e($list->id); ?>/productrate" title="Delete" data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-times" aria-hidden="true"></i></a>
                                </td>
                            </tr>
                        <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
                <div id="postrate" class="tab-pane">
                    <form method="post" action="/admin/user/rate/store" class="form-horizontal form-bordered">

                        <input type="hidden" name="mode" value="postrate">
                        <input type="hidden" name="edit" value="<?php echo e(isset($item->id) ? $item->id : ''); ?>">

                        <div class="form-group">
                            <label class="col-md-3 control-label" for="inputDefault"><?php echo e(trans('admin.badge_title')); ?></label>
                            <div class="col-md-6">
                                <input type="text" name="description" value="<?php echo e(isset($item->description) ? $item->description : ''); ?>" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label" for="inputDefault"><?php echo e(trans('admin.badge_icon')); ?></label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-prepend view-selected cu-p" data-toggle="modal" data-target="#ImageModal" data-whatever="image">
                                        <span class="input-group-text"><i class="fa fa-eye" aria-hidden="true"></i></span>
                                    </span>
                                    <input type="text" name="image" dir="ltr" value="<?php echo e(isset($item->image) ? $item->image : ''); ?>" class="form-control">
                                    <span class="input-group-append click-for-upload cu-p">
                                        <span class="input-group-text"><i class="fa fa-upload" aria-hidden="true"></i></span>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label"><?php echo e(trans('admin.gift_charge')); ?></label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input type="text" name="price" value="<?php echo e(isset($item->gift) ? $item->gift : ''); ?>" class="form-control text-center numtostr">
                                    <div class="input-group-append click-for-upload cu-p">
                                        <span class="input-group-text"><?php if(!empty($item->gift)): ?> <?php echo e(num2str($item->gift)); ?> <?php endif; ?> <?php echo e(trans('admin.cur_dollar')); ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label" for="inputDefault"><?php echo e(trans('admin.badge_commission')); ?></label>
                            <div class="col-md-6">
                                <input type="number" name="commision" value="<?php echo e(isset($item->commision) ? $item->commision : 0); ?>" placeholder="%" class="form-control text-center">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label"><?php echo e(trans('admin.badges_tab_postal_feedback')); ?></label>
                            <div class="col-md-6">
                                <div class="input-group">
														<span class="input-group-prepend">
                                                            <span class="input-group-text"><?php echo e(trans('admin.from')); ?></span>
														</span>
                                    <input type="number" class="form-control" value="<?php echo e(isset($item->start) ? $item->start : ''); ?>" name="start" required>
                                    <span class="input-group-append">
                                        <span class="input-group-text"><?php echo e(trans('admin.to')); ?></span>
                                    </span>
                                    <input type="number" class="form-control" value="<?php echo e(isset($item->end) ? $item->end : ''); ?>" name="end" required>
                                    <span class="input-group-append">
                                        <span class="input-group-text"><?php echo e(trans('admin.stars')); ?></span>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label"></label>
                            <div class="col-md-6">
                                <button class="btn btn-primary" type="submit"><?php echo e(trans('admin.save_changes')); ?></button>
                            </div>
                        </div>

                    </form>
                    <table class="table table-bordered table-striped mb-none" id="datatable-basic">
                        <thead>
                        <tr>
                            <th class="text-center" width="60"><?php echo e(trans('admin.badge_icon')); ?></th>
                            <th><?php echo e(trans('admin.badge_title')); ?></th>
                            <th class="text-center" width="200"><?php echo e(trans('admin.role')); ?></th>
                            <th class="text-center" width="200">(<?php echo e(trans('admin.cur_dollar')); ?>) <?php echo e(trans('admin.gift_charge')); ?></th>
                            <th class="text-center" width="200"><?php echo e(trans('admin.badge_commission')); ?></th>
                            <th class="text-center" width="150"><?php echo e(trans('admin.th_controls')); ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $lists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php if($list->mode == 'postrate'): ?>
                            <tr>
                                <td class="text-center"><img src="<?php echo e($list->image); ?>" width="24" /></td>
                                <td><?php echo e($list->description); ?></td>
                                <td class="text-center"><?php echo e(str_replace(',',' to ',$list->value)); ?></td>
                                <td class="text-center"><?php echo e(isset($list->gift) ? $list->gift : 0); ?></td>
                                <td class="text-center"><?php echo e(isset($list->commision) ? $list->commision : 0); ?></td>
                                <td class="text-center">
                                    <a href="/admin/user/rate/edit/<?php echo e($list->id); ?>/postrate#postrate" title="Edit"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                    <a href="#" data-href="/admin/user/rate/delete/<?php echo e($list->id); ?>/postrate" title="Delete" data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-times" aria-hidden="true"></i></a>
                                </td>
                            </tr>
                        <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('admin.newlayout.layout',['breadcom'=>['Users','Rating','Admin Panel']], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>