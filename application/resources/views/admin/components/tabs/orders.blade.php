<div class="row">
    <div class="col">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link {{ Request::routeIs('admin.service.approved.orders') ? 'active' : '' }}"
                    href="{{route('admin.service.approved.orders')}}">@lang('Approved')
                    @if($approvedOrders)
                    <span class="badge rounded-pill bg--white text-muted">{{$approvedOrders}}</span>
                    @endif
                </a>

            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::routeIs('admin.service.pending.orders') ? 'active' : '' }}"
                    href="{{route('admin.service.pending.orders')}}">@lang('Pending')
                    @if($pendingOrders)
                    <span class="badge rounded-pill bg--white text-muted">{{$pendingOrders}}</span>
                    @endif
                </a>
            </li>
        </ul>
    </div>
</div>
