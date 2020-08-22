<div class="container-fluid" id="footer">
    <div class="container">
        <div class="col-md-3 col-xs-12 tab-con login-container">
            <h4>{{{ get_option('footer_col1_title') }}}</h4>
            <p>{!! get_option('footer_col1_content') !!}</p>
        </div>
        <div class="col-md-3 col-xs-12 tab-con">
            <h4>{{{ get_option('footer_col2_title') }}}</h4>
            <p><ul class="list-pages">
                <a href="#about-us"><li><h5>About Us</h5></li></a>
                <a href="#contact-us"><li><h5>Contact Us</h5></li></a>
                <a href="/user?redirect={{ Request::path() }}"><li><h5>Login</h5></li></a>
                <a href="/user?redirect={{ Request::path() }}"><li><h5>Sign Up</h5></li></a>
            </ul></p>
        </div>
        <div class="col-md-3 col-xs-6 tab-con">
            <h4>{{{ get_option('footer_col3_title') }}}</h4>
            <p><img id="payment" src="/assets/images/flutterwave.png" alt="Payment Platform Logo"></p>
        </div>
        <div class="col-md-3 col-xs-6 ab-con">
            <h4>{{{ get_option('footer_col4_title') }}}</h4>
            <p>{!! get_option('footer_col4_content') !!}</p>
        </div>
    </div>
</div>
<div class="container-fluid footer-blow">
	<div class="col-md-3 col-xs-12 text-center">
        <span class="social-text">{{{ trans('main.social_footer') }}}</span>
        <ul>
            @if(!empty($socials))
                @foreach($socials as $social)
                    <li><a href="{{{ $social->link ?? '' }}}" target="_blank" title="{{{ $social->title ?? '' }}}"><img src="{{{ $social->icon ?? '' }}}"/></a></li>
                @endforeach
            @endif
        </ul>
    </div>
    <div class="col-md-9 col-xs-12">
        <span class="copyright">
            Copyright 2020&#169;{{{ trans('main.copyright') }}}
        </span>
    </div>
</div>
<div class="modal fade" id="uploader-modal" role="dialog">
    <div class="modal-dialog modal-dialog-s">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">{{{ trans('main.file_manager') }}}</h4>
            </div>
            <div class="modal-body">
                <iframe class="modal-body-s" width="100%" height="400" src="/assets/filemanager/dialog.php?type=2&field_id=upload-id-fill&relative_url=1" frameborder="0"></iframe>
            </div>
        </div>
    </div>
</div>
@if(get_option('site_popup',0) == '1')
    <div class="modal fade" id="site_popup">
        <div class="modal-dialog popup_modal">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <i class="fa fa-close" data-dismiss="modal"></i>
                    <a href="{{{ get_option('popup_url','javascript:void(0);') }}}"><img src="{{{ get_option('popup_image','') }}}" class="img-responsive"></a>
                </div>
            </div>
        </div>
    </div>
@endif
@if(get_option('triangle-banner-top-image','')!='')
    <div class="fix-top-banner">
        <a href="{{{ get_option('triangle-banner-top-url','') }}}"><img src="{{{ get_option('triangle-banner-top-image','') }}}"></a>
    </div>
@endif
@if(get_option('triangle-banner-bottom-image','')!='')
    <div class="fix-bottom-banner">
        <a href="{{{ get_option('triangle-banner-bottom-url','') }}}"><img src="{{{ get_option('triangle-banner-bottom-image','') }}}"></a>
    </div>
@endif
@if(get_option('banner-html-box','')!='')
    <div class="fix-html-bottom">
        {!! get_option('banner-html-box','') !!}
    </div>
@endif
<script type="application/javascript" src="/assets/vendor/jquery-ui/js/jquery-1.10.2.js"></script>
<script type="application/javascript" src="/assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<script type="application/javascript" src="/assets/vendor/justgage/raphael-2.1.4.min.js"></script>
<script type="application/javascript" src="/assets/vendor/justgage/justgage.js"></script>
<script type="application/javascript" src="/assets/vendor/simplepagination/jquery.simplePagination.js"></script>
<script type="application/javascript" src="/assets/vendor/onloader/js/jquery.oLoader.min.js"></script>
<script type="application/javascript" src="/assets/vendor/ios7-switch/ios7-switch.js"></script>
<script type="application/javascript" src="/assets/vendor/sticky/jquery.sticky.js"></script>
<script type="application/javascript" src="/assets/vendor/chartjs/Chart.min.js"></script>
<script type="application/javascript" src="/assets/vendor/bootstrap-notify-master/bootstrap-notify.min.js"></script>
<script type="application/javascript" src="/assets/vendor/auto-numeric/autoNumeric.js"></script>
<script type="application/javascript" src="/assets/vendor/raty/jquery.raty.js"></script>
<script type="application/javascript" src="/assets/vendor/easyautocomplete/jquery.easy-autocomplete.min.js"></script>
<script type="application/javascript" src="/assets/vendor/bootstrap-tagsinput/bootstrap-tagsinput.js"></script>
<script type="application/javascript" src="/assets/vendor/owlcarousel/dist/owl.carousel.min.js"></script>
<script type="application/javascript" src="/assets/vendor/jquery-te/jquery-te-1.4.0.min.js"></script>
<script type="application/javascript">var sliderTimer = <?=get_option('main_page_slider_timer',10000);?>;</script>
<script>var preloader = {!! get_option('site_preloader',0) !!};</script>
<script type="application/javascript" src="/assets/javascripts/view-custom.js"></script>
@if(isset($user))
    <script>login({!! $user['id'] !!})</script>
@endif
@if(get_option('site_popup',0) == '1' && session('popup') == 0)
    <script>
        $(function () {
            $('#site_popup').modal();
        })
    </script>
    @php session(['popup'=>1]) @endphp
@endif
@yield('script')
@if(session('msg') != null)
    <script>
        $.notify({
            message: '{{{ session('msg')}}}'
        },{
            type: 'danger',
            allow_dismiss: false,
            z_index: '99999999',
            placement: {
                from: "bottom",
                align: "right"
            },
            position:'fixed'
        });
    </script>
@endif
{!! get_option('main_js') !!}
</body>
</html>
