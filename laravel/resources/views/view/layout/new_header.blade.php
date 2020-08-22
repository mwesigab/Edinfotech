<!doctype html>
<html lang="en">
<head>
    <link rel="icon" href="/assets/404/images/favicon.png" type="image/png" sizes="32x32">
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="{!! get_option('site_description','') !!}">
    <link rel="stylesheet" href="/assets/vendor/bootstrap/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="/assets/vendor/bootstrap/css/bootstrap-3.2.rtl.css"/>
    <link rel="stylesheet" href="/assets/vendor/font-awesome/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="/assets/vendor/owlcarousel/dist/assets/owl.carousel.min.css"/>
    <link rel="stylesheet" href="/assets/vendor/raty/jquery.raty.css"/>
    <link rel="stylesheet" href="/assets/view/fluid-player-master/fluidplayer.min.css"/>
    <link rel="stylesheet" href="/assets/vendor/simplepagination/simplePagination.css"/>
    <link rel="stylesheet" href="/assets/vendor/easyautocomplete/easy-autocomplete.css"/>
    <link rel="stylesheet" href="/assets/vendor/bootstrap-tagsinput/bootstrap-tagsinput.css"/>
    <link rel="stylesheet" href="/assets/vendor/jquery-te/jquery-te-1.4.0.css"/>
    <link rel="stylesheet" href="/assets/stylesheets/vendor/mdi/css/materialdesignicons.min.css"/>
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Cardo:400,700,400italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Raleway:300,700,900,500' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="/assets/stylesheets/style.css"/>
    <link href="/assets/pe-icons/css/pe-icon-7-stroke.css" rel="stylesheet">
    @if(get_option('site_rtl','0') == 1)
    <link rel="stylesheet" href="/assets/stylesheets/view-custom-rtl.css"/>
    @else
    <link rel="stylesheet" href="/assets/stylesheets/view-custom.css?time={!! time() !!}"/>
    @endif
    <link rel="stylesheet" href="/assets/stylesheets/view-responsive.css"/>
    @if(get_option('main_css')!='')
    <style>
        {
            ! ! get_option('main_css') ! !
        }
    </style>
    @endif
    <script type="application/javascript" src="/assets/vendor/jquery/jquery.min.js"></script>
    <title>@yield('title')</title>
</head>
<body>
<div class="container-fluid">
    <div class="row line-header"></div>
    <div class="col-md-10 col-md-offset-1">
        <div class="row middle-header">
            <div class="col-md-3 col-xs-12 tab-con">
                <div class="row">
                    <a href="/">
                        <img src="{{{ get_option('site_logo') }}}" alt="{{{ get_option('site_title') }}}"
                             class="logo-icon"/>
                        <img src="{{{ get_option('site_logo_type') }}}" alt="{{{ get_option('site_title') }}}"
                             class="logo-type"/>
                    </a>
                </div>
            </div>
            <div class="col-md-5 col-xs-12 tab-con">
                <div class="row search-box">
                    <form action="/search">
                        <input type="text" name="q" class="col-md-11 provider-json" placeholder="Search..."/>
                        <button type="submit" name="search" class="pull-left col-md-1">
                            <span class="homeicon mdi mdi-magnify"></span></button>
                    </form>
                </div>
            </div>
            <div class="col-md-4 col-xs-12 text-center tab-con">
                <div class="row">
                    @if(isset($user) && isset($user['vendor']) && $user['vendor'] == 1)
                    <a href="/user/content/new" class="header-upload-button pulse"><span
                            class="headericon mdi mdi-arrow-up-bold"></span>{{{ trans('main.upload_course') }}}</a>
                    @endif
                    @if(isset($user))
                    <a href="/user" class="header-login-in-button">
                        <img src="{{{ $userMeta['avatar'] ?? get_option('default_user_avatar','') }}}"
                             class="user-header-avatar">
                        <span class="header-title-caption">{{{ $user['name'] ?? '' }}}</span>
                        <span class="headericon mdi mdi-chevron-down"></span>
                        <label class="alert">
                            @if(isset($alert['all']) && $alert['all']>0)
                            <span class="noti-holder">{{{ $alert['all'] ?? 0 }}}</span>
                            @endif
                            <span class="noti-icon headericon mdi mdi-bell-alert"></span>
                        </label>
                        <label class="alert alert-f">
                            @if(isset($alert['ticket']) && $alert['ticket']>0)
                            <span>{{{ $alert['ticket'] ?? 0 }}}</span>
                            @endif
                            <i class="headericon mdi mdi-email"></i>
                        </label>
                        <div class="animated user-overlap sbox3">
                            <div class="overlap-profile-viewer">
                                @if(isset($user) && isset($user['vendor']) && $user['vendor'] == 1)
                                <a href="/user/dashboard"><img
                                        src="{{{ $userMeta['avatar'] ?? '/assets/images/user.png' }}}"
                                        class="dash-s"></a>
                                @else
                                <a href="/user/content"><img
                                        src="{{{ $userMeta['avatar'] ?? '/assets/images/user.png' }}}"
                                        class="dash-s"></a>
                                @endif
                                @if(isset($user) && isset($user['vendor']) && $user['vendor'] == 1)
                                <div class="overlap-profile-viewer-info">
                                    <a href="/user/dashboard" class="dash-s2"><span>{{{ $user['category']['title'] ?? 'General User' }}}</span></a>
                                    <a href="/user/dashboard" class="btn btn-danger">{{{ trans('main.user_panel')
                                        }}}</a>
                                </div>
                                @else
                                <div class="overlap-profile-viewer-info">
                                    <a href="/user/video/buy" class="dash-s2"><span>{{{ $user['category']['title'] ?? 'General User' }}}</span></a>
                                    <a href="/user/video/buy" class="btn btn-danger">{{{ trans('main.user_panel')
                                        }}}</a>
                                </div>
                                @endif
                            </div>
                            <ul>
                                <li><a href="/profile/{{{ $user['id'] ?? 0 }}}"><span
                                            class="headericon mdi mdi-account"></span>
                                        <p>{{{ trans('main.profile') }}}</p></a></li>
                                <li><a href="/user/ticket"><span class="headericon mdi mdi-headset"></span>
                                        <p>{{{ trans('main.support') }}}</p></a></li>
                                <li><a href="/user/profile"><span class="headericon mdi mdi-settings"></span>
                                        <p>{{{ trans('main.settings') }}}</p></a></li>
                                <li><a href="/user/logout"><span class="headericon mdi mdi-power"></span>
                                        <p>{{{ trans('main.exit') }}}</p></a></li>
                            </ul>
                        </div>
                    </a>
                    @else
                    <?php $student = unserialize(session('Student')) ?>
                    @if($student)
                    <a href="/user" class="header-login-in-button">
                        <img src="{{{ $userMeta['avatar'] ?? get_option('default_user_avatar','') }}}"
                             class="user-header-avatar">
                        <span class="header-title-caption">{{{ $student['student_name'] ?? '' }}}</span>
                        <span class="headericon mdi mdi-chevron-down"></span>
                        <label class="alert">
                            @if(isset($alert['all']) && $alert['all']>0)
                            <span class="noti-holder">{{{ $alert['all'] ?? 0 }}}</span>
                            @endif
                            <span class="noti-icon headericon mdi mdi-bell-alert"></span>
                        </label>
                        <label class="alert alert-f">
                            @if(isset($alert['ticket']) && $alert['ticket']>0)
                            <span>{{{ $alert['ticket'] ?? 0 }}}</span>
                            @endif
                            <i class="headericon mdi mdi-email"></i>
                        </label>
                        <div class="animated user-overlap sbox3">
                            <div class="overlap-profile-viewer">
                                @if(isset($student) && isset($student['vendor']) && $student['vendor'] == 1)
                                <a href="/user/dashboard"><img
                                        src="{{{ $userMeta['avatar'] ?? '/assets/images/user.png' }}}"
                                        class="dash-s"></a>
                                @else
                                <a href="/user/content"><img
                                        src="{{{ $userMeta['avatar'] ?? '/assets/images/user.png' }}}"
                                        class="dash-s"></a>
                                @endif
                                @if(isset($student) && isset($student['vendor']) && $student['vendor'] == 1)
                                <div class="overlap-profile-viewer-info">
                                    <a href="/user/dashboard" class="dash-s2"><span>{{{ $student['category']['title'] ?? 'General User' }}}</span></a>
                                    <a href="/user/dashboard" class="btn btn-danger">{{{ trans('main.user_panel')
                                        }}}</a>
                                </div>
                                @else
                                <div class="overlap-profile-viewer-info">
                                    <a href="/user/video/buy" class="dash-s2"><span>{{{ $student['category']['title'] ?? 'General User' }}}</span></a>
                                    <a href="/user/video/buy" class="btn btn-danger">{{{ trans('main.user_panel')
                                        }}}</a>
                                </div>
                                @endif
                            </div>
                            <ul>
                                <li><a href="/school/student/profile/{{{ $student['id'] ?? 0 }}}"><span
                                            class="headericon mdi mdi-account"></span>
                                        <p>{{{ trans('main.profile') }}}</p></a></li>
                                <li><a href="/school/student/ticket"><span class="headericon mdi mdi-headset"></span>
                                        <p>{{{ trans('main.support') }}}</p></a></li>
                                <li><a href="/school/student/profile"><span class="headericon mdi mdi-settings"></span>
                                        <p>{{{ trans('main.settings') }}}</p></a></li>
                                <li><a href="/school/student/logout"><span class="headericon mdi mdi-power"></span>
                                        <p>{{{ trans('main.exit') }}}</p></a></li>
                            </ul>
                        </div>
                    </a>
                    @else
                    <div class="dropdown" style="float:right;">
                        <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">{{{
                            trans('main.login_signup') }}}
                            <span class="caret"></span></button>
                        <ul class="dropdown-menu dropdown-menu-left">
                            <li class="dropdown-header"><strong>Login As</strong></li>
                            <li><a href="/school/student/login_form">Student</a></li>
                            <li><a href="/user?redirect={{ Request::path() }}">General User</a></li>
                            <li><a href="/admin/login">School Administrator</a></li>
                            <li class="divider"></li>
                            <li class="dropdown-header"><strong>Sign Up As</strong></li>
                            <li><a href="/user?redirect={{ Request::path() }}">General User</a></li>
                        </ul>
                    </div>
                    @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="row sep"></div>
</div>


