

<?php $__env->startSection('tab6','active'); ?>
<?php $__env->startSection('tab'); ?>
    <div class="accordion-off col-xs-12">
        <ul id="accordion" class="accordion off-filters-li">
            <li <?php if(isset($request->id)): ?> class="open" <?php endif; ?>>
                <div class="link"><h2><?php echo e(trans('main.new_request')); ?></h2><i class="mdi mdi-chevron-down"></i></div>
                <ul class="submenu" <?php if(isset($request->id)): ?> style="display: block;" <?php endif; ?>>
                    <div class="h-10"></div>
                    <form method="post" <?php if(isset($request->id)): ?> action="/user/video/request/edit/store/<?php echo e(isset($request->id) ? $request->id : 0); ?>" <?php else: ?> action="/user/video/request/store" <?php endif; ?> class="form form-horizontal">

                        <div class="h-10"></div>
                        <div class="form-group">
                            <label class="control-label col-md-1 tab-con"><?php echo e(trans('main.title')); ?></label>
                            <div class="col-md-5 tab-con">
                                <input type="text" name="title" value="<?php echo e(isset($request->title) ? $request->title : ''); ?>" class="form-control">
                            </div>
                            <label class="control-label col-md-1 tab-con"><?php echo e(trans('main.category')); ?></label>
                            <div class="col-md-5 tab-con">
                                <select name="category_id" class="form-control font-s">
                                    <?php $__currentLoopData = selectMenu(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <optgroup label="<?php echo e(isset($menu['title']) ? $menu['title'] : ''); ?>">
                                            <?php $__currentLoopData = $menu['submenu']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e(isset($sub['id']) ? $sub['id'] : ''); ?>" <?php if(isset($request->category_id) && $request->category_id == $sub['id']): ?> selected <?php endif; ?>><?php echo e(isset($sub['title']) ? $sub['title'] : ''); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </optgroup>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-1 tab-con"><?php echo e(trans('main.description')); ?></label>
                            <div class="col-md-5 tab-con">
                                <textarea class="form-control" name="description"><?php echo e(isset($request->description) ? $request->description : ''); ?></textarea>
                            </div>
                            <label class="control-label col-md-1 tab-con"></label>
                            <div class="col-md-5 tab-con">
                                <button type="submit" class="btn btn-custom pull-left"><span><?php echo e(trans('main.save_changes')); ?></span></button>
                            </div>
                        </div>
                    </form>
                    <div class="h-10"></div>
                </ul>
            </li>
            <?php if($user['vendor'] == 1): ?>
            <li class="open">
                <div class="link"><h2><?php echo e(trans('main.received_requests')); ?></h2><i class="mdi mdi-chevron-down"></i></div>
                <ul class="submenu dblock">
                    <div class="h-10"></div>
                    <div class="table-responsive">
                        <table class="table ucp-table">
                            <thead class="thead-s">
                            <th class="cell-ta"><?php echo e(trans('main.title')); ?></th>
                            <th class="text-center"><?php echo e(trans('main.description')); ?></th>
                            <th class="text-center" width="100"><?php echo e(trans('main.followers')); ?></th>
                            <th class="text-center"><?php echo e(trans('main.course')); ?></th>
                            <th class="text-center"><?php echo e(trans('main.category')); ?></th>
                            <th class="text-center"><?php echo e(trans('main.date')); ?></th>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $lists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($item->user_id == $user['id'] && $item->mode == 'publish'): ?>
                                <tr class="text-center">
                                    <td class="cell-ta"><?php echo e(isset($item->title) ? $item->title : ''); ?></td>
                                    <td class="text-center"><span class="img-icon-s" data-toggle="modal" data-target="#description<?php echo e(isset($item->id) ? $item->id : 0); ?>"><?php echo e(trans('main.view')); ?></span></td>

                                    <div id="description<?php echo e(isset($item->id) ? $item->id : 0); ?>" class="modal fade" role="dialog">
                                        <div class="modal-dialog">

                                            <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title"><?php echo e(trans('main.description')); ?></h4>
                                                </div>
                                                <div class="modal-body">
                                                    <p><?php echo e(isset($item->description) ? $item->description : 'No description'); ?></p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-custom" data-dismiss="modal"><?php echo e(trans('main.close')); ?></button>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <td class="text-center"><?php echo e(isset($item->fans_count) ? $item->fans_count : ''); ?></td>
                                    <td class="text-center"><?php echo isset($item->content->title) ? $item->content->title : '<b class="img-icon-s orange-s" data-toggle="modal" data-target="#suggestion'.$item->id.'">Not selected</b>'; ?></td>
                                    <td class="text-center"><?php echo e(isset($item->category->title) ? $item->category->title : ''); ?></td>
                                    <td class="text-center"><?php echo e(date('d F Y H:i',$item->create_at)); ?></td>
                                </tr>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </ul>
            </li>
            <?php endif; ?>
            <li class="open">
                <div class="link"><h2><?php echo e(trans('main.my_requests')); ?></h2><i class="mdi mdi-chevron-down"></i></div>
                <ul class="submenu dblock">
                    <div class="h-10"></div>
                    <?php if(count($lists) == 0): ?>
                        <div class="text-center">
                            <img src="/assets/images/empty/Request.png">
                            <div class="h-20"></div>
                            <span class="empty-first-line"><?php echo e(trans('main.no_requests')); ?></span>
                            <div class="h-10"></div>
                            <span class="empty-second-line">
                                <a href="javascript:void(0);"><?php echo e(trans('main.submit_request')); ?></a>
                            </span>
                            <div class="h-20"></div>
                        </div>
                    <?php else: ?>
                        <div class="table-responsive">
                        <table class="table ucp-table" id="request-table">
                            <thead class="thead-s">
                            <th class="cell-ta"><?php echo e(trans('main.title')); ?></th>
                            <th class="text-center"><?php echo e(trans('main.description')); ?></th>
                            <th class="text-center" width="100"><?php echo e(trans('main.followers')); ?></th>
                            <th class="text-center"><?php echo e(trans('main.course')); ?></th>
                            <th class="text-center"><?php echo e(trans('main.category')); ?></th>
                            <th class="text-center"><?php echo e(trans('main.date')); ?></th>
                            <th class="text-center"><?php echo e(trans('main.responds')); ?></th>
                            <th class="text-center" width="50"><?php echo e(trans('main.status')); ?></th>
                            <th class="text-center" width="100"><?php echo e(trans('main.controls')); ?></th>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $lists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($item->requester_id == $user['id']): ?>
                                <tr class="text-center">
                                    <td class="cell-ta"><?php echo e(isset($item->title) ? $item->title : ''); ?></td>
                                    <td class="text-center"><span data-toggle="modal" class="img-icon-s" data-target="#description<?php echo e(isset($item->id) ? $item->id : 0); ?>"><?php echo e(trans('main.view')); ?></span></td>

                                    <div id="description<?php echo e(isset($item->id) ? $item->id : 0); ?>" class="modal fade" role="dialog">
                                        <div class="modal-dialog">

                                            <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title"><?php echo e(trans('main.description')); ?></h4>
                                                </div>
                                                <div class="modal-body">
                                                    <p><?php echo e(isset($item->description) ? $item->description : 'No description'); ?></p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-custom" data-dismiss="modal"><?php echo e(trans('main.close')); ?></button>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <td class="text-center"><?php echo e(isset($item->fans_count) ? $item->fans_count : ''); ?></td>
                                    <td class="text-center"><a href="/product/<?php echo e(isset($item->content->id) ? $item->content->id : 0); ?>" class="gray-s"><?php echo e(isset($item->content->title) ? $item->content->title : 'Not selected'); ?></a></td>
                                    <td class="text-center"><?php echo e(isset($item->category->title) ? $item->category->title : ''); ?></td>
                                    <td class="text-center"><?php echo e(date('d F Y H:i',$item->create_at)); ?></td>
                                    <td class="text-center">
                                        <?php if($item->content_id == ''): ?>
                                            <b class="img-icon-s green-s" data-toggle="modal" data-target="#suggestion<?php echo e(isset($item->id) ? $item->id : 0); ?>">  <span class="badge"><?php echo e(isset($item->suggestions_count) ? $item->suggestions_count : 0); ?></span>  <?php echo e(trans('main.view')); ?> </b>
                                        <?php else: ?>
                                            <b class="blue-s"><?php echo e(trans('main.selected')); ?></b>
                                        <?php endif; ?>
                                    </td>

                                    <div id="suggestion<?php echo e(isset($item->id) ? $item->id : 0); ?>" class="modal fade" role="dialog">
                                        <div class="modal-dialog">

                                            <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title"><?php echo e(trans('main.responds')); ?></h4>
                                                </div>
                                                <div class="modal-body">
                                                    <?php $__currentLoopData = $item->suggestions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $suggest): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <p><input type="radio" class="contentSuggest cont-sug" name="suggest<?php echo e(isset($item->id) ? $item->id : 0); ?>" data-id="<?php echo e(isset($item->id) ? $item->id : 0); ?>" data="<?php echo e(isset($suggest->content->id) ? $suggest->content->id : 0); ?>"><a href="/product/<?php echo e(isset($suggest->content->id) ? $suggest->content->id : 0); ?>" target="_blank" class="suggest-modal-item"><?php echo e(isset($suggest->content->title) ? $suggest->content->title : ''); ?></a><span> <?php echo e(trans('main.responded_by')); ?> </span><a href="/profile/<?php echo e($suggest->user->id); ?>" class="suggest-modal-item" target="_blank"><?php echo e(isset($suggest->user->name) ? $suggest->user->name : $suggest->user->username); ?></a> </p>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </div>
                                                <div class="modal-footer">
                                                    <form action="/user/video/request/admit" method="post">
                                                        <input type="hidden" name="request_id" value="<?php echo e(isset($item->id) ? $item->id : 0); ?>">
                                                        <input type="hidden" name="content_id" id="contentid<?php echo e($item->id); ?>">
                                                        <button type="button" class="btn btn-custom" data-dismiss="modal"><?php echo e(trans('main.close')); ?></button>
                                                        <button type="submit" class="btn btn-custom pull-right" id="btnsubmit<?php echo e($item->id); ?>" disabled="disabled"><?php echo e(trans('main.accept_this_respond')); ?></button>
                                                    </form>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <td>
                                        <?php if($item->mode == "publish" && isset($item->content->id)): ?>
                                            <b class="blue-s"><?php echo e(trans('main.closed')); ?></b>
                                        <?php elseif($item->mode == "publish"): ?>
                                            <b class="green-s"><?php echo e(trans('main.published')); ?></b>
                                        <?php elseif($item->mode == "delete"): ?>
                                            <b class="red-s"><?php echo e(trans('main.delete')); ?></b>
                                        <?php else: ?>
                                            <b class="orange-s"><?php echo e(trans('main.waiting')); ?></b>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if($item->content_id == ''): ?>
                                            <a class="gray-s" href="/user/video/request/edit/<?php echo e(isset($item->id) ? $item->id : 0); ?>" title="Edit"><span class="crticon mdi mdi-lead-pencil"></span></a>
                                            <a class="gray-s" href="/user/video/request/delete/<?php echo e(isset($item->id) ? $item->id : 0); ?>" onclick="return confirm('Are you sure to delete item?');" title="Delete"><span class="crticon mdi mdi-delete-forever"></span></a>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                    <?php endif; ?>
                </ul>
            </li>
        </ul>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <?php if($user['vendor'] == 1): ?>
        <script>$('#buy-hover').addClass('item-box-active');</script>
    <?php else: ?>
        <script>$('#request-hover').addClass('item-box-active');</script>
    <?php endif; ?>
    <script>
        $('.contentSuggest').click(function () {
            var dataId = $(this).attr('data');
            var id = $(this).attr('data-id');
            $('#contentid'+id).val(dataId);
            $('#btnsubmit'+id).removeAttr('disabled');
        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make($user['vendor'] == 1?'user.layout.videolayout':'user.layout_user.requestlayout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>