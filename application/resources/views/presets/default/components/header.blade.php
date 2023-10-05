@php
$contact = getContent('contact_us.content',true);
$socialIcons = getContent('social_icon.element',false);
$languages = App\Models\Language::all();
$pages = App\Models\Page::where('tempname',$activeTemplate)->get();
@endphp
<!--========================== Header section Start ==========================-->
<div class="header-main-area">

    <div class="header-top">
        <div class="container-fluid">
            <div class="top-header-wrapper">
                <div class="top-contact">
                    <ul class="contact-list">
                        <li class="contact-list__item"> <span class="contact-list__item-icon"><i class="fas fa-phone"></i></span><a href="tel:{{$contact->data_values->contact_number}}" class="contact-list__link">{{__($contact->data_values->contact_number)}}</a></li>
                        <li class="contact-list__item"> <span class="contact-list__item-icon"><i class="fas fa-envelope"></i></span><a href="mailto:{{$contact->data_values->email_address}}" class="contact-list__link">{{__($contact->data_values->email_address)}}</a></li>
                    </ul>
                </div>
                <div class="top-button">
                    <div class="language-box">
                        <select class="langSel select">
                            @foreach($languages as $language)
                            <option value="{{ $language->code }}" @if(Session::get('lang')===$language->code)
                                selected @endif>{{ __($language->name) }}</option>
                            @endforeach
                        </select>
                    </div>
                    <ul class="login-registration-list d-flex flex-wrap justify-content-between align-items-center ms-2">
                        <li class="login-registration-list__item">
                            <ul class="social-list">
                                @foreach($socialIcons as $item)
                                <li class="social-list__item"><a href="{{ __($item->data_values->url)}}" class="social-list__link" target="_blank">@php echo $item->data_values->social_icon @endphp</a> </li>
                                @endforeach
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="header" id="header">
        <div class="container-fluid position-relative">
            <div class="row">
                <div class="header-wrapper">

                    <div class="logo-wrapper">

                            <a href="{{route('home')}}" class="normal-logo"> <img src="{{ getImage(getFilePath('logoIcon').'/logo.png', '?'
                                .time()) }}" alt="{{config('app.name')}}"></a>

                            <a href="{{route('home')}}" class="dark-logo hidden"  > <img src="{{ getImage(getFilePath('logoIcon').'/logo_white.png', '?'
                                    .time()) }}" alt="{{config('app.name')}}"></a>
                    </div>

                    <div class="menu-wrapper">
                        <ul class="main-menu">
                            @auth
                            <li>
                                <a class="nav-link {{ Route::is('user.home') ? 'active' : '' }}" aria-current="page" href="{{route('user.home')}}">@lang('Dashboard')</a>
                            </li>
                            @endauth
                            @foreach($pages as $page)
                            <li>
                                <a class="nav-link {{ Request::url() == url('/').'/'.$page->slug ? 'active' : '' }}" aria-current="page" href="{{route('pages',[$page->slug])}}">{{__($page->name)}}</a>
                            </li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="menu-right-wrapper">
                        <ul>
                            <li></li>
                            <li>
                                <div class="light-dark-btn-wrap ms-1" id="light-dark-checkbox">
                                    <i class="fas fa-moon mon-icon"></i>
                                    <i class='fas fa-sun sun-icon'></i>
                                </div>
                            </li>
                            @auth
                            <li><a class='btn btn--base' href="{{route('user.logout')}}"><i class="fas fa-sign-out-alt"></i> @lang('Logout')</a></li>

                            @else
                            <li><a class='btn btn--base' href="{{route('user.login')}}"><i class="fas fa-sign-in-alt"></i> @lang('Login')</a></li>
                            @endauth
                            <li><i class="fas fa-bars sidebar-menu-show-hide"></i></li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<!--========================== Header section End ==========================-->


<!--========================== Sidebar mobile menu wrap Start ==========================-->
<div class="sidebar-menu-wrapper">
    <div class="top-close d-flex align-items-center justify-content-between">
        <div class="header-wrapper">

            <div class="logo-wrapper mb-1">
                <a href="{{route('home')}}" class="normal-logo"> <img src="{{ getImage(getFilePath('logoIcon').'/logo.png', '?'
                    .time()) }}" alt="{{config('app.name')}}"></a>
                <a href="{{route('home')}}" class="dark-logo hidden" > <img src="{{ getImage(getFilePath('logoIcon').'/logo_white.png', '?'
                    .time()) }}" alt="{{config('app.name')}}"></a>
            </div>
        </div>
        <i class="fas fa-times close-hide-show"></i>
    </div>
    <ul class="sidebar-menu-list">
        <li class="sidebar-menu-list__item {{ Route::is('user.home') ? 'active' : '' }}">
            <a href="{{route('user.home')}}" class="sidebar-menu-list__link">@lang('Dashboard')</a>
        </li>
        @foreach($pages as $page)
        <li class="sidebar-menu-list__item {{ Request::url() == url('/').'/'.$page->slug ? 'active' : '' }}">
            <a href="{{route('pages',[$page->slug])}}" class="sidebar-menu-list__link">{{__($page->name)}}</a>
        </li>
        @endforeach
        @auth
        <li class="sidebar-menu-list__item ">
            <a class="btn btn--base mt-2 mb-2 ms-3" href="{{route('user.logout')}}"><i class="fas fa-sign-out-alt"></i> @lang('Logout') </a>
        </li>
        @else
        <li class="sidebar-menu-list__item ">
            <a class="btn btn--base mt-2 mb-2 ms-3" href="{{route('user.login')}}"><i class="fas fa-user"></i> @lang('Login') </a>
        </li>

        @endauth
    </ul>
</div>
<!--========================== Sidebar mobile menu wrap End ==========================-->
