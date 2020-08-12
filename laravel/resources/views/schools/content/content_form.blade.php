@extends('schools.content.admin_video_layout')

@section('pages')
<div class="h-30"></div>
<div class="conteiner-fluid">
    <div class="container cont-10">
        <div class="h-30"></div>
        <div class="multi-steps">
            <div class="col-md-3 col-xs-12 col-sm-4 tab-con right-side">
                <ul>
                    <li class="active" cstep="1"><a href="javascript:void(0);"><span class="upicon mdi mdi-library-video"></span><span>{{{ trans('main.general') }}}</span></a></li>
                    <li cstep="2"><a href="javascript:void(0);"><span class="upicon mdi mdi-apps"></span><span>{{{ trans('main.category') }}}</span></a></li>
                    <li cstep="3"><a href="javascript:void(0);"><span class="upicon mdi mdi-library-books"></span><span>{{{ trans('main.extra_info') }}}</span></a></li>
                    <li cstep="4"><a href="javascript:void(0);"><span class="upicon mdi mdi-folder-image"></span><span>{{{ trans('main.view') }}}</span></a></li>
                    <li cstep="5"><a href="javascript:void(0);"><span class="upicon mdi mdi-movie-open"></span><span>{{{ trans('main.parts') }}}</span></a></li>
                </ul>
            </div>
            <div class="col-md-9 col-xs-12 col-sm-8 tab-con left-side">
                <div class="steps" id="step1">
                    <form method="post" action="/school/content/new" class="form-horizontal">
                        <div class="form-group">
                            <label class="control-label col-md-2 tab-con" for="inputDefault">{{{ trans('main.course_type') }}}</label>
                            <div class="col-md-10 tab-con">
                                <select name="type" class="form-control font-s">
                                    <option value="single">{{{ trans('main.single') }}}</option>
                                    <option value="course">{{{ trans('main.course') }}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2 tab-con" for="inputDefault">{{{ trans('main.education_level') }}}</label>
                            <div class="col-md-10 tab-con">
                                <select name="education_level" class="form-control font-s" id="education_level">
                                    <option>Select--</option>
                                    <option value="1">{{{ trans('main.education_level_one') }}}</option>
                                    <option value="2">{{{ trans('main.education_level_two') }}}</option>
                                    <option value="3">{{{ trans('main.education_level_three') }}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group" style="display: none" id="primary_classes">
                            <label class="control-label col-md-2 tab-con" for="inputDefault">{{{ trans('main.class') }}}</label>
                            <div class="col-md-10 tab-con">
                                <select name="study_class_1" class="form-control font-s">
                                    <option>Select--</option>
                                    <option value="7">{{{ trans('main.class_seven') }}}</option>
                                    <option value="6">{{{ trans('main.class_six') }}}</option>
                                    <option value="5">{{{ trans('main.class_five') }}}</option>
                                    <option value="4">{{{ trans('main.class_four') }}}</option>
                                    <option value="3">{{{ trans('main.class_three') }}}</option>
                                    <option value="2">{{{ trans('main.class_two') }}}</option>
                                    <option value="1">{{{ trans('main.class_one') }}}</option>
                                    <option value="03">{{{ trans('main.elementary_three') }}}</option>
                                    <option value="02">{{{ trans('main.elementary_two') }}}</option>
                                    <option value="01">{{{ trans('main.elementary_one') }}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group" style="display: none" id="secondary_classes">
                            <label class="control-label col-md-2 tab-con" for="inputDefault">{{{ trans('main.class') }}}</label>
                            <div class="col-md-10 tab-con">
                                <select name="study_class_2" class="form-control font-s">
                                    <option>Select--</option>
                                    <option value="6">{{{ trans('main.senior_six') }}}</option>
                                    <option value="5">{{{ trans('main.senior_five') }}}</option>
                                    <option value="4">{{{ trans('main.senior_four') }}}</option>
                                    <option value="3">{{{ trans('main.senior_three') }}}</option>
                                    <option value="2">{{{ trans('main.senior_two') }}}</option>
                                    <option value="1">{{{ trans('main.senior_one') }}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group" style="display: none" id="university_classes">
                            <label class="control-label col-md-2 tab-con" for="inputDefault">{{{ trans('main.class') }}}</label>
                            <div class="col-md-10 tab-con">
                                <select name="study_class_3" class="form-control font-s">
                                    <option>Select--</option>
                                    <option value="6">{{{ trans('main.sixth_year') }}}</option>
                                    <option value="5">{{{ trans('main.fifth_year') }}}</option>
                                    <option value="4">{{{ trans('main.fourth_year') }}}</option>
                                    <option value="3">{{{ trans('main.third_year') }}}</option>
                                    <option value="2">{{{ trans('main.second_year') }}}</option>
                                    <option value="1">{{{ trans('main.first_year') }}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2 tab-con" for="inputDefault">{{{ trans('main.publish_type') }}}</label>
                            <div class="col-md-10 tab-con">
                                <select name="private" class="form-control font-s">
                                    <option value="1">{{{ trans('main.exclusive') }}}</option>
                                    <option value="0">{{{ trans('main.open') }}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2 tab-con" for="inputDefault">{{{ trans('main.course_title') }}}</label>
                            <div class="col-md-10 tab-con">
                                <input type="text" name="title" placeholder="30-60 Characters" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2 tab-con" for="inputDefault">{{{ trans('main.description') }}}</label>
                            <div class="col-md-10 tab-con">
                                <textarea class="form-control editor-te" rows="12" placeholder="Description..." name="content" required></textarea>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group">
                            <div class="col-md-12 tab-con">
                                <input type="submit" class="btn btn-custom pull-left" value="Next">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="steps dnone" id="step2">
                    <form method="post" action="/school/content/new" class="form-horizontal">
                        <div class="form-group">
                            <label class="col-md-2 control-label" for="inputDefault">{{{ trans('main.category') }}}</label>
                            <div class="col-md-10">
                                <select name="category_id" id="category_id" class="form-control font-s" required>
                                    <option value="0">{{{ trans('main.select_category') }}}</option>
                                    @foreach($menus as $menu)
                                    @if($menu->parent_id == 0)
                                    <optgroup label="{{{ $menu->title ?? '' }}}">
                                        @if(count($menu->childs)>0)
                                        @foreach($menu->childs as $sub)
                                        <option value="{{{ $sub->id ?? '' }}}" >{{{ $sub->title ?? '' }}}</option>
                                        @endforeach
                                        @else
                                        <option value="{{{ $menu->id ?? '' }}}" >{{{ $menu->title ?? '' }}}</option>
                                        @endif
                                    </optgroup>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="h-15"></div>
                        @foreach($menus as $menu)
                        <div class="col-md-11 col-md-offset-1 filters" id="filter{{{ $menu->id ?? 0 }}}">
                            @foreach($menu->filters as $filter)
                            <div class="col-md-3 col-xs-12">
                                <h5>{{{ $filter->filter ?? '' }}}</h5>
                                <hr>
                                <ul class="cat-filters-li pamaz">
                                    <ul class="submenu submenu-s">
                                        @foreach($filter->tags as $tag)
                                        <li class="second-input"><input type="checkbox" class="filter-tags dblock" id="tag{{{ $tag->id ?? '' }}}" name="tags[]" value="{{{ $tag->id ?? 0 }}}"><label for="tag{{{ $tag->id ?? '' }}}"><span></span>{{{ $tag->tag ?? '' }}}</label></li>
                                        @endforeach
                                    </ul>
                                </ul>
                            </div>
                            @endforeach
                        </div>
                        @endforeach

                    </form>
                </div>
                <div class="steps dnone" id="step3">
                    <form method="post" class="form-horizontal">
                        <div class="form-group">
                            <label class="control-label col-md-5 col-md-offset-1 form-label-s" for="inputDefault">{{{ trans('main.free_course') }}}</label>
                            <div class="col-md-6">
                                <div class="switch switch-sm switch-primary pull-left">
                                    <input type="hidden" value="1" name="price">
                                    <input type="checkbox" name="price" id="free" value="0" data-plugin-ios-switch />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5 col-md-offset-1 form-label-s" for="inputDefault">{{{ trans('main.vendor_postal_sale') }}}</label>
                            <div class="col-md-6">
                                <div class="switch switch-sm switch-primary pull-left" id="post_toggle">
                                    <input type="hidden" value="0" name="post">
                                    <input type="checkbox" name="post" value="1" data-plugin-ios-switch />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5 col-md-offset-1 form-label-s" for="inputDefault">{{{ trans('main.vendor_supports_item') }}}</label>
                            <div class="col-md-6">
                                <div class="switch switch-sm switch-primary pull-left">
                                    <input type="hidden" value="0" name="support">
                                    <input type="checkbox" name="support" value="1" data-plugin-ios-switch />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5 col-md-offset-1 form-label-s" for="inputDefault">{{{ trans('main.documents') }}}</label>
                            <div class="col-md-6">
                                <div class="switch switch-sm switch-primary pull-left">
                                    <input type="hidden" value="0" name="document">
                                    <input type="checkbox" name="document" value="1" data-plugin-ios-switch />
                                </div>
                            </div>
                        </div>
                        <div class="h-10"></div>
                        <div class="form-group">
                            <label class="control-label col-md-2">{{{ trans('main.price') }}}</label>
                            <div class="col-md-10">
                                <div class="input-group">
                                    <input type="text" name="price" onkeypress="validate(event)" value="{{{$meta['price'] ?? ''}}}" class="form-control text-center numtostr" disabled>
                                    <span class="input-group-addon click-for-upload img-icon-s">@if(!empty($meta['price'])) {{{ currencySign() }}}{{{ num2str($meta['price']) }}} @endif</span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-2">{{{ trans('main.postal_price') }}}</label>
                            <div class="col-md-10">
                                <div class="input-group">
                                    <input type="text" name="post_price" onkeypress="validate(event)" value="{{{$meta['post_price'] ?? ''}}}" class="form-control text-center numtostr" disabled>
                                    <span class="input-group-addon click-for-upload img-icon-s">@if(!empty($meta['post_price'])) {{{ currencySign() }}}{{{ num2str($meta['post_price']) }}} @endif</span>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="h-30"></div>
    </div>
</div>

@endsection
@section('script')

<script>
    $('#education_level').change(function () {
        let val = $(this).val();
        if(val==="1"){
            $('#primary_classes').show();
            $('#secondary_classes').hide();
            $('#university_classes').hide();
        }else if(val==="2"){
            $('#primary_classes').hide();
            $('#secondary_classes').show();
            $('#university_classes').hide();
        }else if(val==="3"){
            $('#primary_classes').hide();
            $('#secondary_classes').hide();
            $('#university_classes').show();
        }else{
            $('#primary_classes').hide();
            $('#secondary_classes').hide();
            $('#university_classes').hide();
        }
    });
</script>

<script>
    $('.editor-te').jqte({format: false});
</script>
<script>
    $('document').ready(function () {
        $('input[name="post"]').change(function () {
            if($(this).prop('checked')){
                $('input[name="post_price"]').removeAttr('disabled');
            }else{
                $('input[name="post_price"]').attr('disabled','disabled');
            }
        });
        $('#free').change(function () {
            if($(this).prop('checked')){
                $('input[name="price"]').attr('disabled','disabled');
                $('input[name="post_price"]').attr('disabled','disabled');
            }else{
                $('input[name="price"]').removeAttr('disabled');
            }
        });
    })
</script>
<script>
    $('#category_id').change(function () {
        var id = $(this).val();
        $('.filter-tags').removeAttr('checked');
        $('.filters').not('#filter'+id).each(function(){
            $('.filters').slideUp();
        });
        $('#filter'+id).slideDown(500);
    })
</script>
@endsection
