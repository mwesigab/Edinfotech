@extends('view.layout.new_layout')
@section('title')
{{{ $setting['site']['site_title'] ?? '' }}}
@endsection
@section('page')
@include('view.parts.slider')
@endsection
