@extends('admin.layouts.app')
@section('panel')
<div class="row">
  <div class="col-lg-12">
    <div class="card">
      <form action="" method="post">
        @csrf
        <div class="card-body">
          <div class="row">
            <div class="col-md-3">
              <div class="form-group">
                <label>@lang('Status')</label>
                <label class="switch m-0">
                  <input type="checkbox" class="toggle-switch" name="status" {{ $general->maintenance_mode ?
                  'checked' : null }}>
                  <span class="slider round"></span>
                </label>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label>@lang('Description')</label>
            <textarea class="form-control trumEdit" rows="10"
              name="description">@php echo @$maintenance->data_values->description @endphp</textarea>
          </div>
        </div>
        <div class="card-footer text-end">
          <button type="submit" class="btn btn--primary btn-global">@lang('Save')</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection