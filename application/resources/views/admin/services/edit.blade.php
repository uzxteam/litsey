@extends('admin.layouts.app')
@section('panel')

<div class="row mb-none-30">
    <div class="col-lg-12 mb-30">
        <div class="card">
            <div class="card-body">
                <form id="productCreateForm" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{$service->id}}">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="title" class="font-weight-bold">@lang('Title')</label>
                                <input type="text" name="title" id="title" value="{{$service->title}}"
                                    class="form-control" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="price" class="font-weight-bold">@lang('Price')</label>
                                <input step="any" type="number" name="price" id="price" value="{{$service->price}}"
                                    class="form-control " placeholder="@lang('Price')"
                                    required>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="icon" class="font-weight-bold">@lang('Icon')</label>
                                <div class="input-group">
                                    <input type="text" class="form-control iconPicker icon" autocomplete="off"
                                        name="icon" value="{{$service->icon}}" required>
                                    <span class="input-group-text  input-group-addon" data-icon="las la-home"
                                        role="iconpicker">@php echo $service->icon @endphp</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="file" class="font-weight-bold">@lang('File-Compressed') <span class="text-danger">@lang('upto 200 mb')</span></label>
                                <div class="file-upload-wrapper" data-text="Select your file!">
                                    <input type="file" name="file" id="file" class="file-upload-field">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="type" class="font-weight-bold">@lang('Description')</label>
                                <textarea class="trumEdit" name="description"
                                placeholder="@lang('Description')" id="new_pass"  cols="40"
                                rows="10">@php echo $service->description; @endphp</textarea>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <label class="fw-bold">@lang('Status')</label>
                            <label class="switch m-0">
                                <input type="checkbox" class="toggle-switch" name="status" {{ $service->status ?
                                'checked' : null }}>
                                <span class="slider round"></span>
                            </label>
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
            <div id="loadingSpinnerWrapper">
                <div id="loadingSpinner"></div>
                <div id="spinnerPercentage">0%</div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('breadcrumb-plugins')
<a href="{{route('admin.service.index')}}" class="btn btn-sm btn--primary box--shadow1 text--small"><i
        class="las la-angle-double-left"></i>@lang('Go Back')</a>
@endpush


@push('style-lib')
<link href="{{ asset('assets/admin/css/fontawesome-iconpicker.min.css') }}" rel="stylesheet">
@endpush

@push('style')
<style>
    .ck.ck-editor__main>.ck-editor__editable {
    min-height: 131px;
    }

    #loadingSpinnerWrapper {
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    display: none;
    justify-content: center;
    align-items: center;
    background-color: rgba(0, 0, 0, 0.5);
    z-index: 9999;
    width: 100%;
    height: 100vh;
}


#loadingSpinner {
    position: relative;
    width: 60px;
    height: 60px;
    border: 4px solid #f3f3f3;
    border-top: 4px solid #3498db;
    border-radius: 50%;
    animation: spin 2s linear infinite;
    z-index: 999999;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}


    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }

   #spinnerPercentage {
    position: absolute;
    top: 52%;
    left: 51%;
    font-size: 14px;
    color: white;
}
</style>
@endpush

@push('script')
<script src="{{ asset('assets/admin/js/fontawesome-iconpicker.js') }}"></script>
<script>
      (function($){
        "use strict";

        $('.iconPicker').iconpicker().on('iconpickerSelected', function (e) {
            $(this).closest('.form-group').find('.iconpicker-input').val(`<i class="${e.iconpickerValue}"></i>`);
        });

        // prodduct update
        $('#productCreateForm').submit(function(e) {
            e.preventDefault();

            var formData = new FormData(this);

            var loadingSpinnerWrapper = $('#loadingSpinnerWrapper');
            var loadingSpinner = $('#loadingSpinner');
            var spinnerPercentage = $('#spinnerPercentage');

            loadingSpinnerWrapper.fadeIn();
            loadingSpinner.css('opacity', '1');

            var xhr = new XMLHttpRequest();

              xhr.upload.addEventListener("progress", function(event) {
                if (event.lengthComputable) {
                    var progress = Math.round((event.loaded / event.total) * 100);
                    spinnerPercentage.text(progress + '%');
                }
            });

            xhr.open("POST", "{{route('admin.service.update')}}");

            // Success
            xhr.onload = function() {
                if (xhr.status === 200) {
                    var response = JSON.parse(xhr.responseText);
                    if (response.hasOwnProperty('message')) {
                        Toast.fire({
                            icon: 'success',
                            title: response.message
                        });
                    }

                   loadingSpinnerWrapper.fadeOut();

                    // redirect checkout page
                    window.location.href = '{{ route("admin.service.index") }}';

                }else if (xhr.status === 422) {

                    loadingSpinnerWrapper.fadeOut();
                    spinnerPercentage.text('0%').fadeOut();

                    var response = JSON.parse(xhr.responseText);
                    if (response.hasOwnProperty('errors')) {
                        var errors = response.errors;
                        var errorMessage = '';

                        Object.keys(errors).forEach(function (key) {
                            errorMessage = errors[key][0];
                        });

                        Toast.fire({
                            icon: 'error',
                            title: errorMessage
                        });
                    }
                }
                 else {

                    if (xhr.status === 500) {
                        loadingSpinnerWrapper.fadeOut();
                        spinnerPercentage.text('0%').fadeOut();
                            errorMessage = 'Service could not be update. Please try again later.';

                            Toast.fire({
                            icon: 'error',
                            title: errorMessage
                        });
                    }else{
                        loadingSpinnerWrapper.fadeOut();
                        spinnerPercentage.text('0%').fadeOut();
                        var errorMessage = 'Service could not be update. Please try again later.';
                        Toast.fire({
                            icon: 'error',
                            title: errorMessage
                        });
                    }
                }
            };

            // Error
            xhr.onerror = function() {

                loadingSpinnerWrapper.fadeOut();
                spinnerPercentage.text('0%').fadeOut();

                var errorMessage = 'An error occurred during the request. Please try again later.';
                Toast.fire({
                    icon: 'error',
                    title: errorMessage
                });
            };

            xhr.send(formData);
        });


    })(jQuery);
</script>
@endpush


