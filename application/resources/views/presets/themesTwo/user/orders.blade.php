@extends($activeTemplate.'layouts.master')
@section('content')

<!-- ==================== Card Start Here ==================== -->
<div class="col-xl-9 col-lg-12">
    <div class="dashboard-body">
        <div class="row gy-4 justify-content-center">
            <div class="contactus-form">
                <h4>{{__($pageTitle)}}</h4>
                <div class="card-wrap pb-30">
                    <table class="table table--responsive--lg">
                        <thead>
                            <tr>
                                <th>@lang('Order Date')</th>
                                <th>@lang('Order Number')</th>
                                <th>@lang('Service Name')</th>
                                <th>@lang('File')</th>
                                <th>@lang('Amount')</th>
                                <th>@lang('Status')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($orders as $order)
                            <tr>
                                <td data-label="Order Date">{{ showDateTime($order->created_at)}}</td>
                                <td data-label="Order Number" class="fw-bold">#{{__($order->order_number)}}</td>

                                @if(isset($order->service))
                                    <td data-label="Service Name">{{__(@$order->service->title)}}</td>
                                    @if($order->status == 1 && isset($order->service->file) )
                                        <td data-label="File"> <a class="btn btn--base btn--sm" href="{{ route('user.service.file.download',@$order->service->id) }}" title="File Download"><i class="fas fa-download"></i> @lang('File')</a></td>
                                    @else
                                        <td data-label="File">@lang('File not available')</td>
                                    @endif
                                @else
                                    <td data-label="Service Name">@lang('Service Unavailable')</td>
                                    <td data-label="File">@lang('Service Unavailable')</td>
                                @endif

                                <td data-label="Amount">{{__($general->cur_sym)}} {{showAmount(__($order->service_price))}} </td>
                                <td data-label="Status">@php echo $order->statusBadge($order->status) @endphp </td>
                            </tr>
                            @empty
                            <tr>
                                <td class="text-muted text-center" colspan="100%" data-label="Order Table">{{ __($emptyMessage) }}</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            </div>
            @if ($orders->hasPages())
            <div class="d-flex justify-content-end">
                {{ paginateLinks($orders) }}
            </div>
            @endif
        </div>
    </div>
</section>
<!-- ==================== Card End Here ==================== -->
@endsection

