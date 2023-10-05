@extends('admin.layouts.app')
@section('panel')
<div class="row">
    <div class="col-md-12">
        <div class="card overflow-hidden">
            <div class="card-body p-0">
                <div class="table-responsive table-responsive--sm">
                    <table class="table align-items-center table--light">
                        <thead>
                            <tr>
                                <th>@lang('Short Code')</th>
                                <th>@lang('Description')</th>
                            </tr>
                        </thead>
                        <tbody class="list">
                            @forelse($template->shortcodes as $shortcode => $key)
                            <tr>
                                <th><span class="short-codes">@php echo "{{". $shortcode ."}}" @endphp</span></th>
                                <td>{{ __($key) }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="100%" class="text-muted text-center">{{ __($emptyMessage) }}</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div><!-- card end -->

        <h6 class="mt-4 mb-2">@lang('Default Short Codes')</h6>
        <div class="card overflow-hidden">
            <div class="card-body p-0">
                <div class="table-responsive table-responsive--sm">
                    <table class=" table align-items-center table--light">
                        <thead>
                            <tr>
                                <th>@lang('Short Code') </th>
                                <th>@lang('Description')</th>
                            </tr>
                        </thead>
                        <tbody class="list">
                            @foreach($general->global_shortcodes as $shortCode => $codeDetails)
                            <tr>
                                <td><span class="short-codes">@{{@php echo $shortCode @endphp}}</span></td>
                                <td>{{ __($codeDetails) }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>

<form action="{{ route('admin.setting.notification.template.update',$template->id) }}" method="post">
    @csrf
    <div class="row">
        <div class="col-md-6">
            <div class="card mt-4">
                <div class="card-header bg--primary">
                    <h5 class="card-title text-white">@lang('Email Template')</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="fw-bold">@lang('Status')</label>
                                <label class="switch m-0">
                                    <input type="checkbox" class="toggle-switch" name="email_status" {{
                                        $template->email_status ?
                                    'checked' : null }}>
                                    <span class="slider round"></span>
                                </label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="fw-bold">@lang('Subject')</label>
                                <input type="text" class="form-control form-control-lg"
                                    placeholder="@lang('Email subject')" name="subject" value="{{ $template->subj }}"
                                    required />
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="fw-bold">@lang('Message') <span class="text-danger">*</span></label>
                                <textarea name="email_body" rows="10" class="form-control trumEdit"
                                    placeholder="@lang('Your message using short-codes')">{{ $template->email_body }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card mt-4">
                <div class="card-header bg--primary">
                    <h5 class="card-title text-white">@lang('SMS Template')</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="fw-bold">@lang('Status')</label>
                                <label class="switch m-0">
                                    <input type="checkbox" class="toggle-switch" name="sms_status" {{
                                        $template->sms_status ?
                                    'checked' : null }}>
                                    <span class="slider round"></span>
                                </label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="fw-bold">@lang('Message')</label>
                                <textarea name="sms_body" rows="10" class="form-control"
                                    placeholder="@lang('Your message using short-codes')"
                                    required>{{ $template->sms_body }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group text-end">
        <button type="submit" class="btn btn--primary btn-global mt-4">@lang('Save')</button>
    </div>
</form>
@endsection


@push('breadcrumb-plugins')
<a href="{{ route('admin.setting.notification.templates') }}" class="btn btn-sm btn--primary"><i
        class="las la-undo"></i> @lang('Back') </a>
@endpush