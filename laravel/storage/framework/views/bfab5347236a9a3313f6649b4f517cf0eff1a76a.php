<?php $__env->startSection('pages'); ?>
        <div class="h-20"></div>
        <div class="container-fluid">
            <div class="container">
                <div class="accordion-off col-xs-12">
                    <ul id="accordion" class="accordion off-filters-li">
                        <li class="open">
                            <div class="link"><h2><span class="usericon mdi mdi-account"></span><?php echo e(trans('main.account_info')); ?></h2><i class="mdi mdi-chevron-down"></i></div>
                            <ul class="submenu dblock">
                                <div class="h-10"></div>
                                <form method="post" class="form-horizontal" action="/user/profile/store">

                                    <div class="form-group">
                                        <label class="control-label col-md-1 tab-con"><?php echo e(trans('main.realname')); ?></label>
                                        <div class="col-md-4 tab-con">
                                            <input type="text" name="name" value="<?php echo e(isset($user['name']) ? $user['name'] : ''); ?>" class="form-control">
                                        </div>
                                        <label class="control-label col-md-1 tab-con"><?php echo e(trans('main.email')); ?></label>
                                        <div class="col-md-4 tab-con">
                                            <input type="text" value="<?php echo e(isset($user['email']) ? $user['email'] : ''); ?>"  class="form-control text-left disabled" disabled>
                                        </div>
                                        <div class="col-md-2">
                                            <input type="submit" value="Save" class="btn btn-orange pull-left">
                                        </div>
                                    </div>
                                </form>
                                <div class="h-10"></div>
                            </ul>
                        </li>
                        <li>
                            <div class="link"><h2><span class="usericon mdi mdi-account-details"></span> <?php echo e(trans('main.personal_info')); ?> </h2><i class="mdi mdi-chevron-down"></i></div>
                            <ul class="submenu">
                                <div class="h-10"></div>
                                <form method="post" class="form-horizontal" action="/user/profile/meta/store">

                                    <div class="form-group">
                                        <label class="control-label col-md-1 tab-con"><?php echo e(trans('main.biography')); ?></label>
                                        <div class="col-md-5 tab-con">
                                            <textarea name="biography" rows="5" class="form-control res-vertical"><?php echo e(isset($meta['biography']) ? $meta['biography'] : ''); ?></textarea>
                                        </div>
                                        <label class="control-label col-md-1 tab-con"><?php echo e(trans('main.short_biography')); ?></label>
                                        <div class="col-md-5 tab-con">
                                            <textarea name="short_biography" maxlength="400" rows="5" class="form-control res-vertical"><?php echo e(isset($meta['short_biography']) ? $meta['short_biography'] : ''); ?></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-1 tab-con"><?php echo e(trans('main.province')); ?></label>
                                        <div class="col-md-5 tab-con">
                                            <input type="text" class="form-control" name="state" value="<?php echo isset($meta['state']) ? $meta['state'] : ''; ?>">
                                        </div>
                                        <label class="control-label col-md-1 tab-con"><?php echo e(trans('main.city')); ?></label>
                                        <div class="col-md-5 tab-con">
                                            <input type="text" name="city" value="<?php echo e(isset($meta['city']) ? $meta['city'] : ''); ?>" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-1 tab-con"><?php echo e(trans('main.birthday')); ?></label>
                                        <div class="col-md-5 tab-con">
                                            <input type="text" name="birthday" value="<?php echo e(isset($meta['birthday']) ? $meta['birthday'] : ''); ?>" class="form-control">
                                        </div>
                                        <label class="control-label col-md-1 tab-con"><?php echo e(trans('main.age')); ?></label>
                                        <div class="col-md-5 tab-con">
                                            <input type="text" name="old" value="<?php echo e(isset($meta['old']) ? $meta['old'] : ''); ?>" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-1 tab-con"><?php echo e(trans('main.phone_number')); ?></label>
                                        <div class="col-md-5 tab-con">
                                            <input type="text" name="phone" value="<?php echo e(isset($meta['phone']) ? $meta['phone'] : ''); ?>" class="form-control">
                                        </div>
                                        <div class="col-md-6 tab-con">
                                            <input type="submit" class="btn btn-orange pull-left" value="Save">
                                        </div>
                                    </div>
                                </form>
                                <div class="h-10"></div>
                            </ul>
                        </li>
                        <li>
                            <div class="link"><h2><span class="usericon mdi mdi-credit-card-settings"></span> <?php echo e(trans('main.financial')); ?> </h2><i class="mdi mdi-chevron-down"></i></div>
                            <ul class="submenu">
                                <div class="h-10"></div>
                                <?php if(isset($userMeta['seller_apply']) && $userMeta['seller_apply']==1): ?>
                                    <div class="alert alert-success">
                                        <p><?php echo e(trans('main.financial_approved')); ?></p>
                                    </div>
                                <?php endif; ?>
                                <form method="post" class="form-horizontal" action="/user/profile/meta/store">
                                    <div class="form-group">
                                        <label class="control-label col-md-1 tab-con"><?php echo e(trans('main.bank_name')); ?></label>
                                        <div class="col-md-5 tab-con">
                                            <input type="text" name="bank_name" value="<?php echo e(isset($meta['bank_name']) ? $meta['bank_name'] : ''); ?>" class="form-control" <?php if(isset($userMeta['seller_apply']) && $userMeta['seller_apply']==1): ?> disabled <?php endif; ?>>
                                        </div>
                                        <label class="control-label col-md-1 tab-con"><?php echo e(trans('main.account_number')); ?></label>
                                        <div class="col-md-5 tab-con">
                                            <input type="text" placeholder="Number Only" name="bank_account" value="<?php echo e(isset($meta['bank_account']) ? $meta['bank_account'] : ''); ?>" class="form-control text-center" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" <?php if(isset($userMeta['seller_apply']) && $userMeta['seller_apply']==1): ?> disabled <?php endif; ?>>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                            <label class="control-label col-md-1 tab-con"><?php echo e(trans('main.creditcard')); ?></label>
                                            <div class="col-md-5 tab-con">
                                                <input type="text" name="bank_card" class="form-control text-center" dir="ltr" value="<?php echo e(isset($meta['bank_card']) ? $meta['bank_card'] : ''); ?>" <?php if(isset($userMeta['seller_apply']) && $userMeta['seller_apply']==1): ?> disabled <?php endif; ?>>
                                            </div>
                                            <label class="control-label col-md-1 tab-con"><?php echo e(trans('main.identity_scan')); ?></label>
                                            <div class="col-md-5 tab-con">
                                                <div class="input-group">
                                                    <span class="input-group-addon view-selected img-icon-s" data-toggle="modal" data-target="#ImageModal" data-whatever="melli_card"><span class="formicon mdi mdi-eye"></span></span>
                                                    <input type="text" name="melli_card" class="form-control" value="<?php echo e(isset($meta['melli_card']) ? $meta['melli_card'] : ''); ?>" <?php if(isset($userMeta['seller_apply']) && $userMeta['seller_apply']==1): ?> disabled <?php endif; ?>>
                                                    <span class="input-group-addon click-for-upload img-icon-s"><span class="formicon mdi mdi-arrow-up-thick"></span></span>
                                                </div>
                                            </div>
                                        </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-1 tab-con"><?php echo e(trans('main.passport_id')); ?></label>
                                        <div class="col-md-5 tab-con">
                                            <input type="text" name="melli_code" class="form-control text-center" dir="ltr" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" value="<?php echo e(isset($meta['melli_code']) ? $meta['melli_code'] : ''); ?>" <?php if(isset($userMeta['seller_apply']) && $userMeta['seller_apply']==1): ?> disabled <?php endif; ?>>
                                        </div>
                                        <?php if(!isset($userMeta['seller_apply']) || $userMeta['seller_apply']!=1): ?>
                                            <div class="col-md-6">
                                                <input type="submit" class="btn btn-orange pull-left" value="Save">
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </form>
                                <div class="h-10"></div>
                            </ul>
                        </li>
                        <li>
                            <div class="link"><h2><span class="usericon mdi mdi-folder-multiple-image"></span> <?php echo e(trans('main.images')); ?> </h2><i class="mdi mdi-chevron-down"></i></div>
                            <ul class="submenu">
                                <div class="h-10"></div>
                                <form method="post" class="form-horizontal" action="/user/profile/meta/store">
                                    <div class="form-group">
                                        <label class="control-label col-md-1 tab-con"><?php echo e(trans('main.avatar')); ?></label>
                                        <div class="col-md-4 tab-con">
                                            <div class="input-group">
                                                <span class="input-group-addon view-selected img-icon-s" data-toggle="modal" data-target="#ImageModal" data-whatever="avatar"><span class="formicon mdi mdi-eye"></span></span>
                                                <input type="text" name="avatar" class="form-control" value="<?php echo e(isset($meta['avatar']) ? $meta['avatar'] : ''); ?>">
                                                <span class="input-group-addon click-for-upload img-icon-s"><span class="formicon mdi mdi-arrow-up-thick"></span></span>
                                            </div>
                                        </div>
                                        <label class="control-label col-md-1 tab-con"><?php echo e(trans('main.profile_cover')); ?></label>
                                        <div class="col-md-4 tab-con">
                                            <div class="input-group">
                                                <span class="input-group-addon view-selected img-icon-s" data-toggle="modal" data-target="#ImageModal" data-whatever="profile_image"><span class="formicon mdi mdi-eye"></span></span>
                                                <input type="text" name="profile_image" class="form-control" value="<?php echo e(isset($meta['profile_image']) ? $meta['profile_image'] : ''); ?>">
                                                <span class="input-group-addon click-for-upload img-icon-s"><span class="formicon mdi mdi-arrow-up-thick"></span></span>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <input type="submit" value="Save" class="btn btn-orange pull-left">
                                        </div>
                                    </div>
                                </form>

                                <div class="h-10"></div>
                            </ul>
                        </li>
                        <li>
                            <div class="link"><h2><span class="usericon mdi mdi-lock-alert"></span> <?php echo e(trans('main.security')); ?> </h2><i class="mdi mdi-chevron-down"></i></div>
                            <ul class="submenu">
                                <div class="h-10"></div>
                                <form method="post" class="form-horizontal" action="/user/security/change">
                                    <div class="form-group">
                                        <label class="control-label col-md-1 tab-con"><?php echo e(trans('main.new_password')); ?></label>
                                        <div class="col-md-4 tab-con">
                                            <input type="password" name="password" class="form-control text-center">
                                        </div>
                                        <label class="control-label col-md-1 tab-con"><?php echo e(trans('main.retype_password')); ?></label>
                                        <div class="col-md-4 tab-con">
                                            <input type="password" name="repassword" class="form-control text-center">
                                        </div>
                                        <div class="col-md-2">
                                            <input type="submit" value="Change" class="btn btn-orange pull-left">
                                        </div>
                                    </div>
                                </form>
                                <div class="h-10"></div>
                            </ul>
                        </li>
                        <li>
                            <div class="link"><h2><span class="usericon mdi mdi-map-marker"></span> <?php echo e(trans('main.postal')); ?> </h2><i class="mdi mdi-chevron-down"></i></div>
                            <ul class="submenu">
                                <div class="h-10"></div>
                                <form method="post" class="form-horizontal" action="/user/profile/meta/store">
                                    <div class="form-group">
                                        <label class="control-label col-md-1 tab-con"><?php echo e(trans('main.province')); ?></label>
                                        <div class="col-md-3 tab-con">
                                            <input type="text" class="form-control" name="state" value="<?php echo isset($meta['state']) ? $meta['state'] : ''; ?>">
                                        </div>
                                        <label class="control-label col-md-1 tab-con"><?php echo e(trans('main.city')); ?></label>
                                        <div class="col-md-3 tab-con">
                                            <input type="text" name="city" value="<?php echo e(isset($meta['city']) ? $meta['city'] : ''); ?>" class="form-control">
                                        </div>
                                        <label class="control-label col-md-1 tab-con"><?php echo e(trans('main.zip_code')); ?></label>
                                        <div class="col-md-3 tab-con">
                                            <input type="text" name="postalcode" value="<?php echo e(isset($meta['postalcode']) ? $meta['postalcode'] : ''); ?>" class="form-control text-center">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-1 tab-con"><?php echo e(trans('main.address')); ?></label>
                                        <div class="col-md-7 tab-con">
                                            <textarea name="address" rows="4" class="form-control"><?php echo e(isset($meta['address']) ? $meta['address'] : ''); ?></textarea>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="submit" class="btn btn-custom pull-left" value="Save">
                                        </div>
                                    </div>
                                </form>
                                <div class="h-10"></div>
                            </ul>
                        </li>
                </div>
            </div>
        </div>
        <div class="h-10"></div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script>$('#profile-hover').addClass('item-box-active');</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.layout.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>