<!doctype html>
<html lang="{{ config('app.locale') }}" itemscope itemtype="http://schema.org/WebPage">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> {{ $general->siteName(__($pageTitle)) }}</title>
    @include('includes.seo')
    <!-- Bootstrap CSS -->
    <link href="{{ asset('assets/common/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/common/css/all.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/common/css/line-awesome.min.css')}}">

    <link rel="stylesheet" href="{{asset($activeTemplateTrue.'css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset($activeTemplateTrue.'css/custom-animation.css')}}">
    <link rel="stylesheet" href="{{asset($activeTemplateTrue.'css/slick.css')}}">
    <link rel="stylesheet" href="{{asset($activeTemplateTrue.'css/odometer.css')}}">
    <link rel="stylesheet" href="{{asset($activeTemplateTrue.'css/main.css')}}">

    @stack('style-lib')

    @stack('style')

    @if($general->theme_two_base_color && $general->theme_two_secondary_color )
    <link rel="stylesheet" href="{{ asset($activeTemplateTrue.'css/color.php') }}?color={{ $general->theme_two_base_color }}&secondColor={{ $general->theme_two_secondary_color }}">
    @endif

</head>
<body>

 <!--==================== Preloader Start ====================-->
 <div id="loading">
    <div id="loading-center">
        <div id="loading-center-absolute">
            <div class="object" id="object_one"></div>
            <div class="object" id="object_two"></div>
            <div class="object" id="object_three"></div>
        </div>
    </div>
</div>
 <!--==================== Preloader End ====================-->

 <!--==================== Overlay Start ====================-->
 <div class="body-overlay"></div>
 <!--==================== Overlay End ====================-->

 <!--==================== Sidebar Overlay End ====================-->
 <div class="sidebar-overlay"></div>
 <!--==================== Sidebar Overlay End ====================-->

 <!-- ==================== Scroll to Top End Here ==================== -->
 <a class="scroll-top"><i class="fas fa-angle-double-up"></i></a>
 <!-- ==================== Scroll to Top End Here ==================== -->

 @include($activeTemplate.'components.header')

 @if(request()->route()->uri != '/')
 @include($activeTemplate.'components.breadcrumb')
 @endif

@yield('content')

@include($activeTemplate.'components.footer')


@php
    $cookie = App\Models\Frontend::where('data_keys','cookie.data')->first();
@endphp
@if(($cookie->data_values->status == 1) && !\Cookie::get('gdpr_cookie'))
    <!-- cookies dark version start -->
    <div class="cookies-card text-center hide">
      <p class="mt-4 cookies-card__content">{{ $cookie->data_values->short_desc }} <a href="{{ route('cookie.policy') }}" target="_blank">@lang('learn more')</a></p>
      <div class="cookies-card__btn mt-4">
        <a href="javascript:void(0)" class="btn btn--base w-50 policy">@lang('Allow')</a>
      </div>
    </div>
  <!-- cookies dark version end -->
  @endif


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="{{asset('assets/common/js/jquery-3.7.0.min.js')}}"></script>
<script src="{{asset('assets/common/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset($activeTemplateTrue.'js/popper.min.js')}}"></script>
<script src="{{asset($activeTemplateTrue.'js/bootstrap.min.js')}}"></script>
<script src="{{asset($activeTemplateTrue.'js/slick.min.js')}}"></script>
<script src="{{asset($activeTemplateTrue.'js/moment.min.js')}}"></script>
<script src="{{asset($activeTemplateTrue.'js/jquery.appear.min.js')}}"></script>
<script src="{{asset($activeTemplateTrue.'js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset($activeTemplateTrue.'js/odometer.min.js')}}"></script>
<script src="{{asset($activeTemplateTrue.'js/viewport.jquery.js')}}"></script>
<script src="{{asset($activeTemplateTrue.'js/main.js')}}"></script>

@stack('script-lib')

@stack('script')

@include('includes.plugins')

@include('includes.notify')


<script>
    (function ($) {
        "use strict";
        $(".langSel").on("change", function() {
            window.location.href = "{{route('home')}}/change/"+$(this).val() ;
        });

        var inputElements = $('input,select');
        $.each(inputElements, function (index, element) {
            element = $(element);
            element.closest('.form-group').find('label').attr('for',element.attr('name'));
            element.attr('id',element.attr('name'))
        });

        $('.policy').on('click',function(){
            $.get('{{route('cookie.accept')}}', function(response){
                $('.cookies-card').addClass('d-none');
            });
        });

        setTimeout(function(){
            $('.cookies-card').removeClass('hide')
        },2000);

        var inputElements = $('[type=text],select,textarea');
        $.each(inputElements, function (index, element) {
            element = $(element);
            element.closest('.form-group').find('label').attr('for',element.attr('name'));
            element.attr('id',element.attr('name'))
        });

        $.each($('input, select, textarea'), function (i, element) {

            if (element.hasAttribute('required')) {
                $(element).closest('.form-group').find('label').addClass('required');
            }

        });

    })(jQuery);
</script>

</body>
</html>
