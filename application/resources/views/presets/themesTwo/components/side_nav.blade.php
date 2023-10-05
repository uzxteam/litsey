@php
$user = auth()->user();
@endphp
<div class="col-xl-3 col-lg-4 pe-xl-4">
    <div class="dashboard_profile">
      <div class="dashboard_profile__details">
          <div class="dashboard_profile_wrap">
              <div class="profile_photo">
                  <img src="{{ getImage(getFilePath('userProfile').'/'.$user->image,getFileSize('userProfile')) }}" alt="User Profile">
                  <div class="photo_upload">
                    <form action="{{ route('user.profile.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                      <label for="image"><i class="fas fa-image"></i></label>
                      <input id="image" type="file" name="image" class="upload_file"  onchange="this.form.submit()">
                    </form>
                  </div>
              </div>
              <h3>{{__($user->fullname)}}</h3>
          </div>
          <ul class="sidebar-menu-list">
              <li class="sidebar-menu-list__item {{ Route::is('user.home') ? 'active' : '' }}">
                  <a href="{{ route('user.home') }}" class="sidebar-menu-list__link">
                  <span class="icon"><i class="fas fa-tachometer-alt"></i></span>
                      @lang('Dashboard')
                  </a>
              </li>
              <li class="sidebar-menu-list__item {{ Route::is('user.orders') ? 'active' : '' }}">
                <a href="{{route('user.orders')}}" class="sidebar-menu-list__link">
                <span class="icon"><i class="fas fa-cart-arrow-down"></i></span>
                <span class="text">@lang('My Orders')</span>
                </a>
            </li>

              <li class="sidebar-menu-list__item has-dropdown">
                <a href="javascript:void(0)" class="sidebar-menu-list__link">
                <span class="icon"><i class="fas fa-file-invoice-dollar"></i></span>
                <span class="text">@lang('Deposit')</span>
                </a>
                <div class="sidebar-submenu">
                    <ul class="sidebar-submenu-list">
                        <li class="sidebar-submenu-list__item {{ Route::is('user.deposit') ? 'active' : '' }}">
                            <a href="{{route('user.deposit')}}" class="sidebar-submenu-list__link">@lang('Deposit Now')</a>
                        </li>
                        <li class="sidebar-submenu-list__item {{ Route::is('user.deposit.history') ? 'active' : '' }}">
                            <a href="{{route('user.deposit.history')}}" class="sidebar-submenu-list__link">@lang('Deposit Log') </a>
                        </li>
                    </ul>
                </div>
            </li>
              <li class="sidebar-menu-list__item {{ Route::is('user.transactions') ? 'active' : '' }}">
                <a href="{{route('user.transactions')}}" class="sidebar-menu-list__link">
                <span class="icon"><i class="fas fa-funnel-dollar"></i></span>
                @lang('Transactions')</span>
                </a>
            </li>
              <li class="sidebar-menu-list__item {{ Route::is('user.profile.setting') ? 'active' : '' }}">
                <a href="{{ route('user.profile.setting') }}" class="sidebar-menu-list__link">
                <span class="icon"><i class="fas fa-user"></i></span>
                    @lang('Profile Setting')
                </a>
            </li>
              <li class="sidebar-menu-list__item {{ Route::is('user.change.password') ? 'active' : '' }}">
                  <a href="{{ route('user.change.password') }}" class="sidebar-menu-list__link">
                  <span class="icon"><i class="fas fa-lock"></i></span>
                  @lang('Change Password')
                  </a>
              </li>

              <li class="sidebar-menu-list__item {{ Route::is('ticket') ? 'active' : '' }}">
                <a href="{{ route('ticket') }}" class="sidebar-menu-list__link">
                <span class="icon"><i class="fas fa fa-life-ring"></i></span>
                    @lang('My Tickets')
                </a>
            </li>

            <li class="sidebar-menu-list__item {{ Route::is('user.twofactor') ? 'active' : '' }}">
                <a href="{{ route('user.twofactor') }}" class="sidebar-menu-list__link">
                <span class="icon"><i class="fas fa-key"></i></span>
                    @lang('Google Authentication')
                </a>
            </li>
              <li class="sidebar-menu-list__item {{ Route::is('user.logout') ? 'active' : '' }}">
                  <a href="{{route('user.logout')}}" class="sidebar-menu-list__link">
                  <span class="icon"><i class="fas fa-sign-out-alt"></i></span>
                      @lang('Log Out')
                  </a>
              </li>
          </ul>
        </div>
     </div>
  </div>
