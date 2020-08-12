<div class="container hidden-xs hidden-sm" id="anchor-animate">
    <div class="h-25"></div>
    <div class="row">
        <div class="col-xs-12 col-md-4 container-banner-section">
            @if(isset($ads))
                @foreach($ads as $ad)
                    @if($ad->position == 'main-slider-side')
                        <a href="{{{ $ad ? $ad->url : '#' }}}"><img src="{{{ $ad ? $ad->image : '' }}}" class="{{{ $ad ? $ad->size : '' }}}"></a>
                    @endif
                @endforeach
            @endif
        </div>
        <div class="col-xs-12 col-md-8 parts-container">
            @if(!empty($slider_container))
                @foreach($slider_container as $slide)
                    @if(isset($slide->content->metas))
                        <?php $slide_meta = arrayToList($slide->content->metas,'option','value'); ?>
                        <div class="parts-container-slide" id="slide{{{ $slide->content ? $slide->content->id : 0 }}}">
                        <div class="header">
                            <span>{{{ trans('main.featured') }}}</span>
                            <h2><a href="/product/{{{ $slide->content ? $slide->content->id : 0 }}}">{{{ $slide->content ? $slide->content->title : '' }}}</a></h2>
                        </div>
                        <div class="body-container">
                            <div class="row">
                                <div class="col-md-7">
                                    <img src="{{{ isset($slide_meta['cover']) ? $slide_meta['cover'] : '' }}}" class="img-responsive img-main-container img-con-r">
                                </div>
                                <div class="col-md-5 img-con-s">
                                    <div class="item-container">
                                        <div class="col-md-10 text-item">
                                            <span>{{{ $slide ? $slide->description : '' }}}</span>
                                        </div>
                                        <div class="col-md-2">
                                            <span class="homeicon mdi mdi-comment"></span>
                                        </div>
                                    </div>
                                    <div class="item-container">
                                        <div class="col-md-10 timer-item">
                                            <label>{{{ isset($slide_meta['duration']) ? $slide_meta['duration'] : 0 }}} {{{ trans('main.min') }}}</label>
                                        </div>
                                        <div class="col-md-2 ">
                                            <span class="homeicon mdi mdi-alarm"></span>
                                        </div>
                                    </div>
                                    <div class="item-container">
                                        <div class="col-md-10 price-item">
                                            @if(isset($slide_meta['price']) && $slide_meta['price']>0)
                                                <label>{{{currencySign()}}} {{{ isset($slide_meta['price']) ? $slide_meta['price'] : 0 }}}</label>
                                            @else
                                                <label>{{{ trans('main.free_item') }}}</label>
                                            @endif
                                        </div>
                                        <div class="col-md-2">
                                            <span class="homeicon mdi mdi-wallet"></span>
                                        </div>
                                    </div>
                                    <div class="item-container">
                                        <div class="col-md-10 price-item profile-item">
                                            <label><a href="/profile/{{{ $slide->content->user ? $slide->content->user->id : 0 }}}" class="profile-s">{{{ $slide->content->user ? $slide->content->user->name : '' }}}</a></label>
                                        </div>
                                        <div class="col-md-2">
                                            <span class="homeicon mdi mdi-teach"></span>
                                        </div>
                                    </div>
                                    <div>
                                        <a href="/product/{{{ $slide->content ? $slide->content->id : 0 }}}" class="btn btn-container-more btn-container-more-s">{{{ trans('main.view_product') }}}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                @endforeach
            @endif
                <div class="col-xs-12">
                    <ul class="container-bullet">
                        @if(!empty($slider_container))
                            @foreach($slider_container as $index=>$slide)
                                <li data-target="slide{{{ $slide->content ? $slide->content->id : 0 }}}" @if($index == 0) class="active" @endif></li>
                            @endforeach
                        @endif
                    </ul>
                </div>
        </div>
        </div>
    <div class="h-25"></div>
</div>
