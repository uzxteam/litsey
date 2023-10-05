@extends('admin.layouts.app')

@section('panel')
<div class="row">

    <div class="col-xl-12">
        <div class="card">
            <form action="{{ route('admin.subscriber.send.email') }}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label class="fw-bold">@lang('Subject')</label>
                            <input type="text" class="form-control" name="subject" required
                                value="{{ old('subject') }}" />
                        </div>
                        <div class="form-group col-md-12">
                            <label class="fw-bold">@lang('Body')</label>
                            <textarea name="body" rows="10" class="form-control trumEdit">{{ old('body') }}</textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col text-end">
                            <button type="submit" class="btn btn--primary btn-global">@lang('Send Email')</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('breadcrumb-plugins')
<a href="{{ route('admin.subscriber.index') }}" class="btn btn-sm btn--primary"><i class="las la-undo"></i>
    @lang('Back')</a>
@endpush