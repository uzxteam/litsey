@extends($activeTemplate.'layouts.master')
@section('content')
<div class="col-xl-9 col-lg-8">
    <div class="dashboard-body">
        <div class="row justify-content-center mt-4">
            <div  class="contactus-form">
            <div class="col-md-12">
                <div class="text-end">
                    <a href="{{route('ticket.open') }}" class="btn btn-sm btn--base mb-2"> <i class="fa fa-plus"></i> @lang('New Ticket')</a>
                </div>
                <div class="table-responsive">
                    <table class="table table--responsive--lg">
                        <thead>
                        <tr>
                            <th>@lang('Subject')</th>
                            <th>@lang('Status')</th>
                            <th>@lang('Priority')</th>
                            <th>@lang('Last Reply')</th>
                            <th>@lang('Action')</th>
                        </tr>
                        </thead>
                        <tbody>
                            @forelse($supports as $support)
                                <tr>
                                    <td data-label="@lang('Subject')"> <a href="{{ route('ticket.view', $support->ticket) }}" class="fw-bold"> [@lang('Ticket')#{{ $support->ticket }}] {{ __($support->subject) }} </a></td>
                                    <td data-label="@lang('Status')">
                                        @php echo $support->statusBadge; @endphp
                                    </td>
                                    <td data-label="@lang('Priority')">
                                        @if($support->priority == 1)
                                            <span class="badge bg-dark">@lang('Low')</span>
                                        @elseif($support->priority == 2)
                                            <span class="badge bg-success">@lang('Medium')</span>
                                        @elseif($support->priority == 3)
                                            <span class="badge bg-primary">@lang('High')</span>
                                        @endif
                                    </td>
                                    <td data-label="@lang('Last Reply')">{{ \Carbon\Carbon::parse($support->last_reply)->diffForHumans() }} </td>

                                    <td data-label="@lang('Action')">
                                        <a href="{{ route('ticket.view', $support->ticket) }}" class="btn btn--base btn-sm">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="100%" class="text-center">{{ __($emptyMessage) }}</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                {{$supports->links()}}

            </div>
        </div>
    </div>
    </div>
</div>
@endsection
