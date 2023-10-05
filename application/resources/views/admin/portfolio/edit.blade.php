@extends('admin.layouts.app')
@section('panel')

<div class="row mb-none-30">
    <div class="col-lg-12 mb-30">
        <div class="card">
            <div class="card-body">
                <form action="{{route('admin.portfolio.update',$portfolio->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="title" class="font-weight-bold">@lang('Title')</label>
                                <input type="text" name="title" id="title" value="{{$portfolio->title}}"
                                    class="form-control"
                                    required>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="sub_title" class="font-weight-bold">@lang('Sub Title')</label>
                                <input type="text" name="sub_title" id="sub_title"value="{{$portfolio->sub_title}}"
                                    class="form-control"
                                    required>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="image" class="font-weight-bold">@lang('Image')(416x417)</label>
                                <div class="file-upload-wrapper" data-text="Select your image!">
                                    <input type="file" name="image" id="image" class="file-upload-field">
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="type" class="font-weight-bold">@lang('Description')</label>
                                <textarea class="trumEdit" name="description" id="description" cols="40"
                                rows="10"> @php echo $portfolio->description @endphp</textarea>
                            </div>
                        </div>
                        <div class="col-lg-2 mb-4">
                            <label class="fw-bold">@lang('Status')</label>
                            <label class="switch m-0">
                                <input type="checkbox" class="toggle-switch" name="status" {{ $portfolio->status ?
                                'checked' : null }}>
                                <span class="slider round"></span>
                            </label>
                        </div>

                        <div class="col-lg-12">
                                <h5 class="font-weight-bold">@lang('Old Image')</h5>
                                <img src="{{getImage(getFilePath('portfolioImage').'/'.$portfolio->image)}}" class="rounded" alt="portfolio"   style="width:150px;">
                        </div>
                        <div class="row text-end">
                            <div class="col-lg-12 ">
                                <div class="form-group float-end p-3">
                                    <button type="submit" class="btn btn--primary btn-block btn-lg"> @lang('Update')</button>
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




