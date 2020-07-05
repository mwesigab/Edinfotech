<?php $__env->startSection('title'); ?>
<?php echo e(isset($setting['site']['site_title']) ? $setting['site']['site_title'] : ''); ?> -
<?php echo e(trans('main.user_panel')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('pages'); ?>
<div class="container-fluid">
    <div class="container">
        <div class="col-md-3 col-xs-12">
            <div class="ucp-section-box sbox3 ucp-avatar-box">
                <div class="body paz">
                    <form method="post" action="/user/profile/avatar">
                        <img src="<?php echo e(isset($meta['avatar']) ? $meta['avatar'] : get_option('default_user_avatar','')); ?>"
                             class="img-responsive sbox3" id="avatar-luncher">
                        <br>
                        <input type="hidden" name="avatar" value="<?php echo e(isset($meta['avatar']) ? $meta['avatar'] : ''); ?>"
                               onclick="openKCFinder($(this));">
                        <div class="form-group">
                            <a href="/user/profile" class="btn btn-green btn-avatar btn-100-p"><?php echo e(trans('main.edit_profile')); ?></a>
                        </div>
                    </form>
                </div>
            </div>
            <div class="ucp-section-box sbox3 ucp-avatar-box he70">
                <div class="body text-justify lh180">
                    <b class="vac-mode"><?php echo e(trans('main.vacation_mode')); ?></b>
                    <div class="switch switch-sm switch-primary pull-left fl-right" data-toggle="modal"
                         href="#trip-mode-modal" id="post_toggle">
                        <input type="hidden" value="0" name="post">
                        <input type="checkbox" name="post" value="1" data-plugin-ios-switch <?php if(userMeta($user['id'],'trip_mode',0)
                        == 1 && userMeta($user['id'],'trip_mode_date',1)>time()): ?> checked="checked" <?php endif; ?>/>
                    </div>
                    <div class="modal fade" id="trip-mode-modal">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                        &times;
                                    </button>
                                    <h4 class="modal-title"><?php echo e(trans('main.vacation_mode')); ?></h4>
                                </div>
                                <form method="post" action="/user/trip/active">
                                    <div class="modal-body">
                                        <span><?php echo e(trans('main.vacation_alert')); ?></span>
                                        <div class="h-10"></div>
                                        <div class="col-md-8 col-md-offset-2">
                                            <div class="input-group">
                                                <input type="date" name="trip_mode_date" id="trip_mode_date"
                                                       <?php if(is_int(userMeta($user['id'],'trip_mode_date'))): ?> value="<?php echo date('Y-m-d',userMeta($user['id'],'trip_mode_date')); ?>" <?php endif; ?>
                                                class="form-control text-center validate" required>
                                                <span class="input-group-addon trip_mode_date_btn"
                                                      id="trip_mode_date_btn"><i class="fa fa-calendar"
                                                                                 aria-hidden="true"></i></span>
                                            </div>
                                        </div>
                                        <div class="h-20"></div>
                                    </div>
                                    <div class="modal-footer">
                                        <a href="#" class="btn btn-danger"><?php echo e(trans('main.disable_vacation')); ?></a>
                                        <button type="submit" name="active_trip" class="btn btn-default"><?php echo e(trans('main.enable_vacation')); ?>

                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid newest-container">
            <div class="container">
                <div class="row">
                    <div class="body body-s-r" dir="ltr">
                        <span class="nav-right"></span>
                        <div class="owl-carousel">
                            <?php $__currentLoopData = $new_content; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $new): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php $meta = arrayToList($new->metas, 'option', 'value'); ?>
                            <div class="owl-car-s" dir="rtl">
                                <a href="/product/<?php echo e(isset($new->id) ? $new->id : ''); ?>" title="<?php echo e(isset($new->title) ? $new->title : ''); ?>"
                                   class="content-box">
                                    <img src="<?php echo e(isset($meta['thumbnail']) ? $meta['thumbnail'] : ''); ?>"/>
                                    <h3><?php echo str_limit($new->title,30,'...'); ?></h3>
                                </a>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        <span class="nav-left pull-right"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="h-10"></div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script>$('#dashboard-hover').addClass('item-box-active');</script>
<script type="text/javascript">
    var ctx = document.getElementById('myChart').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'bar',
        responsive: true,
        data: {
            labels: [{!!'"'.implode('","', $captionDay).'"' !!
        }
    ],
    datasets: [{
        label: "Sales",
        backgroundColor: '#e91e63',
        data: [{!!implode(',', $sellDay) !!
    }],
    }
    ]
    },

    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true,
                    userCallback: function (label, index, labels) {
                        // when the floored value is the same as the value we have a whole number
                        if (Math.floor(label) === label) {
                            return label;
                        }

                    },
                }
            }],
        }
    ,
        legend: {
            display: false
        }
    ,
        tooltips: {
            callbacks: {
                label: function (tooltipItem) {
                    return tooltipItem.yLabel;
                }
            }
        }
    }
    })
    ;
</script>
<script type="text/javascript">
    var ctx = document.getElementById('myChart1').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'bar',
        responsive: true,
        data: {
            labels: [{!!'"'.implode('","', $captionDay).'"' !!
        }
    ],
    datasets: [{
        label: "Income",
        backgroundColor: '#2BA2DF',
        data: [{!!implode(',', $incomeDay) !!
    }],
    },
    ]
    },

    options: {
        legend: {
            display: false
        }
    ,
        tooltips: {
            callbacks: {
                label: function (tooltipItem) {
                    return tooltipItem.yLabel;
                }
            }
        }
    }
    })
    ;
</script>
<script type="text/javascript">
    document.addEventListener("DOMContentLoaded", function (event) {
        var g6 = new JustGage({
            id: "g6",
            value: {
        {
            {
                $value
                or
                0
            }
        }
    },
        min: 0,
            max
    :
        {
            {
                {
                    count($sell_rate)
                }
            }
        }
    ,
        hideMinMax: true,
            gaugeColor
    :
        "#F0F0F0",
            levelColors
    :
        ["#e91e63"],
            levelColorsGradient
    :
        false
    })
        ;
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('schools.students.layout.student_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>