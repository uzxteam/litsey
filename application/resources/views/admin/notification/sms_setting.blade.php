@extends('admin.layouts.app')
@section('panel')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <form action="" method="POST">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label>@lang('Sms Send Method')</label>
                        <select name="sms_method" class="form-control">
                            <option value="nexmo" @if(@$general->sms_config->name == 'nexmo') selected
                                @endif>@lang('Nexmo')</option>
                            <option value="twilio" @if(@$general->sms_config->name == 'twilio') selected
                                @endif>@lang('Twilio')</option>
                            <option value="custom" @if(@$general->sms_config->name == 'custom') selected
                                @endif>@lang('Custom API')</option>
                        </select>
                    </div>
                    <div class="row mt-4 d-none configForm" id="clickatell">
                        <div class="col-md-12">
                            <h6 class="mb-2">@lang('Clickatell Configuration')</h6>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="fw-bold">@lang('API Key') </label>
                                <input type="text" class="form-control" placeholder="@lang('API Key')"
                                    name="clickatell_api_key"
                                    value="{{ @$general->sms_config->clickatell->api_key }}" />
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4 d-none configForm" id="nexmo">
                        <div class="col-md-12">
                            <h6 class="mb-2">@lang('Nexmo Configuration')</h6>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="fw-bold">@lang('API Key') </label>
                                <input type="text" class="form-control" placeholder="@lang('API Key')"
                                    name="nexmo_api_key" value="{{ @$general->sms_config->nexmo->api_key }}" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="fw-bold">@lang('API Secret') </label>
                                <input type="text" class="form-control" placeholder="@lang('API Secret')"
                                    name="nexmo_api_secret" value="{{ @$general->sms_config->nexmo->api_secret }}" />
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4 d-none configForm" id="twilio">
                        <div class="col-md-12">
                            <h6 class="mb-2">@lang('Twilio Configuration')</h6>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="fw-bold">@lang('Account SID') </label>
                                <input type="text" class="form-control" placeholder="@lang('Account SID')"
                                    name="account_sid" value="{{ @$general->sms_config->twilio->account_sid }}" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="fw-bold">@lang('Auth Token') </label>
                                <input type="text" class="form-control" placeholder="@lang('Auth Token')"
                                    name="auth_token" value="{{ @$general->sms_config->twilio->auth_token }}" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="fw-bold">@lang('From Number') </label>
                                <input type="text" class="form-control" placeholder="@lang('From Number')" name="from"
                                    value="{{ @$general->sms_config->twilio->from }}" />
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4 d-none configForm" id="custom">
                        <div class="col-md-12">
                            <h6 class="mb-2">@lang('Custom API')</h6>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="fw-bold">@lang('API URL') </label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <select name="custom_api_method" class="method-select">
                                            <option value="get">@lang('GET')</option>
                                            <option value="post">@lang('POST')</option>
                                        </select>
                                    </span>
                                    <input type="text" class="form-control" name="custom_api_url"
                                        value="{{ @$general->sms_config->custom->url }}"
                                        placeholder="@lang('API URL')" />
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive table-responsive--sm mb-3">
                                    <table class=" table align-items-center table--light">
                                        <thead>
                                            <tr>
                                                <th>@lang('Short Code') </th>
                                                <th>@lang('Description')</th>
                                            </tr>
                                        </thead>
                                        <tbody class="list">
                                            <tr>
                                                <td>@{{message}}</td>
                                                <td>@lang('Message')</td>
                                            </tr>
                                            <tr>
                                                <td>@{{number}}</td>
                                                <td>@lang('Number')</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card mb-3 dyna-card">
                                    <div class="card-header d-flex justify-content-between">
                                        <h5 class="">@lang('Headers')</h5>
                                        <button type="button" class="btn btn--primary btn-sm float-right addHeader"><i
                                                class="la la-fw la-plus"></i>@lang('Add') </button>
                                    </div>
                                    <div class="card-body">
                                        <div class="headerFields">
                                            @for($i = 0; $i < count($general->sms_config->custom->headers->name); $i++)
                                                <div class="row mt-3">
                                                    <div class="col-md-5">
                                                        <input type="text" name="custom_header_name[]"
                                                            class="form-control"
                                                            value="{{ @$general->sms_config->custom->headers->name[$i] }}"
                                                            placeholder="@lang('Headers Name')">
                                                    </div>
                                                    <div class="col-md-5">
                                                        <input type="text" name="custom_header_value[]"
                                                            class="form-control"
                                                            value="{{ @$general->sms_config->custom->headers->value[$i] }}"
                                                            placeholder="@lang('Headers Value')">
                                                    </div>
                                                    <div class="col-md-2">
                                                        <button type="button"
                                                            class="btn btn--danger btn-block removeHeader h-100"><i
                                                                class="las la-times"></i></button>
                                                    </div>
                                                </div>
                                                @endfor
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card mb-3 dyna-card">
                                    <div class="card-header d-flex justify-content-between">
                                        <h5 class="">@lang('Body')</h5>
                                        <button type="button" class="btn btn--primary btn-sm float-right addBody"><i
                                                class="la la-fw la-plus"></i>@lang('Add') </button>
                                    </div>
                                    <div class="card-body">
                                        <div class="bodyFields">
                                            @for($i = 0; $i < count($general->sms_config->custom->body->name); $i++)
                                                <div class="row mt-3">
                                                    <div class="col-md-5">
                                                        <input type="text" name="custom_body_name[]"
                                                            class="form-control"
                                                            value="{{ @$general->sms_config->custom->body->name[$i] }}"
                                                            placeholder="@lang('Body Name')">
                                                    </div>
                                                    <div class="col-md-5">
                                                        <input type="text" name="custom_body_value[]"
                                                            value="{{ @$general->sms_config->custom->body->value[$i] }}"
                                                            class="form-control" placeholder="@lang('Body Value')">
                                                    </div>
                                                    <div class="col-md-2">
                                                        <button type="button"
                                                            class="btn btn--danger btn-block removeBody h-100"><i
                                                                class="las la-times"></i></button>
                                                    </div>
                                                </div>
                                                @endfor
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-end">
                    <button type="submit" class="btn btn-global btn--primary">@lang('Save')</button>
                </div>
            </form>
        </div><!-- card end -->
    </div>
</div>


{{-- TEST MAIL MODAL --}}
<div id="testSMSModal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">@lang('Test SMS Setup')</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i class="las la-times"></i>
                </button>
            </div>
            <form action="{{ route('admin.setting.notification.sms.test') }}" method="POST">
                @csrf
                <input type="hidden" name="id">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>@lang('Sent to') </label>
                                <input type="text" name="mobile" class="form-control" placeholder="@lang('Mobile')">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn--primary btn-global">@lang('Send')</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@push('breadcrumb-plugins')
<button type="button" data-bs-target="#testSMSModal" data-bs-toggle="modal" class="btn btn--primary btn-sm">@lang('Test
    SMS')</button>
@endpush
@push('style')
<style>
    .method-select {
        padding: 2px 7px;
    }
</style>
@endpush
@push('script')
<script>
    (function ($) {
        "use strict";

        var method = '{{ @$general->sms_config->name }}';

        if (!method) {
            method = 'clickatell';
        }

        smsMethod(method);
        $('select[name=sms_method]').on('change', function () {
            var method = $(this).val();
            smsMethod(method);
        });

        function smsMethod(method) {
            $('.configForm').addClass('d-none');
            if (method != 'php') {
                $(`#${method}`).removeClass('d-none');
            }
        }

        $('.addHeader').on('click', function () {
            var html = `
                    <div class="row mt-3">
                        <div class="col-md-5">
                            <input type="text" name="custom_header_name[]" class="form-control" placeholder="@lang('Headers Name')">
                        </div>
                        <div class="col-md-5">
                            <input type="text" name="custom_header_value[]" class="form-control" placeholder="@lang('Headers Value')">
                        </div>
                        <div class="col-md-2">
                            <button type="button" class="btn btn--danger btn-block removeHeader h-100"><i class="las la-times"></i></button>
                        </div>
                    </div>
                `;
            $('.headerFields').append(html);

        })
        $(document).on('click', '.removeHeader', function () {
            $(this).closest('.row').remove();
        })

        $('.addBody').on('click', function () {
            var html = `
                    <div class="row mt-3">
                        <div class="col-md-5">
                            <input type="text" name="custom_body_name[]" class="form-control" placeholder="@lang('Body Name')">
                        </div>
                        <div class="col-md-5">
                            <input type="text" name="custom_body_value[]" class="form-control" placeholder="@lang('Body Value')">
                        </div>
                        <div class="col-md-2">
                            <button type="button" class="btn btn--danger btn-block removeBody h-100"><i class="las la-times"></i></button>
                        </div>
                    </div>
                `;
            $('.bodyFields').append(html);

        })
        $(document).on('click', '.removeBody', function () {
            $(this).closest('.row').remove();
        })

        $('select[name=custom_api_method]').val('{{ @$general->sms_config->custom->method }}');

    })(jQuery);

</script>
@endpush