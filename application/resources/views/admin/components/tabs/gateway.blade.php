<div class="row">
    <div class="col">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link {{ Request::routeIs('admin.gateway.automatic.index') ? 'active' : '' }}"
                    href="{{route('admin.gateway.automatic.index')}}">@lang('Automatic Gateways')</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::routeIs('admin.gateway.manual.index') ? 'active' : '' }}"
                    href="{{route('admin.gateway.manual.index')}}">@lang('Manual Gateways')</a>
            </li>
        </ul>
    </div>
</div>