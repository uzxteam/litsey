@extends('admin.layouts.app')
@section('panel')

<div class="row gy-4">
    <div class="col-xxl-6">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-md-5 mb-4 border-bottom pb-2">@lang('Profile Information')</h5>

                <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="image-upload">
                                    <div class="thumb">
                                        <div class="avatar-preview">
                                            <div class="profilePicPreview"
                                                style="background-image: url({{ getImage(getFilePath('adminProfile').'/'.$admin->image,getFileSize('adminProfile')) }})">
                                                <button type="button" class="remove-image"><i
                                                        class="fa fa-times"></i></button>
                                            </div>
                                        </div>
                                        <div class="avatar-edit">
                                            <input type="file" class="profilePicUpload" name="image"
                                                id="profilePicUpload1" accept=".png, .jpg, .jpeg">
                                            <small class="mt-2">@lang('400x400 is recommended')</small>
                                            <label for="profilePicUpload1"
                                                class="btn bg--primary text-white">@lang('Upload
                                                Image')</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-8 d-flex justify-content-between flex-column">
                            <div>
                                <div class="form-group ">
                                    <label>@lang('Name')</label>
                                    <input class="form-control" type="text" name="name" value="{{ $admin->name }}"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label>@lang('Email')</label>
                                    <input class="form-control" type="email" name="email" value="{{ $admin->email }}"
                                        required>
                                </div>
                            </div>
                            <div class="card-footer text-end">
                                <button type="submit" class="btn btn--primary btn-global">@lang('Save')</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-xxl-6">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-50 border-bottom pb-2">@lang('Change Password')</h5>

                <form action="{{ route('admin.password.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label>@lang('Password')</label>
                        <input class="form-control" type="password" name="old_password" required>
                    </div>

                    <div class="form-group">
                        <label>@lang('New Password')</label>
                        <input class="form-control" type="password" name="password" required>
                    </div>

                    <div class="form-group">
                        <label>@lang('Confirm Password')</label>
                        <input class="form-control" type="password" name="password_confirmation" required>
                    </div>

                    <button type="submit" class="btn btn--primary btn-global float-end">@lang('Change
                        Password')</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection