@extends('admin.layouts.master')
@section('content')
<div class="login_area">
    <div class="login">
        <div class="login__header">
            <h2>{{ __($pageTitle) }}</h2>
            <p>{{ __($general->site_name) }} @lang('Dashboard')</p>
        </div>
        <div class="login__body">
            <!-- <h4>user login</h4> -->
            <form action="{{ route('admin.login') }}" method="POST">
                @csrf
                <div class="field">
                    <input type="text" name="username" placeholder="@lang('Username')">
                    <span class="show-pass"><i class="fas fa-user"></i></span>
                </div>
                <div class="field">
                    <input type="password" name="password" placeholder="@lang('Password')">
                    <span class="show-pass"><i class="fas fa-lock"></i></span>
                </div>
                <div class="login__footer">
                    <div class="field_remember">
                        <div class="remember_wrapper">
                            <input type="checkbox" name="remember" id="remember">
                            <label class="remember" for="remember">@lang('Remember')</label>
                        </div>
                    </div>
                    <div class="field_foget">
                        <a href="{{ route('admin.password.reset') }}">@lang('Forgot password?')</a>
                    </div>
                </div>
                <x-captcha></x-captcha>
                <div class="field">
                    <button type="submit" class="sign-in">@lang('Sign in')</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('style')
<link rel="stylesheet" href="{{asset('assets/admin/css/auth.css')}}">
<style>
    .ball {
        position: absolute;
        border-radius: 100%;
        opacity: 0.7;
    }
</style>
@endpush

@push('script')
<script>
    "use strict";
    // Some random colors
    const colors = ["#00adad", "#e3e3e3", "red", "green", "blue"];

    const numBalls = 50;
    const balls = [];

    for (let i = 0; i < numBalls; i++) {
        let ball = document.createElement("div");
        ball.classList.add("ball");
        ball.style.background = colors[Math.floor(Math.random() * colors.length)];
        ball.style.left = `${Math.floor(Math.random() * 80)}vw`;
        ball.style.top = `${Math.floor(Math.random() * 80)}vh`;
        ball.style.transform = `scale(${Math.random()})`;
        ball.style.width = `${Math.random()}em`;
        ball.style.height = ball.style.width;

        balls.push(ball);
        document.body.append(ball);
    }

    // Keyframes
    balls.forEach((el, i, ra) => {
        let to = {
            x: Math.random() * (i % 2 === 0 ? -11 : 11),
            y: Math.random() * 12
        };

        let anim = el.animate(
            [
                { transform: "translate(0, 0)" },
                { transform: `translate(${to.x}rem, ${to.y}rem)` }
            ],
            {
                duration: (Math.random() + 1) * 2000, // random duration
                direction: "alternate",
                fill: "both",
                iterations: Infinity,
                easing: "ease-in-out"
            }
        );
    });
</script>
@endpush