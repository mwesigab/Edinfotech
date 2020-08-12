@include('schools.content.admin_layout_header',['title'=>'User Panel'])
<div class="container-fluid no-padding-xs" style="background: url({{{ get_option('upload_page_background','/assets/images/plant.jpg') }}});background-size: cover;">
    <div class="h-20"></div>
    <div class="container no-padding-xs">
        <div class="col-md-12 col-xs-12">
            @yield('pages')
        </div>
    </div>
    <div class="h-20"></div>
    <div class="h-30"></div>
</div>


@section('script')
<script>$('#buy-hover').addClass('item-box-active');</script>
@endsection

@include('user.layout.modals')
@include('view.layout.footer')
