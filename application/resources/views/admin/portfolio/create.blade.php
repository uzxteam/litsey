@extends('admin.layouts.app')
@section('panel')

<div class="row mb-none-30">
    <div class="col-lg-12 mb-30">
        <div class="card">
            <div class="card-body">
                <form action="{{route('admin.portfolio.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="title" class="font-weight-bold">@lang('Title')</label>
                                <input type="text" name="title" id="title" value="{{old('title')}}"
                                    class="form-control " placeholder="@lang('Title')"
                                    required>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="sub_title" class="font-weight-bold">@lang('Sub Title')</label>
                                <input type="text" name="sub_title" id="sub_title" value="{{old('Sub_title')}}"
                                    class="form-control " placeholder="@lang('Sub Title')"
                                    required>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="image" class="font-weight-bold">@lang('Image')(416x417)</label>
                                <div class="file-upload-wrapper" data-text="Select your image!">
                                    <input type="file" name="image" id="image" class="file-upload-field" required>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="type" class="font-weight-bold">@lang('Description')</label>
                                <textarea class="trumEdit" name="description"
                                placeholder="@lang('Description')" id="description" cols="40"
                                rows="10"></textarea>
                            </div>
                        </div>
                        <div class="row text-end">
                            <div class="col-lg-12 ">
                                <div class="form-group float-end p-3">
                                    <button type="submit" class="btn btn--primary btn-block btn-lg"> @lang('Create')</button>
                                </div>
                            </div>
                        </div>
                 </div>
            </form>
        </div>
    </div>
</div>

@endsection

@push('breadcrumb-plugins')
<a href="{{route('admin.portfolio.index')}}" class="btn btn-sm btn--primary box--shadow1 text--small"><i
        class="las la-angle-double-left"></i>@lang('Go Back')</a>
@endpush


@push('style')
<style>
    .ck-placeholder{
        height: 190px !important;
    }
</style>
@endpush




