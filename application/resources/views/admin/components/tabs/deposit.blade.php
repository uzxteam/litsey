<div class="row">
    <div class="col">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link {{ Request::routeIs('admin.deposit.list') ? 'active' : '' }}"
                    href="{{route('admin.deposit.list')}}">@lang('All')
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::routeIs('admin.deposit.approved') ? 'active' : '' }}"
                    href="{{route('admin.deposit.approved')}}">@lang('Approved')
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::routeIs('admin.deposit.pending') ? 'active' : '' }}"
                    href="{{route('admin.deposit.pending')}}">@lang('Pending')
                    @if($pendingDepositsCount)
                    <span class="badge rounded-pill bg--white text-muted">{{$pendingDepositsCount}}</span>
                    @endif
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::routeIs('admin.deposit.successful') ? 'active' : '' }}"
                    href="{{route('admin.deposit.successful')}}">@lang('Successful')
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::routeIs('admin.deposit.rejected') ? 'active' : '' }}"
                    href="{{route('admin.deposit.rejected')}}">@lang('Rejected')
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::routeIs('admin.deposit.initiated') ? 'active' : '' }}"
                    href="{{route('admin.deposit.initiated')}}">@lang('Initiated')
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::routeIs('admin.gateway.automatic.index') ? 'active' : '' }}"
                    href="{{route('admin.gateway.automatic.index')}}">@lang('Payment Gateways')
                </a>
            </li>
        </ul>
    </div>
</div>