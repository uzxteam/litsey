@extends($activeTemplate.'layouts.frontend')
@section('content')
@php
    $contact = getContent('contact_us.content',true);
@endphp
<!-- ==================== Contact info Start Here ==================== -->
<section class="contact-bottom py-80">
    <div class="container">
        <div class="row gy-4 justify-content-center">
            <div class="col-lg-4 col-md-6">
                <div class="contact-info" >
                    <div class="contact-info__addres-wrap mb-30">
                        <div class="single_wrapper">
                            <h4>@lang('Call Us')</h4>
                            <div class="single-info">
                                <div class="cont-icon">
                                    <i class="fas fa-phone"></i>
                                </div>
                                <div class="cont-text">
                                    <h6><a href="tel:{{__($contact->data_values->contact_number)}}">{{__($contact->data_values->contact_number)}}</a></h6>
                                </div>
                            </div>
                       </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="contact-info" >
                    <div class="contact-info__addres-wrap mb-30">
                        <div class="single_wrapper">
                            <h4>@lang('Email')</h4>
                            <div class="single-info">
                                <div class="cont-icon">
                                    <i class="far fa-envelope"></i>
                                </div>
                                <div class="cont-text">
                                  <h6><a href="mailto:{{__($contact->data_values->email_address)}}">{{__($contact->data_values->email_address)}}</a></h6>
                                </div>
                            </div>
                       </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="contact-info" >
                    <div class="contact-info__addres-wrap mb-30">
                        <div class="single_wrapper">
                            <h4>@lang('Office')</h4>
                            <div class="single-info">
                                <div class="cont-icon">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                                <div class="cont-text">
                                    <h6><a>{{__($contact->data_values->contact_details)}}</a></h6>
                                </div>
                            </div>
                       </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ==================== Contact info End Here ==================== -->

<!-- ==================== Contact Form Start Here ==================== -->
<section class="contact-bottom section-bg py-80">
    <div class="container">
        <div class="row gy-4 justify-content-center">
            <div class="col-lg-6">
                <div class="subscribe-right">
                    <div class="thumb">
                       <img src="{{getImage(getFilePath('contact_us').'/'.@$contact->data_values->contact_image)}}" alt="">
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="contactus-form">
                    <h3 class="contact__title">{{__($contact->data_values->title)}}</h3>
                    <form method="post" action="" class="verify-gcaptcha">
                        @csrf
                        <div class="row gy-md-4 gy-3">
                            <div class="col-sm-12">
                                <label class="form-label">@lang('Name')</label>
                                <input name="name"  type="text" class="form--control"  value="@if(auth()->user()){{ auth()->user()->fullname }} @else{{ old('name') }}@endif"
                                @if(auth()->user()) readonly @endif required>
                            </div>
                            <div class="col-sm-12">
                                <label class="form-label">@lang('Email')</label>
                                <input name="email" type="email" class="form--control" value="@if(auth()->user()){{ auth()->user()->email }}@else{{  old('email') }}@endif"
                                @if(auth()->user()) readonly @endif required>
                            </div>
                            <div class="col-sm-12">
                                <label class="form-label">@lang('Subject')</label>
                                <input name="subject" type="text" class="form--control" value="{{old('subject')}}" required>
                            </div>
                            <div class="col-sm-12">
                                <label class="form-label">@lang('Message')</label>
                                <textarea class="form--control" name="message">{{old('message')}}</textarea>
                            </div>
                            <x-captcha></x-captcha>
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn--base">
                                   @lang('Send Your Message')<i class="fas fa-paper-plane"></i>
                                    <span style="top: 249px; left: 75.9844px;"></span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ==================== Contact Form End Here ==================== -->

<!-- ==================== Map Start Here ==================== -->
<div>
    <div class="container-fluid">
        <div class="contact-map">
            <iframe src="https://maps.google.com/maps?q={{ $contact->data_values->latitude }},{{ $contact->data_values->longitude }}&hl=es;z=14&amp;output=embed" width="600" height="450" allowfullscreen="" loading="lazy"></iframe>
        </div>
    </div>
</div>
<!-- ==================== Map Start Here ==================== -->
@endsection
