@extends('admin.newlayout.layout',['breadcom'=>['Users','Channel',$edit->title]])
@section('title')
       {{{ $edit->title ?? '' }}}
@endsection
@section('page')

    <section class="card">
        <div class="card-body">
            <form action="/admin/channel/store/{{{$edit->id}}}" class="form-horizontal form-bordered" method="post">

                <div class="form-group">
                    <label class="col-md-1 control-label" for="inputDefault">{{{ trans('admin.channel_title') }}}</label>
                    <div class="col-md-11">
                        <input type="text" name="title" value="{{{ $edit->title ?? '' }}}" class="form-control" id="inputDefault">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-1 control-label" for="inputDefault">{{{ trans('admin.channel_id') }}}</label>
                    <div class="col-md-11">
                        <input type="text" name="username" value="{{{ $edit->username ?? '' }}}" class="form-control" id="inputDefault" disabled>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-1 control-label">{{{ trans('admin.channel_cover') }}}</label>
                    <div class="col-md-11">
                        <div class="input-group">
                            <span class="input-group-prepend view-selected cu-p" data-toggle="modal" data-target="#ImageModal" data-whatever="image" >
                                <span class="input-group-text"><i class="fa fa-eye" aria-hidden="true"></i></span>
                            </span>
                            <input type="text" name="image" dir="ltr" value="{{{$edit->image ?? ''}}}" class="form-control">
                            <span class="input-group-append click-for-upload cu-p">
                                <span class="input-group-text"><i class="fa fa-upload" aria-hidden="true"></i></span>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-1 control-label">{{{ trans('admin.channel_icon') }}}</label>
                    <div class="col-md-11">
                        <div class="input-group">
                            <span class="input-group-prepend view-selected cu-p" data-toggle="modal" data-target="#ImageModal" data-whatever="avatar">
                                <span class="input-group-text"><i class="fa fa-eye" aria-hidden="true"></i></span>
                            </span>
                            <input type="text" name="avatar" dir="ltr" value="{{{$edit->avatar ?? ''}}}" class="form-control">
                            <span class="input-group-append click-for-upload cu-p">
                                <span class="input-group-text"><i class="fa fa-upload" aria-hidden="true"></i></span>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-1 control-label">{{{ trans('admin.documents') }}}</label>
                    <div class="col-md-11">
                        <div class="input-group">
                            <span class="input-group-prepend cu-p"><a href="{{{$edit->attach ?? ''}}}" target="_blank">
                                    <span class="input-group-text"><i class="fa fa-eye" aria-hidden="true"></i></span>
                                </a>
                            </span>
                            <input type="text" name="attach" dir="ltr" value="{{{$edit->attach ?? ''}}}" class="form-control">
                            <span class="input-group-append click-for-upload cu-p">
                                <span class="input-group-text"><i class="fa fa-upload" aria-hidden="true"></i></span>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-12">
                        <textarea class="summernote" name="description" required>{{{ $edit->description ?? '' }}}</textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">{{{ trans('admin.verification_status') }}}</label>
                    <div class="col-md-11">
                        <select name="formal" class="form-control populate">
                            <option value="ok" {{ $edit->formal == 'ok'?'selected="selected"':'' }}>{{{ trans('admin.verified') }}}</option>
                            <option value="none" {{ $edit->formal == 'none'?'selected="selected"':'' }}>{{{ trans('admin.not_verified') }}}</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-1 control-label">{{{ trans('admin.th_status') }}}</label>
                    <div class="col-md-11">
                        <select name="mode" class="form-control populate">
                            <option value="active" {{ $edit->mode=='active'?'selected="selected"':'' }}>{{{ trans('admin.active') }}}</option>
                            <option value="deactive" {{ $edit->mode=='deactive'?'selected="selected"':'' }}>{{{ trans('admin.disabled') }}}</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-1 control-label"></label>
                    <div class="col-md-11">
                        <button class="btn btn-primary pull-left" type="submit">{{{ trans('admin.save_changes') }}}</button>
                    </div>
                </div>

            </form>
        </div>
    </section>

@endsection


