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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
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
    @else
    <style>
        .container-fluid {
            padding: 60px 50px;
        }

        .bg-grey {
            background-color: #f6f6f6;
        }

        .logo-small {
            color: #f4511e;
            font-size: 50px;
        }

        .logo {
            color: #f4511e;
            font-size: 200px;
        }

        .thumbnail img {
            width: 100%;
            height: 100%;
            margin-bottom: 10px;
        }

        .carousel-control.right, .carousel-control.left {
            background-image: none;
            color: #f4511e;
        }

        .carousel-indicators li {
            border-color: #f4511e;
        }

        .carousel-indicators li.active {
            background-color: #f4511e;
        }

        .item h4 {
            font-size: 19px;
            line-height: 1.375em;
            font-weight: 400;
            font-style: italic;
            margin: 70px 0;
        }

        .item span {
            font-style: normal;
        }

        .panel-footer .btn:hover {
            border: 1px solid #f4511e;
            background-color: #fff !important;
            color: #f4511e;
        }

        .panel-footer h3 {
            font-size: 32px;
        }

        .panel-footer h4 {
            color: #aaa;
            font-size: 14px;
        }

        .panel-footer .btn {
            margin: 15px 0;
            background-color: #f4511e;
            color: #fff;
        }

        h2 {
            letter-spacing: 3px;
        }

        p.line_height {
            line-height: 1.8;
            font-size: 14px;
        }

        @media screen and (max-width: 768px) {
            .col-sm-4 {
                text-align: center;
                margin: 25px 0;
            }
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
                        <button type="submit" name="search" class="pull-left col-md-1"><span
                                    class="homeicon mdi mdi-magnify"></span></button>
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
                    <!--<a href="/user?redirect={{ Request::path() }}" class="header-login-button"><span class="headericon mdi mdi-account"></span>{{{ trans('main.login_signup') }}}</a>-->
                    <div class="dropdown">
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
<!-- Container (About Section) -->
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-8">
            <h2>OUR COMPANY BACKGROUND</h2>
            <p class="line_height">Uganda’s education system is one of the best in the region that offers a wide number
                of subjects and knowledge base for the students that get an education through it. Although this is and
                continues to be the case, the majority of students graduating from the system are turning out unemployed
                a situation that worries the nation and many others in leadership.
                A number of factors can be highlighted to be the cause of this situation although one that tops them all
                is that knowledge being provided is mostly theoretical and lacks applicability in the working fields of
                today.
            </p>
            <p class="line_height">Edinfotech online education system is a company that was conceptualized and created
                in 2020 following the outbreak of the COVID-19 pandemic that has greatly highlighted the gaps in
                Uganda’s, East Africa’s and Africa’s education systems.
                We seek to provide field-based knowledge and skills to students following specified school and
                institution curriculums and any other individuals, from leading established institutions, and
                individuals that will enable them be competitive, knowledgeable and skillful in the ever-changing work
                field of Uganda, East Africa and Africa.
            </p>
        </div>
        <div class="col-sm-4">
            <span class="glyphicon glyphicon-signal logo"></span>
        </div>
    </div>
</div>

<div class="container-fluid bg-grey">
    <div class="row">
        <div class="col-sm-4">
            <span class="glyphicon glyphicon-globe logo"></span>
        </div>
        <div class="col-sm-8">
            <h2>OUR VALUES</h2>
            <p><ul>
                <li>Quality of service</li>
                <li>Integrity</li>
                <li>Honesty</li>
                <li>Innovation</li>
                <li>People growth</li>
                <li>Excellence</li>
            </ul>
            </p>
            <h4><strong>MISSION:</strong> Our mission lorem ipsum..</h4>
            <p><strong>VISION:</strong> Our vision Lorem ipsum..</p>
        </div>
    </div>
</div>
<div class="container-fluid bg-grey">
    <h2 class="text-center">CONTACT</h2>
    <div class="row">
        <div class="col-sm-5">
            <p>Contact us and we'll get back to you within 24 hours.</p>
            <p><span class="glyphicon glyphicon-map-marker"></span> Chicago, US</p>
            <p><span class="glyphicon glyphicon-phone"></span> +00 1515151515</p>
            <p><span class="glyphicon glyphicon-envelope"></span> myemail@something.com</p>
        </div>
        <div class="col-sm-7">
            <div class="row">
                <div class="col-sm-6 form-group">
                    <input class="form-control" id="name" name="name" placeholder="Name" type="text" required>
                </div>
                <div class="col-sm-6 form-group">
                    <input class="form-control" id="email" name="email" placeholder="Email" type="email" required>
                </div>
            </div>
            <textarea class="form-control" id="comments" name="comments" placeholder="Comment" rows="5"></textarea><br>
            <div class="row">
                <div class="col-sm-12 form-group">
                    <button class="btn btn-default pull-right" type="submit">Send</button>
                </div>
            </div>
        </div>
    </div>
</div>

