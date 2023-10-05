@extends('admin.layouts.master')

@section('content')
<!-- page-wrapper start -->
<div class="page-wrapper default-version">
    @include('admin.components.sidenav')
    <div class="top-nav-bg">
        @include('admin.components.topnav')
        <div class="breadcrumb-wrapper">
            @include('admin.components.breadcrumb')
        </div>
    </div>

    <div class="body-wrapper">
        <div class="bodywrapper__inner">


            @yield('panel')


        </div><!-- bodywrapper__inner end -->
    </div><!-- body-wrapper end -->
</div>



@endsection