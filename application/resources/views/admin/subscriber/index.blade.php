@extends('admin.layouts.app')

@section('panel')
@include('admin.components.tabs.user')
<div class="row">

    <div class="col-lg-12">
        <div class="card b-radius--10 ">
            <div class="card-body p-0">
                <div class="table-responsive--sm table-responsive">
                    <table class="table table--light style--two">
                        <thead>
                            <tr>
                                <th>@lang('Email')</th>
                                <th>@lang('Subscribe At')</th>
                                <th>@lang('Action')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($subscribers as $subscriber)
                            <tr>
                                <td>{{ $subscriber->email }}</td>
                                <td>{{ showDateTime($subscriber->created_at) }}</td>
                                <td>
                                    <button title="@lang('Remove')" href="javascript:void(0)"
                                        class="btn btn-sm btn--danger confirmationBtn"
                                        data-question="@lang('Are you sure to remove this subscriber?')"
                                        data-action="{{ route('admin.subscriber.remove',$subscriber->id) }}">
                                        <i class="las la-trash"></i>
                                    </button>
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
            @if ($subscribers->hasPages())
            <div class="card-footer py-4">
                {{ paginateLinks($subscribers) }}
            </div>
            @endif
        </div><!-- card end -->
    </div>


</div>

<x-confirmation-modal></x-confirmation-modal>
@endsection

@push('breadcrumb-plugins')
<a href="{{ route('admin.subscriber.send.email') }}" class="btn btn-sm btn--primary">
    @lang('Send Email')</a>
@endpush