@extends('admin.newlayout.layout')
@section('title', 'About')
@section('page')
    <div class="card">
        <div class="card-body text-center">
            <img src="{!! get_option('site_logo') !!}">
            <div class="h-10"></div>
			<h3>Edinfotech.com</h3>
            <h4>Version: 1.5</h4>
            <div class="h-10"></div>
            <h5><p>Built by <a href="https://elitepathsoftware.com">Elitepath Software Ltd</a></p></h5>
			<p><a href="mailto:sale@elitepathsoftware.com">Contact support</a></p>
			<p>If you want to edit this page go on sourcecodes at /public_html/laravel/resources/views/admin/about.blade.php</a></p>
        </div>
    </div>
@endsection
