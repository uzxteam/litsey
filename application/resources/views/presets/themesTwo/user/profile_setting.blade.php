@extends($activeTemplate.'layouts.master')
@section('content')
<div class="col-xl-9 col-lg-8">
    <div class="dashboard-body">
        <div class="row gy-4 justify-content-center">
            <div  class="contactus-form">
            <div class="col-lg-12">
                <div class="user-profile">
                    <form class="register" action="" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row gy-3">
                            <div class="col-sm-12">
                                <h4 class="mb-1">{{__($pageTitle)}}</h4>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="firstname" class="form--label">@lang('First Name')</label>
                                    <input type="text" class="form--control" id="firstname" name="firstname"
                                    value="{{$user->firstname}}" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="lastname" class="form--label">@lang('Last Name')</label>
                                    <input type="text" class="form--control" id="lastname" name="lastname"
                                    value="{{$user->lastname}}" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="email" class="form--label">@lang('E-mail Address')</label>
                                    <input type="text" class="form--control" id="email" name="email"
                                    value="{{$user->email}}" readonly>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="email" class="form--label">@lang('Country')</label>
                                    <select name="country" class="form--control">
                                        @foreach($countries as $key => $country)
                                            <option {{(@$user->address->country == $country->country) ? 'selected' : ''}}  data-mobile_code="{{ $country->dial_code }}" value="{{ $country->country }}" data-code="{{ $key }}">{{ __($country->country) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="input-group mb-3">
                                    <label class="form--label">@lang('Mobile Optional') : {{@$user->mobile}}</label>
                                    <div class="input-group country-code">
                                        <span class="input-group-text mobile-code" id="basic-addon1"></span>
                                        <input type="hidden" name="mobile_code">
                                         <input type="hidden" name="country_code">
                                        <input type="number" class="form--control" name="mobile" @if(@$user->mobile)  @endif  class="form-control form--control   checkUser" required>
                                    </div>
                                    <small class="text-danger mobileExist"></small>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="address" class="form--label">@lang('Address')</label>
                                    <input type="text" class="form--control" id="address" name="address"
                                    value="{{@$user->address->address}}">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="address" class="form--label">@lang('State')</label>
                                    <input type="text" class="form--control" id="address" name="state"
                                    value="{{@$user->address->state}}">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="address" class="form--label">@lang('City')</label>
                                    <input type="text" class="form--control" id="address" name="city"
                                    value="{{@$user->address->city}}">
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <button type="submit" class="btn btn--base w-50">@lang('Submit')</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
     </div>
  </div>
</div>
@endsection

@push('style')
    <style>
       
        .country-code select{
            border: none;
        }
        .country-code select:focus{
            border: none;
            outline: none;
        }
    </style>
@endpush
@push('script-lib')
    <script src="{{ asset('assets/global/js/secure_password.js') }}"></script>
@endpush
@push('script')
    <script>
      "use strict";
        (function ($) {
            @if($mobileCode)
            $(`option[data-code={{ $mobileCode }}]`).attr('selected','');
            @endif
            $('select[name=country]').change(function(){
                $('input[name=mobile_code]').val($('select[name=country] :selected').data('mobile_code'));
                $('input[name=country_code]').val($('select[name=country] :selected').data('code'));
                $('.mobile-code').text('+'+$('select[name=country] :selected').data('mobile_code'));
            });
            $('input[name=mobile_code]').val($('select[name=country] :selected').data('mobile_code'));
            $('input[name=country_code]').val($('select[name=country] :selected').data('code'));
            $('.mobile-code').text('+'+$('select[name=country] :selected').data('mobile_code'));
            @if($general->secure_password)
                $('input[name=password]').on('input',function(){
                    secure_password($(this));
                });
                $('[name=password]').focus(function () {
                    $(this).closest('.form-group').addClass('hover-input-popup');
                });
                $('[name=password]').focusout(function () {
                    $(this).closest('.form-group').removeClass('hover-input-popup');
                });
            @endif
            $('.checkUser').on('focusout',function(e){
                var url = '{{ route('user.checkUser') }}';
                var value = $(this).val();
                var token = '{{ csrf_token() }}';
                if ($(this).attr('name') == 'mobile') {
                    var mobile = `${$('.mobile-code').text().substr(1)}${value}`;
                    var data = {mobile:mobile,_token:token}
                }
                if ($(this).attr('name') == 'email') {
                    var data = {email:value,_token:token}
                }
                if ($(this).attr('name') == 'username') {
                    var data = {username:value,_token:token}
                }
                $.post(url,data,function(response) {
                  if (response.data != false && response.type == 'email') {
                    $('#existModalCenter').modal('show');
                  }else if(response.data != false){
                    $(`.${response.type}Exist`).text(`${response.type} already exist`);
                  }else{
                    $(`.${response.type}Exist`).text('');
                  }
                });
            });
        })(jQuery);
    </script>
@endpush

