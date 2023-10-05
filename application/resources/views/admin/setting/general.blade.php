@extends('admin.layouts.app')
@section('panel')
<div class="row mb-none-30">
    <div class="col-lg-12 col-md-12 mb-30">
        <div class="card">
            <div class="card-body px-4">
                <form action="" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row mb-2">
                                <div class="col-md-3 col-xs-4 d-flex align-items-center">
                                    <label class="required"> @lang('Site Title')</label>
                                </div>
                                <div class="col-md-9 col-xs-12">
                                    <input class="form-control" type="text" name="site_name" required
                                        value="{{$general->site_name}}">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-3 col-xs-4 d-flex align-items-center">
                                    <label class="required">@lang('Currency')</label>
                                </div>
                                <div class="col-md-9 col-xs-12">
                                    <input class="form-control" type="text" name="cur_text" required
                                        value="{{$general->cur_text}}">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-3 col-xs-4 d-flex align-items-center">
                                    <label class="required">@lang('Currency Symbol')</label>
                                </div>
                                <div class="col-md-9 col-xs-12">
                                    <input class="form-control" type="text" name="cur_sym" required
                                        value="{{$general->cur_sym}}">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-3 col-xs-4 d-flex align-items-center">
                                    <label> @lang('Theme Two Base Color')</label>
                                </div>
                                <div class="col-md-9 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-text p-0 border-0">
                                            <input type='text' class="form-control colorPicker"
                                                value="{{$general->theme_two_base_color}}" />
                                        </span>
                                        <input type="text" class="form-control colorCode" name="theme_two_base_color"
                                            value="{{$general->theme_two_base_color}}" />
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-5">
                                <div class="col-md-3 col-xs-4 d-flex align-items-center">
                                    <label> @lang('Theme Two Secondary Color')</label>
                                </div>
                                <div class="col-md-9 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-text p-0 border-0">
                                            <input type='text' class="form-control colorPicker"
                                                value="{{$general->theme_two_secondary_color}}" />
                                        </span>
                                        <input type="text" class="form-control colorCode" name="theme_two_secondary_color"
                                            value="{{$general->theme_two_secondary_color}}" />
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="row mb-2">
                                <div class="col-md-3 col-xs-4 d-flex align-items-center">
                                    <label> @lang('Timezone')</label>
                                </div>
                                <div class="col-md-9 col-xs-12">
                                    <select class="select2-basic" name="timezone">
                                        @foreach($timezones as $timezone)
                                        <option value="'{{ @$timezone }}'">{{ __($timezone) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-3 col-xs-4 d-flex align-items-center">
                                    <label> @lang('Default Theme Base Color')</label>
                                </div>
                                <div class="col-md-9 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-text p-0 border-0">
                                            <input type='text' class="form-control colorPicker"
                                                value="{{$general->base_color}}" />
                                        </span>
                                        <input type="text" class="form-control colorCode" name="base_color"
                                            value="{{ $general->base_color }}" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 col-xs-4 d-flex align-items-center">
                                    <label> @lang('Default Theme Secondary Color')</label>
                                </div>
                                <div class="col-md-9 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-text p-0 border-0">
                                            <input type='text' class="form-control colorPicker"
                                                value="{{$general->secondary_color}}" />
                                        </span>
                                        <input type="text" class="form-control colorCode" name="secondary_color"
                                            value="{{ $general->secondary_color }}" />
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-md-3 col-xs-4 d-flex align-items-center">
                                    <label> @lang('Theme Three Base Color')</label>
                                </div>
                                <div class="col-md-9 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-text p-0 border-0">
                                            <input type='text' class="form-control colorPicker"
                                                value="{{$general->theme_three_base_color}}" />
                                        </span>
                                        <input type="text" class="form-control colorCode" name="theme_three_base_color"
                                            value="{{$general->theme_three_base_color}}" />
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-5">
                                <div class="col-md-3 col-xs-4 d-flex align-items-center">
                                    <label> @lang('Theme Three Secondary Color')</label>
                                </div>
                                <div class="col-md-9 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-text p-0 border-0">
                                            <input type='text' class="form-control colorPicker"
                                                value="{{$general->theme_three_secondary_color}}" />
                                        </span>
                                        <input type="text" class="form-control colorCode" name="theme_three_secondary_color"
                                            value="{{$general->theme_three_secondary_color}}" />
                                    </div>
                                </div>
                            </div>





                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-2 col-sm-6 mb-4">
                            <label class="fw-bold">@lang('User Registration')</label>
                            <label class="switch m-0">
                                <input type="checkbox" class="toggle-switch" name="registration" {{
                                    $general->registration ?
                                'checked' : null }}>
                                <span class="slider round"></span>
                            </label>
                        </div>
                        <div class="form-group col-md-2 col-sm-6 mb-4">
                            <label class="fw-bold">@lang('Email Verification')</label>
                            <label class="switch m-0">
                                <input type="checkbox" class="toggle-switch" name="ev" {{ $general->ev ?
                                'checked' : null }}>
                                <span class="slider round"></span>
                            </label>
                        </div>
                        <div class="form-group col-md-2 col-sm-6 mb-4">
                            <label class="fw-bold">@lang('Email Notification')</label>
                            <label class="switch m-0">
                                <input type="checkbox" class="toggle-switch" name="en" {{ $general->en ?
                                'checked' : null }}>
                                <span class="slider round"></span>
                            </label>
                        </div>
                        <div class="form-group col-md-2 col-sm-6 mb-4">
                            <label class="fw-bold">@lang('Mobile Verification')</label>
                            <label class="switch m-0">
                                <input type="checkbox" class="toggle-switch" name="sv" {{ $general->sv ?
                                'checked' : null }}>
                                <span class="slider round"></span>
                            </label>
                        </div>
                        <div class="form-group col-md-2 col-sm-6 mb-4">
                            <label class="fw-bold">@lang('SMS Notification')</label>
                            <label class="switch m-0">
                                <input type="checkbox" class="toggle-switch" name="sn" {{ $general->sn ?
                                'checked' : null }}>
                                <span class="slider round"></span>
                            </label>
                        </div>
                        <div class="form-group col-md-2 col-sm-6 mb-4">
                            <label class="fw-bold">@lang('Terms & Condition')</label>
                            <label class="switch m-0">
                                <input type="checkbox" class="toggle-switch" name="agree" {{ $general->agree ?
                                'checked' : null }}>
                                <span class="slider round"></span>
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col text-end">
                            <button type="submit" class="btn btn--primary btn-global">@lang('Save')</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script-lib')
<script src="{{ asset('assets/admin/js/spectrum.js') }}"></script>
@endpush

@push('style-lib')
<link rel="stylesheet" href="{{ asset('assets/admin/css/spectrum.css') }}">
@endpush

@push('script')
<script>
    (function ($) {
        "use strict";
        $('.colorPicker').spectrum({
            color: $(this).data('color'),
            change: function (color) {
                $(this).parent().siblings('.colorCode').val(color.toHexString().replace(/^#?/, ''));
            }
        });

        $('.colorCode').on('input', function () {
            var clr = $(this).val();
            $(this).parents('.input-group').find('.colorPicker').spectrum({
                color: clr,
            });
        });

        $('select[name=timezone]').val("'{{ config('app.timezone') }}'").select2();
        $('.select2-basic').select2({
            dropdownParent: $('.card-body')
        });
    })(jQuery);

</script>
@endpush
