<div class="row">
    <div class="col">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link {{ Request::routeIs('admin.users.active') ? 'active' : '' }}"
                    href="{{route('admin.users.active')}}">@lang('Active')</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::routeIs('admin.users.banned') ? 'active' : '' }}"
                    href="{{route('admin.users.banned')}}">@lang('Banned')
                    @if($bannedUsersCount)
                    <span class="badge rounded-pill bg--white text-muted">{{$bannedUsersCount}}</span>
                    @endif
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::routeIs('admin.users.email.unverified') ? 'active' : '' }}"
                    href="{{route('admin.users.email.unverified')}}">@lang('Email Unverified')
                    @if($emailUnverifiedUsersCount)
                    <span class="badge rounded-pill bg--white text-muted">{{$emailUnverifiedUsersCount}}</span>
                    @endif
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::routeIs('admin.users.mobile.unverified') ? 'active' : '' }}"
                    href="{{route('admin.users.mobile.unverified')}}">@lang('Mobile Unverified')
                    @if($mobileUnverifiedUsersCount)
                    <span class="badge rounded-pill bg--white text-muted">{{$mobileUnverifiedUsersCount}}</span>
                    @endif
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::routeIs('admin.users.with.balance') ? 'active' : '' }}"
                    href="{{route('admin.users.with.balance')}}">@lang('With Balance')
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::routeIs('admin.users.all') ? 'active' : '' }}"
                    href="{{route('admin.users.all')}}">@lang('All Users')
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::routeIs('admin.subscriber.index') ? 'active' : '' }}"
                    href="{{route('admin.subscriber.index')}}">@lang('Subscribers')
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::routeIs('admin.users.notification.all') ? 'active' : '' }}"
                    href="{{route('admin.users.notification.all')}}">@lang('Notification to Users')
                </a>
            </li>
        </ul>
    </div>
</div>