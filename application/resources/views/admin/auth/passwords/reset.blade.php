@extends('admin.layouts.master')
@section('content')
<div style="background-image: url('{{ asset('assets/admin/images/login.png') }}')" class="login_area">
<div class="login_area">
    <div class="login">
        <div class="login__header">
            <h2>@lang('Reset Password')</h2>
            <p>@lang('Provide a new to log in')</p>
        </div>
        <div class="login__body">
            <!-- <h4>user login</h4> -->
            <form action="{{ route('admin.password.change') }}" method="POST">
                @csrf
                <input type="hidden" name="email" value="{{ $email }}">
                <input type="hidden" name="token" value="{{ $token }}">
                <div class="field">
                    <input type="password" name="password" placeholder="@lang('Password')" required>
                    <span class="show-pass new-password"><i class="fas fa-eye-slash"></i></span>
                </div>
                <div class="field">
                    <input type="password" id="password_confirmation" name="password_confirmation" placeholder="@lang('Password Confirmation')"
                        required>
                        <span class="show-pass confirm-password"><i class="fas fa-eye-slash"></i></span>
                </div>
                <div class="field">
                    <button type="submit" class="sign-in">@lang('Reset')</button>
                </div>
                <div class="login__footer d-flex justify-content-center">
                    <a class="float-end" href="{{ route('admin.login') }}">@lang('Go back')</a>
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
        $(".new-password").click(function() {
            var passwordInput = $("#password");
            var showPassIcon = $(this).find("i");
            if (passwordInput.attr("type") === "password") {
                passwordInput.attr("type", "text");
                showPassIcon.removeClass("fa-eye-slash");
                showPassIcon.addClass("fa-eye");
            } else {
                passwordInput.attr("type", "password");
                showPassIcon.removeClass("fa-eye");
                showPassIcon.addClass("fa-eye-slash");
            }
        });
        $(".confirm-password").click(function() {
            var passwordInput = $("#password_confirmation");
            var showPassIcon = $(this).find("i");
            if (passwordInput.attr("type") === "password") {
                passwordInput.attr("type", "text");
                showPassIcon.removeClass("fa-eye-slash");
                showPassIcon.addClass("fa-eye");
            } else {
                passwordInput.attr("type", "password");
                showPassIcon.removeClass("fa-eye");
                showPassIcon.addClass("fa-eye-slash");
            }
        });
        // Some random colors
        const colors = ["#00ADAD", "#E3E3E3", "red", "green", "blue"];
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
