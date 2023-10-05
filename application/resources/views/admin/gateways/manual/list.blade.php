@extends('admin.layouts.app')
@section('panel')
@include('admin.components.tabs.gateway')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body p-0">
                <div class="table-responsive--sm table-responsive">
                    <table class="table table--light style--two custom-data-table">
                        <thead>
                            <tr>
                                <th>@lang('Gateway')</th>
                                <th>@lang('Status')</th>
                                <th>@lang('Action')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($gateways as $gateway)
                            <tr>
                                <td>{{__($gateway->name)}}</td>

                                <td>
                                    @if($gateway->status == 1)
                                    <span
                                        class="text--small badge font-weight-normal badge--success">@lang('Enabled')</span>
                                    @else
                                    <span
                                        class="text--small badge font-weight-normal badge--warning">@lang('Disabled')</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="button--group">
                                        <a title="@lang('Edit')"
                                            href="{{ route('admin.gateway.manual.edit', $gateway->alias) }}"
                                            class="btn btn-sm btn--primary editGatewayBtn">
                                            <i class="la la-pencil"></i>
                                        </a>

                                        @if($gateway->status == 0)
                                        <button title="@lang('Enable')" class="btn btn-sm btn--success confirmationBtn"
                                            data-question="@lang('Are you sure to enable this gateway?')"
                                            data-action="{{ route('admin.gateway.manual.activate',$gateway->code) }}">
                                            <i class="la la-check-circle"></i>
                                        </button>
                                        @else
                                        <button title="@lang('Disable')" class="btn btn-sm btn--danger confirmationBtn"
                                            data-question="@lang('Are you sure to disable this gateway?')"
                                            data-action="{{ route('admin.gateway.manual.deactivate',$gateway->code) }}">
                                            <i class="la la-eye-slash"></i>
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
<x-confirmation-modal></x-confirmation-modal>
@endsection


@push('breadcrumb-plugins')
<div class="d-flex flex-wrap justify-content-end">
    <a class="btn btn--primary me-2 d-flex align-items-center" href="{{ route('admin.gateway.manual.create') }}"><i
            class="las la-plus"></i>@lang('Add New')</a>
    <div class="d-inline">
        <div class="input-group justify-content-end">
            <input type="text" name="search_table" class="form-control bg--white" placeholder="@lang('Search')...">
            <button class="btn btn--primary input-group-text"><i class="fa fa-search"></i></button>
        </div>
    </div>
</div>
@endpush