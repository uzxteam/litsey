@extends($activeTemplate.'layouts.frontend')
@section('content')
 <!--=======-** Login start **-=======-->
 <section class="account bg-img login py-80 position-relative">
    <img class="login-bg-img" src="{{asset($activeTemplateTrue.'images/login-bg.png')}}" alt="login-image">
    <div class="account-inner">
        <div class="container">
            <div class="row gy-4 justify-content-end">
                <div class="col-lg-6">
                    <div class="account-form">
                        <div class="account-form__content mb-4">
                            <h3 class="account-form__title mb-2">@lang('Sign In Your Account')</h3>
                            <p class="account-form__desc">@lang('Please input your username and password and login to your account to get access to your dashboard.')</p>
                        </div>
                        <form method="POST" action="{{ route('user.login') }}" class="verify-gcaptcha">
                            @csrf
                            <div class="row gy-3">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="username" class="form--label"> @lang('Username or Email')</label>
                                        <input type="text" class="form--control" id="username" name="username" value="{{ old('username') }}" required>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <label for="your-password" class="form--label">@lang('Password')</label>
                                    <div class="input-group">
                                        <input id="your-password" type="password" class="form-control form--control" name="password"
                                        required>
                                        <div class="password-show-hide fas fa-lock" id="#your-password"></div>
                                    </div>
                                </div>
                                <x-captcha></x-captcha>
                                <div class="col-sm-12">
                                    <div class="d-flex flex-wrap justify-content-between">
                                        <div class="form--check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }}>
                                            <label class="form-check-label" for="remember">@lang('Remember me')</label>
                                        </div>
                                        <a href="{{ route('user.password.request') }}" class="forgot-password text--base">@lang('Forgot Your Password?')</a>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn--base w-100" id="recaptcha">
                                        @lang('Sign In') <i class="fas fa-arrow-right"></i>
                                        <span style="top: 40.6094px; left: 80px;"></span>
                                    </button>
                                </div>
                                <div class="col-sm-12">
                                    <div class="have-account text-center">
                                        <p class="have-account__text">@lang('Don\'t have any account?') <a href="{{ route('user.register') }}" class="have-account__link text--base">@lang('Create Account')</a></p>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--=======-** Login End **-=======-->

@endsection
