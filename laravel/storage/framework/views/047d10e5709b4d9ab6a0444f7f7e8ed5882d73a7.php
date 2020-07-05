<?php $__env->startSection('title'); ?>
    <?php echo e(trans('admin.subcategories')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page'); ?>

    <div class="card">
        <div class="card-body">
            <div class="tabs">
                <ul class="nav nav-pills">
                    <li class="nav-item">
                        <a class="nav-link active" href="#list" data-toggle="tab"> <?php echo e(trans('admin.childs')); ?> </a>
                    </li>
                    <li>
                        <a href="#newitem" data-toggle="tab"><?php echo e(trans('admin.new_child')); ?></a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div id="list" class="tab-pane active">
                        <table class="table table-bordered table-striped mb-none" id="datatable-details">
                            <thead>
                            <tr>
                                <th class="text-center" width="36"><?php echo e(trans('admin.th_icon')); ?></th>
                                <th><?php echo e(trans('admin.child_title')); ?></th>
                                <th class="text-center" width="100"><?php echo e(trans('admin.link_title')); ?></th>
                                <th class="text-center" width="100"><?php echo e(trans('admin.th_commission')); ?></th>
                                <th class="text-center" width="150"><?php echo e(trans('admin.badges_tab_courses_count')); ?></th>
                                <th class="text-center" width="150"><?php echo e(trans('admin.cat_filters')); ?></th>
                                <th class="text-center" width="100"><?php echo e(trans('admin.th_controls')); ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $lists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td class="text-center"><img src="<?php echo e($list->image); ?>" class="w-24 h-a" /></td>
                                    <td><?php echo e($list->title); ?></td>
                                    <td class="text-center"><?php echo e(isset($list->class) ? $list->class : ''); ?></td>
                                    <td class="text-center"><?php echo e($list->commision); ?></td>
                                    <td class="text-center"><?php echo e(isset($list->contents_count) ? $list->contents_count : '0'); ?></td>
                                    <td class="text-center"><?php echo e(isset($list->filters_count) ? $list->filters_count : '0'); ?></td>
                                    <td class="text-center">
                                        <a href="/admin/content/category/edit/<?php echo e($list->id); ?>" title="Edit"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                        <a href="/admin/content/category/filter/<?php echo e($list->id); ?>" title="Filters"><i class="fa fa-tags" aria-hidden="true"></i></a>
                                        <a href="#" data-href="/admin/content/category/delete/<?php echo e($list->id); ?>" title="Delete" data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-times" aria-hidden="true"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                    <div id="newitem" class="tab-pane ">
                        <form method="post" action="/admin/content/category/store" class="form-horizontal form-bordered">

                            <div class="form-group">
                                <label class="col-md-3 control-label" for="inputDefault"><?php echo e(trans('admin.parrent_category')); ?></label>
                                <div class="col-md-6">
                                    <select name="parent_id" class="form-control">
                                        <option value="<?php echo e(isset($item->id) ? $item->id : 0); ?>"><?php echo e(isset($item->title) ? $item->title : ''); ?></option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label" for="inputDefault"><?php echo e(trans('admin.child_title')); ?></label>
                                <div class="col-md-6">
                                    <input type="text" name="title" value="" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label" for="inputDefault"><?php echo e(trans('admin.link_title')); ?></label>
                                <div class="col-md-6">
                                    <input type="text" name="class" value="" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label"><?php echo e(trans('admin.menu_icon')); ?></label>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <span class="input-group-addon view-selected cu-p" data-toggle="modal" data-target="#ImageModal" data-whatever="image"><i class="fa fa-eye" aria-hidden="true"></i></span>
                                        <input type="text" name="image" dir="ltr" class="form-control">
                                        <span class="input-group-addon click-for-upload cu-p"><i class="fa fa-upload" aria-hidden="true"></i></span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label"><?php echo e(trans('admin.cat_page_icon')); ?></label>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <span class="input-group-addon view-selected cu-p" data-toggle="modal" data-target="#ImageModal" data-whatever="icon" ><i class="fa fa-eye" aria-hidden="true"></i></span>
                                        <input type="text" name="icon" value="<?php echo e(isset($item->icon) ? $item->icon : ''); ?>" dir="ltr" class="form-control">
                                        <span class="input-group-addon click-for-upload cu-p"><i class="fa fa-upload" aria-hidden="true"></i></span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label"><?php echo e(trans('admin.cat_page_bg')); ?></label>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <span class="input-group-addon view-selected cu-p" data-toggle="modal" data-target="#ImageModal" data-whatever="background" ><i class="fa fa-eye" aria-hidden="true"></i></span>
                                        <input type="text" name="background" value="<?php echo e(isset($item->background) ? $item->background : ''); ?>" dir="ltr" class="form-control">
                                        <span class="input-group-addon click-for-upload cu-p"><i class="fa fa-upload" aria-hidden="true"></i></span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label"><?php echo e(trans('admin.cat_app_icon')); ?></label>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <span class="input-group-prepend view-selected cu-p" data-toggle="modal" data-target="#ImageModal" data-whatever="background">
                                            <span class="input-group-text"><i class="fa fa-eye" aria-hidden="true"></i></span>
                                        </span>
                                        <input type="text" name="app_icon" value="<?php echo isset($item->app_icon) ? $item->app_icon : ''; ?>" dir="ltr" placeholder="App icon (36 x 36) png only" class="form-control">
                                        <span class="input-group-append click-for-upload cu-p">
                                            <span class="input-group-text"><i class="fa fa-upload" aria-hidden="true"></i></span>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label" for="inputDefault"><?php echo e(trans('admin.color_code')); ?></label>
                                <div class="col-md-6">
                                    <input type="text" name="color" value="<?php echo e(isset($item->color) ? $item->color : ''); ?>" class="form-control text-center">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label"><?php echo e(trans('admin.request_icon')); ?></label>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <span class="input-group-addon view-selected cu-p" data-toggle="modal" data-target="#ImageModal" data-whatever="req_icon"><i class="fa fa-eye" aria-hidden="true"></i></span>
                                        <input type="text" name="req_icon" value="<?php echo e(isset($item->req_icon) ? $item->req_icon : ''); ?>" dir="ltr" class="form-control">
                                        <span class="input-group-addon click-for-upload cu-p"><i class="fa fa-upload" aria-hidden="true"></i></span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label" for="inputDefault"><?php echo e(trans('admin.th_commission')); ?></label>
                                <div class="col-md-6">
                                    <input type="number" name="commision" min="0" max="100" value="<?php echo e(isset($item->commision) ? $item->commision : 0); ?>" placeholder="%" class="form-control text-center">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label"></label>
                                <div class="col-md-6">
                                    <button class="btn btn-primary" type="submit"><?php echo e(trans('admin.save_changes')); ?></button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>




<?php echo $__env->make('admin.newlayout.layout',['breadcom'=>['Courses','Categories',$item->title]], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>