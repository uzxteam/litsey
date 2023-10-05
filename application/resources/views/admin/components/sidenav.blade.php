<div class="sidebar">
    <button class="res-sidebar-close-btn"><i class="las la-times"></i></button>
    <div class="sidebar__inner">
        <div class="sidebar__logo">
            <a href="{{route('admin.dashboard')}}" class="sidebar__main-logo"><img
                    src="{{getImage(getFilePath('logoIcon') .'/logo.png')}}" alt="@lang('image')"></a>
        </div>

        <div class="" id="sidebar__menuWrapper">
            <ul class="sidebar__menu">
                <li class="sidebar-menu-item {{menuActive('admin.dashboard')}}">
                    <a href="{{route('admin.dashboard')}}" class="nav-link ">
                        <i class="menu-icon las la-chart-line"></i>
                        <span class="menu-title">@lang('Dashboard')</span>
                    </a>
                </li>
                


               


    
    <li class="sidebar-menu-item {{menuActive(['admin.report.login.history','admin.report.login.ipHistory'])}}">
        <a href="{{route('admin.report.login.history')}}" class="nav-link">
            <i class="menu-icon las la-sign-in-alt"></i>
            <span class="menu-title">@lang('Kirish tarixi')</span>
        </a>
    </li>
    <li class="sidebar-menu-item {{menuActive('admin.report.notification.history')}}">
        <a href="{{route('admin.report.notification.history')}}" class="nav-link">
            <i class="menu-icon las la-bell"></i>
            <span class="menu-title">@lang('Bildirishnomalar')</span>
        </a>
    </li>
   
<li class="sidebar__menu-header">@lang('Kontent boshqaruvi')</li>

<li class="sidebar-menu-item {{menuActive('admin.frontend.templates')}}">
    <a href="{{route('admin.frontend.templates')}}" class="nav-link ">
        <i class="menu-icon la la-html5"></i>
        <span class="menu-title">@lang('Mavzular')</span>
    </a>
</li>

<li class="sidebar-menu-item {{menuActive('admin.frontend.manage.*')}}">
    <a href="{{route('admin.frontend.manage.pages')}}" class="nav-link ">
        <i class="menu-icon la la-pager"></i>
        <span class="menu-title">@lang('Sahifalar')</span>
    </a>
</li>

<li class="sidebar-menu-item sidebar-dropdown">
    <a href="javascript:void(0)" class="{{menuActive('admin.frontend.sections*',3)}}">
        <i class="menu-icon la la-grip-horizontal"></i>
        <span class="menu-title">@lang('Bo`limlar')</span>
    </a>
    <div class="sidebar-submenu {{menuActive('admin.frontend.sections*',2)}} ">
        <ul>
            @php
            $lastSegment = collect(request()->segments())->last();
            @endphp
            @foreach(getPageSections(true) as $k => $secs)
            @if($secs['builder'])
            <li class="sidebar-menu-item  @if($lastSegment == $k) active @endif ">
                <a href="{{ route('admin.frontend.sections',$k) }}" class="nav-link">
                    <i class="menu-icon las la-caret-right"></i>
                    <span class="menu-title">{{__($secs['name'])}}</span>
                </a>
            </li>
            @endif
            @endforeach
        </ul>
    </div>
</li>
<li class="sidebar__menu-header">@lang('Umumiy sozlamalar')</li>

<li class="sidebar-menu-item {{menuActive('admin.setting.index')}}">
    <a href="{{route('admin.setting.index')}}" class="nav-link">
        <i class="menu-icon las la-globe"></i>
        <span class="menu-title">@lang('Umumiy sozlamalar')</span>
    </a>
</li>
<li class="sidebar-menu-item {{menuActive('admin.setting.logo.icon')}}">
    <a href="{{route('admin.setting.logo.icon')}}" class="nav-link">
        <i class="menu-icon las la-image"></i>
        <span class="menu-title">@lang('Logo & Favicon')</span>
    </a>
</li>
<li class="sidebar-menu-item  {{menuActive(['admin.language.manage','admin.language.key'])}}">
    <a href="{{route('admin.language.manage')}}" class="nav-link"
        data-default-url="{{ route('admin.language.manage') }}">
        <i class="menu-icon las la-language"></i>
        <span class="menu-title">@lang('Til sozlamalri') </span>
    </a>
</li>
<li class="sidebar-menu-item sidebar-dropdown">
    <a href="javascript:void(0)" class="{{menuActive('admin.setting.notification*',3)}}">
        <i class="menu-icon las la-bell"></i>
        <span class="menu-title">@lang('Bildirishnomalar')</span>
    </a>
    <div class="sidebar-submenu {{menuActive('admin.setting.notification*',2)}} ">
        <ul>
            <li class="sidebar-menu-item {{menuActive('admin.setting.notification.templates')}} ">
                <a href="{{route('admin.setting.notification.templates')}}" class="nav-link">
                    <i class="menu-icon las la-caret-right"></i>
                    <span class="menu-title">@lang('Barcha shablonlar')</span>
                </a>
            </li>
            <li class="sidebar-menu-item {{menuActive('admin.setting.notification.global')}} ">
                <a href="{{route('admin.setting.notification.global')}}" class="nav-link">
                    <i class="menu-icon las la-caret-right"></i>
                    <span class="menu-title">@lang('Global shablon')</span>
                </a>
            </li>
            <li class="sidebar-menu-item {{menuActive('admin.setting.notification.email')}} ">
                <a href="{{route('admin.setting.notification.email')}}" class="nav-link">
                    <i class="menu-icon las la-caret-right"></i>
                    <span class="menu-title">@lang('Email Config')</span>
                </a>
            </li>
            <li class="sidebar-menu-item {{menuActive('admin.setting.notification.sms')}} ">
                <a href="{{route('admin.setting.notification.sms')}}" class="nav-link">
                    <i class="menu-icon las la-caret-right"></i>
                    <span class="menu-title">@lang('SMS Config')</span>
                </a>
            </li>
        </ul>
    </div>
</li>
<li class="sidebar-menu-item {{menuActive('admin.extensions.index')}}">
    <a href="{{route('admin.extensions.index')}}" class="nav-link">
        <i class="menu-icon las la-cogs"></i>
        <span class="menu-title">@lang('Plugins')</span>
    </a>
</li>
<li class="sidebar-menu-item {{menuActive('admin.seo')}}">
    <a href="{{route('admin.seo')}}" class="nav-link">
        <i class="menu-icon las la-project-diagram"></i>
        <span class="menu-title">@lang('SEO')</span>
    </a>
</li>
<li class="sidebar-menu-item {{menuActive('admin.setting.cookie')}}">
    <a href="{{route('admin.setting.cookie')}}" class="nav-link">
        <i class="menu-icon las la-check-circle"></i>
        <span class="menu-title">@lang('GDPR Policy')</span>
    </a>
</li>
</ul>
</div>
</div>
</div>
<!-- sidebar end -->

@push('script')
<script>
    if ($('li').hasClass('active')) {
        $('#sidebar__menuWrapper').animate({
            scrollTop: eval($(".active").offset().top - 320)
        }, 500);
    }
</script>
@endpush
