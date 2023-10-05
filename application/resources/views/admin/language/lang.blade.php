@extends('admin.layouts.app')
@section('panel')
<div class="row">
    <div class="col-lg-12">
        <div class="card b-radius--10 ">
            <div class="card-body p-0">
                <div class="table-responsive--sm table-responsive">
                    <table class="table table--light style--two custom-data-table">
                        <thead>
                            <tr>
                                <th>@lang('Name')</th>
                                <th>@lang('Code')</th>
                                <th>@lang('Default')</th>
                                <th>@lang('Actions')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($languages as $item)
                            <tr>
                                <td>{{__($item->name)}}</td>
                                <td><strong>{{ __($item->code) }}</strong></td>
                                <td>
                                    @if($item->is_default == 1)
                                    <span
                                        class="text--small badge font-weight-normal badge--success">@lang('Default')</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="button--group">
                                        <a title="@lang('Translate')" href="{{route('admin.language.key', $item->id)}}"
                                            class="btn btn-sm btn--success">
                                            <i class="la la-language"></i>
                                        </a>
                                        <a title="@lang('Edit')" href="javascript:void(0)"
                                            class="btn btn-sm btn--primary ms-1 editBtn"
                                            data-url="{{ route('admin.language.manage.update', $item->id)}}"
                                            data-lang="{{ json_encode($item->only('name', 'text_align', 'is_default')) }}">
                                            <i class="la la-pen"></i>
                                        </a>
                                        @if($item->id != 1)
                                        <button title="@lang('Edit')" class="btn btn-sm btn--danger confirmationBtn"
                                            data-question="@lang('Are you sure to remove this language from this system?')"
                                            data-action="{{ route('admin.language.manage.delete', $item->id) }}">
                                            <i class="la la-trash"></i>
                                        </button>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td class="text-muted text-center" colspan="100%">{{ __($emptyMessage) }}</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table><!-- table end -->
                </div>
            </div>
        </div><!-- card end -->
    </div>
</div>



{{-- NEW MODAL --}}
<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="createModalLabel"> @lang('Add New Language')</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><i
                        class="las la-times"></i></button>
            </div>
            <form class="form-horizontal" method="post" action="{{ route('admin.language.manage.store')}}">
                @csrf
                <div class="modal-body">
                    <div class="row form-group">
                        <label>@lang('Language Name')</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" value="{{ old('name') }}" name="name" required>
                        </div>
                    </div>

                    <div class="row form-group">
                        <label>@lang('Language Code')</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" value="{{ old('code') }}" name="code" required>
                        </div>
                    </div>

                    <div class="row form-group">
                        <label>@lang('Default Language')</label>
                        <div class="col-sm-12">
                            <select name="is_default" id="setDefault" class="form-control">
                                <option value="1">Default</option>
                                <option value="0">Not Default</option>
                            </select>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn--primary btn-global" id="btn-save"
                        value="add">@lang('Save')</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- EDIT MODAL --}}
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="editModalLabel">@lang('Edit Language')</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><i
                        class="las la-times"></i></button>
            </div>
            <form method="post">
                @csrf
                <div class="modal-body">

                    <div class="form-group">
                        <label>@lang('Language Name')</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" value="{{ old('name') }}" name="name" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>@lang('Default Language')</label>
                        <div class="col-sm-12">
                            <select name="is_default" id="setDefault" class="form-control">
                                <option value="1">Default</option>
                                <option value="0">Not Default</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn--primary btn-global" id="btn-save"
                        value="add">@lang('Save')</button>
                </div>
            </form>
        </div>
    </div>
</div>

<x-confirmation-modal></x-confirmation-modal>
@endsection


@push('breadcrumb-plugins')
<a class="btn btn-sm btn--primary" data-bs-toggle="modal" data-bs-target="#createModal"><i
        class="las la-plus"></i>@lang('Add New')</a>
@endpush

@push('script')
<script>
    (function ($) {
        "use strict";
        $('.editBtn').on('click', function () {
            var modal = $('#editModal');
            var url = $(this).data('url');
            var lang = $(this).data('lang');

            modal.find('form').attr('action', url);
            modal.find('input[name=name]').val(lang.name);
            modal.find('select[name=text_align]').val(lang.text_align);
            if (lang.is_default == 1) {
                console.log("default");
                modal.find('.modal-body #setDefault').val(1);
            } else {
                modal.find('.modal-body #setDefault').val(0);
            }
            modal.modal('show');
        });
    })(jQuery);
</script>
@endpush
