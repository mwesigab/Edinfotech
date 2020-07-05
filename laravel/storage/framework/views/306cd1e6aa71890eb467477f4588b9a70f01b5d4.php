<?php $__env->startSection('title'); ?>
    <?php echo $setting['site']['site_title'].'Profile-'.$profile->name; ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page'); ?>

<?php $meta = arrayToList($profile->usermetas,'option','value'); ?>

<div class="container-fluid profile-top-background" style="background: url('<?php echo e(isset($meta['profile_image']) ? $meta['profile_image'] : get_option('default_user_cover','')); ?>');">
    <div class="col-md-3 col-xs-12">

    </div>
    <div class="col-md-9 col-xs-12 bottom-section">
            <span>
                <label class="profile-name"><?php echo e(isset($profile->name) ? $profile->name : ''); ?></label>
            <?php if($follow == 0): ?>
                <a class="btn btn-red btn-hover-animate" href="/follow/<?php echo e(isset($profile->id) ? $profile->id : ''); ?>"><span class="homeicon mdi mdi-plus"></span>&nbsp;&nbsp;<?php echo e(trans('main.follow')); ?></a>
            <?php else: ?>
                <a class="btn btn-red btn-hover-animate" href="/unfollow/<?php echo e(isset($profile->id) ? $profile->id : ''); ?>"><span class="homeicon mdi mdi-close"></span>&nbsp;&nbsp;<?php echo e(trans('main.unfollow')); ?></a>
            <?php endif; ?>
                <label class="buttons"><span class="homeicon mdi mdi-account-heart"></span><p><?php echo e(isset($follow_count) ? $follow_count : '0'); ?>&nbsp;<?php echo e(trans('main.followers')); ?></p></label>
                <label class="buttons"><span class="homeicon mdi mdi-library-video"></span><p><?php echo count($videos); ?> <?php echo e(trans('main.courses')); ?></p></label>
                <label class="buttons"><span class="homeicon mdi mdi-clock"></span><p class="duration-f"><?php echo e(isset($duration) ? $duration : '0'); ?>&nbsp;<?php echo e(trans('main.minutes_stat')); ?></p></label>
    </div>
</div>

<div class="container-fluid profile-middle-background">
    <div class="container">
        <div class="col-md-2 col-xs-12 profile-avatar-container tab-con">
            <img class="sbox3" src="<?php echo e(isset($meta['avatar']) ? $meta['avatar'] : get_option('default_user_avatar','')); ?>"/>
            <div class="rate-section raty"></div>
        </div>
        <div class="location-section col-md-10 col-xs-12">
            <div class="profile_name_item"><b><?php echo e(isset($profile->name) ? $profile->name : ''); ?></b></div>
            <div class="profile_register_date_item"><b><?php echo e(trans('main.registration_date')); ?>: <?php echo e(date('d F Y',$profile->create_at)); ?></b></div>
        </div>
    </div>
</div>

<div class="h-10"></div>

<div class="container-fluid bg-gray-s">
        <div class="row ucp-menu-item">
            <div class="container">
                <div class="seven-cols">
                    <div class="col-md-1 col-sm-6 col-xs-6 tab-con">
                        <a href="javascript:void(0)" tab-id="t-biography" class="item-box sbox3 arrow_box">
                            <span class="micon mdi mdi-account-tie"></span>
                            <span><?php echo e(trans('main.profile')); ?></span>
                        </a>
                    </div>
                    <div class="col-md-1 col-sm-6 col-xs-6 tab-con">
                        <a href="javascript:void(0)" tab-id="t-videos" class="item-box sbox3">
                            <span class="micon mdi mdi-library-video"></span>
                            <span><?php echo e(trans('main.courses')); ?></span>
                        </a>
                    </div>
                    <div class="h-10 visible-xs"></div>
                    <div class="col-md-1 col-sm-6 col-xs-6 tab-con">
                        <a href="javascript:void(0)" tab-id="t-channels" class="item-box sbox3">
                            <span class="micon mdi mdi-bullhorn"></span>
                            <span><?php echo e(trans('main.channels')); ?></span>
                        </a>
                    </div>
                    <div class="col-md-1 col-sm-6 col-xs-6 tab-con">
                        <a href="javascript:void(0)" tab-id="t-medals" class="item-box sbox3">
                            <span class="micon mdi mdi-medal"></span>
                            <span><?php echo e(trans('main.badges')); ?></span>
                        </a>
                    </div>
                    <div class="h-10 visible-xs"></div>
                    <div class="col-md-1 col-sm-6 col-xs-6 tab-con">
                        <a href="javascript:void(0)" tab-id="t-record" class="item-box sbox3">
                            <span class="micon mdi mdi-video"></span>
                            <span><?php echo e(trans('main.future_courses')); ?></span>
                        </a>
                    </div>
                    <div class="col-md-1 col-sm-6 col-xs-6 tab-con">
                    <a href="javascript:void(0)" tab-id="t-article" class="item-box sbox3">
                        <span class="micon mdi mdi-notebook"></span>
                        <span><?php echo e(trans('main.articles')); ?></span>
                    </a>
                </div>
                    <div class="h-10 visible-xs"></div>
                    <div class="col-md-1 col-sm-6 col-xs-12 tab-con">
                        <a href="javascript:void(0)" tab-id="t-request" class="item-box sbox3">
                            <span class="micon mdi mdi-camera-enhance"></span>
                            <span><?php echo e(trans('main.request_course')); ?></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

<div class="container-fluid bg-gray-s">

    <div class="container">

        <div class="col-xs-12 remove-padding-xs">

            <div id="t-biography" class="profile-section-fade profile-section sbox3 doview">
                <div class="row">
                    <div class="col-md-3 col-xs-12 col-sm-6 text-center">
                        <h4><?php echo e(trans('main.courses_feedback')); ?></h4>
                        <div class="h-5"></div>
                        <span class="dis-block">(<?php echo e(isset($video_rate) ? $video_rate : 0); ?>)</span>
                        <div class="h-10"></div>
                        <div class="progress" dir="ltr">
                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="3.4"
                                 aria-valuemin="1" aria-valuemax="5" style="width:<?php echo e(($video_rate/5)*100); ?>%">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-xs-12 col-sm-6 text-center">
                        <h4><?php echo e(trans('main.support_feedback')); ?></h4>
                        <div class="h-5"></div>
                        <span class="dis-block">(<?php echo e(isset($support_rate) ? $support_rate : 0); ?>)</span>
                        <div class="h-10"></div>
                        <div class="progress" dir="ltr">
                            <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="<?php echo e(isset($support_rate) ? $support_rate : 0); ?>"
                                 aria-valuemin="1" aria-valuemax="5" style="width:<?php echo e(($support_rate/5)*100); ?>%">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-xs-12 col-sm-6 text-center">
                        <h4><?php echo e(trans('main.postal_feedback')); ?></h4>
                        <div class="h-5"></div>
                        <span class="dis-block">(<?php echo e(isset($sell_rate) ? $sell_rate : 0); ?>)</span>
                        <div class="h-10"></div>
                        <div class="progress" dir="ltr">
                            <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="<?php echo e(isset($sell_rate) ? $sell_rate : 0); ?>"
                                 aria-valuemin="1" aria-valuemax="5" style="width:<?php echo e(($sell_rate/5)*100); ?>%">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-xs-12 col-sm-6 text-center">
                        <h4><?php echo e(trans('main.articles_feedback')); ?></h4>
                        <div class="h-5"></div>
                        <span class="dis-block">(<?php echo e(isset($article_rate) ? $article_rate : 0); ?>)</span>
                        <div class="h-10"></div>
                        <div class="progress" dir="ltr">
                            <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="<?php echo e(isset($article_rate) ? $article_rate : 0); ?>"
                                 aria-valuemin="1" aria-valuemax="5" style="width:<?php echo e(($article_rate/5)*100); ?>%">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="h-20"></div>
                <?php if(!isset($meta['biography'])): ?>
                    <div class="text-center">
                        <img src="/assets/images/empty/biography.png">
                        <div class="h-20"></div>
                        <span class="empty-first-line"><?php echo e(trans('main.no_biography')); ?></span>
                        <div class="h-20"></div>
                    </div>
                <?php else: ?>
                    <?php echo e(isset($meta['biography']) ? $meta['biography'] : ''); ?>

                <?php endif; ?>
            </div>

            <div id="t-videos" class="profile-section-fade newest-container newest-container-p">
                <div class="body body-target-s">
                    <div class="row">
                        <?php $__currentLoopData = $videos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vid): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php $meta = arrayToList($vid->metas,'option','value'); ?>
                                <div class="col-md-3 col-sm-6 col-xs-12 tab-con">
                                    <a href="/product/<?php echo e(isset($vid->id) ? $vid->id : ''); ?>" title="<?php echo e(isset($vid->title) ? $vid->title : ''); ?>" class="content-box">
                                        <img src="<?php echo e(isset($meta['thumbnail']) ? $meta['thumbnail'] : ''); ?>"/>
										<h3><?php echo str_limit($vid->title,35,'...'); ?></h3>
                                        <div class="footer">
                                            <label class="pull-right"><?php echo e(isset($meta['duration']) ? $meta['duration'] : '0'); ?> <?php echo e(trans('main.min')); ?></label>
											<span class="boxicon mdi mdi-clock pull-right"></span>
											<span class="boxicon mdi mdi-wallet pull-left"></span>
                                            <label class="pull-left"><?php echo e(currencySign()); ?><?php echo e(isset($meta['price']) ? $meta['price'] : '0'); ?></label>
                                        </div>
                                    </a>
                                </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php if(count($videos) == 0): ?>
                                <div class="text-center">
                                    <img src="/assets/images/empty/Videos.png">
                                    <div class="h-20"></div>
                                    <span class="empty-first-line"><?php echo e(trans('main.no_course_profile')); ?></span>
                                    <div class="h-20"></div>
                                </div>
                            <?php endif; ?>
                    </div>
                </div>
            </div>

            <div id="t-channels" class="profile-section-fade newest-container newest-container-p">
                <div class="body body-target-s">
                    <div class="row">
                        <?php $__currentLoopData = $channels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ch): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-md-3 col-sm-6 col-xs-12 tab-con">
                                    <a href="/chanel/<?php echo e(isset($ch->username) ? $ch->username : ''); ?>" title="<?php echo e(isset($ch->title) ? $ch->title : ''); ?>" class="content-box">
                                        <img src="<?php echo e(isset($ch->avatar) ? $ch->avatar : ''); ?>"/>
										<h3><?php echo str_limit($ch->title,35,'...'); ?></h3>
                                    </a>
                                </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php if(count($channels) == 0): ?>
                                <div class="text-center">
                                    <img src="/assets/images/empty/channel.png">
                                    <div class="h-20"></div>
                                    <span class="empty-first-line"><?php echo e(trans('main.no_channel_profile')); ?></span>
                                    <div class="h-20"></div>
                                </div>
                            <?php endif; ?>
                    </div>
                </div>
            </div>

            <div id="t-medals" class="profile-section-fade newest-container newest-container-e">
                <div class="row">
                    <?php $__currentLoopData = $rates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-md-3 col-xs-12 tab-con">
                            <div class="product-card">
                                <h2><?php echo e(isset($rate['description']) ? $rate['description'] : ''); ?></h2>
                                <h4>
                                    <?php $middle = explode(',',$rate['value']); ?>
                                    <?php echo e(trans('main.From')); ?>

                                    <?php echo e(isset($middle[0]) ? $middle[0] : 0); ?>

                                    <?php echo e(trans('main.to')); ?>

                                     <?php echo e(isset($middle[1]) ? $middle[1] : 0); ?>

                                    <?php if($rate['mode'] == 'videocount'): ?>
                                        <?php echo e('Courses'); ?>

                                    <?php elseif($rate['mode'] == 'day'): ?>
                                        <?php echo e('Reg. Days'); ?>

                                    <?php elseif($rate['mode'] == 'buycount'): ?>
                                        <?php echo e('Purchases'); ?>

                                    <?php elseif($rate['mode'] == 'sellcount'): ?>
                                        <?php echo e('Sales'); ?>

                                    <?php else: ?>
                                        <?php echo e('Rates'); ?>

                                    <?php endif; ?>
                                </h4>
                                <figure>
                                    <img src="<?php echo e(isset($rate['image']) ? $rate['image'] : ''); ?>" alt="<?php echo e(isset($rate->description) ? $rate->description : ''); ?>" />
                                </figure>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php if(count($rates) == 0): ?>
                            <div class="text-center">
                                <img src="/assets/images/empty/discount.png">
                                <div class="h-20"></div>
                                <span class="empty-first-line"><?php echo e(trans('main.no_badge')); ?></span>
                                <div class="h-20"></div>
                            </div>
                        <?php endif; ?>
                </div>
        </div>

            <div id="t-article" class="profile-section-fade newest-container newest-container-p">
                <div class="body body-target-s body-target-s">
                    <div class="blog-section body-target-s">
                    <?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        		<div class="col-md-3 col-sm-6 col-xs-12 tab-con">
                                    <a href="/article/item/<?php echo e($article->id); ?>" title="<?php echo e(isset($article->title) ? $article->title : ''); ?>" class="content-box">
                                        <img src="<?php echo e(isset($article->image) ? $article->image : ''); ?>"/>
										<h3><?php echo str_limit($article->title,35,'...'); ?></h3>
                                    </a>
                                </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php if($articles->count() == 0): ?>
                        <div class="text-center">
                            <img src="/assets/images/empty/articles.png">
                            <div class="h-20"></div>
                            <span class="empty-first-line"><?php echo e(trans('main.no_articles_profile')); ?></span>
                            <div class="h-20"></div>
                        </div>
                    <?php endif; ?>
                    </div>
                </div>
            </div>

            <div id="t-request" class="profile-section-fade newest-container newest-container-e">
                <div class="body body-target-s">
                    <div class="row">
                        <div class="col-md-6 col-xs-12 tab-con">
                            <div class="ucp-section-box white-s">
                                <div class="header back-orange"><?php echo e(trans('main.request_course')); ?></div>
                                <div class="body body-target-s">
                                    <form method="post" action="/profile/request/store">
                                        <input type="hidden" name="user_id" value="<?php echo e(isset($profile->id) ? $profile->id : 0); ?>">
                                        <div class="form-group">
                                            <label class="control-label" for="inputDefault"><?php echo e(trans('main.title')); ?></label>
                                            <input type="text" name="title" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label" for="inputDefault"><?php echo e(trans('main.category')); ?></label>
                                            <select name="category_id" class="form-control font-s" required>
                                                <?php $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <optgroup label="<?php echo e(isset($menu['title']) ? $menu['title'] : ''); ?>">
                                                        <?php $__currentLoopData = $menu['submenu']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e(isset($sub['id']) ? $sub['id'] : ''); ?>" ><?php echo e(isset($sub['title']) ? $sub['title'] : ''); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </optgroup>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label" for="inputDefault"><?php echo e(trans('main.description')); ?></label>
                                            <textarea name="description" rows="5" class="form-control" required></textarea>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-custom" value="save"><?php echo e(trans('main.save_changes')); ?></button>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xs-12 tab-con">
                            <div class="ucp-section-box white-s">
                                <div class="header back-orange"><?php echo e(trans('main.req_rules')); ?></div>
                                <div class="body body-target-s">
                                    <?php echo get_option('request_term'); ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="t-record" class="profile-section-fade newest-container newest-container-p">
                <div class="body bodt-target-s">
                    <div class="row">
                        <?php $__currentLoopData = $record; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vid): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php $meta = arrayToList($vid->metas,'option','value'); ?>
                            <div class="col-md-3 col-sm-6 col-xs-12 tab-con">
                                <a href="/product/<?php echo e(isset($vid->id) ? $vid->id : ''); ?>" title="<?php echo e(isset($vid->title) ? $vid->title : ''); ?>" class="content-box">
                                    <img src="<?php echo e(isset($vid->image) ? $vid->image : ''); ?>"/>
									<h3><?php echo str_limit($vid->title,35,'...'); ?></h3>
                                    <div class="footer">
                                        <label class="pull-left"><?php echo e(isset($vid->category->title) ? $vid->category->title : ''); ?></label>
                                    </div>
                                </a>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php if(count($record) == 0): ?>
                                <div class="text-center">
                                    <img src="/assets/images/empty/recording.png">
                                    <div class="h-20"></div>
                                    <span class="empty-first-line"><?php echo e(trans('main.no_future_profile')); ?></span>
                                    <div class="h-20"></div>
                                </div>
                            <?php endif; ?>
                    </div>
                </div>
            </div>


        </div>

</div>
</div>


<?php $__env->startSection('script'); ?>
    <script>
    $(document).ready(function () {
        $('.ucp-menu-item a').click(function() {
            var id = $(this).attr('tab-id');
            $('.ucp-menu-item a').removeClass('arrow_box');
            $(this).addClass('arrow_box');
            $('.profile-section-fade').not('#'+id).fadeOut(500,function () {
                $('#'+id).fadeIn(500);
            });
        })
    })
    </script>
    <script>
        $('.raty').raty({ starType: 'i' });
    </script>
<?php $__env->stopSection(); ?>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('view.layout.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>