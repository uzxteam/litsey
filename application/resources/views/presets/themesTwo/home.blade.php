@extends($activeTemplate.'layouts.frontend')
@section('content')

@php
$banner = getContent('theme_two_banner.content', true);
@endphp
<!--========================== Banner Section Start ==========================-->
<!-- bg-img -->
<section class="banner-section bg-img" style="background-image: url({{asset($activeTemplateTrue.'images/banner-bg-3.jpg')}})">
    <div class="round-shape-1 animate-y-axis"></div>
    <div class="octagon-shape-1 animate-zoom-inout"></div>
    <div class="star-shape-1 animate-zoom-fade"></div>
    <div class="triangle-shape-1 animate-rotate"></div>

  <div class="container">
      <div class="row gy-4 align-items-center justify-content-center text-center">
          <div class="col-xl-7 col-lg-7 col-md-10">
                <div class="banner-left__content">
                  <span class="subtitle">{{__($banner->data_values->top_heading)}}</span>
                    <h2 class="position-relative">
                        {{__($banner->data_values->heading)}}
                        <span class="animate-shape">
                            <img src="{{asset($activeTemplateTrue.'images/animate-shape.png')}}" alt="Animate-shape">
                        </span>
                    </h2>
                    <p>{{__($banner->data_values->sub_heading)}}</p>
                    <a href="{{url('/plan')}}" class="btn btn--base me-2 mb-2">
                        {{__($banner->data_values->banner_btn_1)}} <i class="fa-sharp fas fa-arrow-right"></i>
                    </a>
                    <a href="{{url('/contact')}}" class="btn btn--base outline mb-2">
                        {{__($banner->data_values->banner_btn_2)}} <i class="fas fa-id-card"></i>
                    </a>
                </div>
            </div>
      </div>
  </div>
</section>
<!--========================== Banner Section End ==========================-->


@if($sections->secs != null)
@foreach(json_decode($sections->secs) as $sec)
@include($activeTemplate.'sections.'.$sec)
@endforeach
@endif

@endsection

