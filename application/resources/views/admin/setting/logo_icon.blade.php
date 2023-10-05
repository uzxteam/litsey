@extends('admin.layouts.app')
@section('panel')
<div class="row mb-none-30">
    <div class="col-md-12 mb-30">
        <form action="" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card overflow-hidden">
                <div class="card-body">
                    <div class="row my-3 mx-1 border p-3">
                        <div class="col-md-4 d-flex flex-column justify-content-center">
                            <label>@lang('Logo')</label>
                            <div class="file-upload-wrapper" data-text="@lang('Select your file!')">
                                <input type="file" accept=".png, .jpg, .jpeg" name="logo" class="file-upload-field" />
                            </div>
                        </div>
                        <div class="col-md-4 d-flex align-items-center justify-content-center bg--dark">
                            <img src=" {{ getImage(getFilePath('logoIcon').'/logo.png', '?'
                                    .time()) }}" alt="{{config('app.name')}}">
                        </div>
                        <div class="col-md-4 d-flex align-items-center justify-content-center bg--gray">
                            <img src=" {{ getImage(getFilePath('logoIcon').'/logo.png', '?'
                                    .time()) }}" alt="{{config('app.name')}}">
                        </div>
                    </div>

                    {{-- dark logo --}}
                    <div class="row my-3 mx-1 border p-3">
                        <div class="col-md-4 d-flex flex-column justify-content-center">
                            <label>@lang('Logo White')</label>
                            <div class="file-upload-wrapper" data-text="@lang('Select your file!')">
                                <input type="file" accept=".png, .jpg, .jpeg" name="logo_white" class="file-upload-field" />
                            </div>
                        </div>
                        <div class="col-md-4 d-flex align-items-center justify-content-center bg--dark">
                            <img src="{{ getImage(getFilePath('logoIcon').'/logo_white.png', '?'
                                    .time()) }}" alt="{{config('app.name')}}">
                        </div>
                        <div class="col-md-4 d-flex align-items-center justify-content-center bg--gray">
                            <img src="{{ getImage(getFilePath('logoIcon').'/logo_white.png', '?'
                                    .time()) }}" alt="{{config('app.name')}}">
                        </div>
                    </div>
                    {{-- end dark logo --}}
                    <div class="row my-3 mx-1 border p-3">
                        <div class="col-4 d-flex flex-column justify-content-center">
                            <label>@lang('Favicon')</label>
                            <div class="file-upload-wrapper" data-text="@lang('Select your file!')">
                                <input type="file" accept=".png, .jpg, .jpeg" name="favicon"
                                    class="file-upload-field" />
                            </div>
                        </div>
                        <div class="col-8 d-flex align-items-center justify-content-center"">
                                                <img src=" {{ getImage(getFilePath('logoIcon') .'/favicon.png', '?'
                            .time()) }}" alt="{{config('app.name')}}" width="70">
                        </div>
                    </div>
                    <div class="form-group mb-0 text-end">
                        <button type="submit" class="btn bg--primary btn-global">@lang('Save')</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
