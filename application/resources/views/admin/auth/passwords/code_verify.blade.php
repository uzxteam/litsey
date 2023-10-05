@extends('admin.layouts.master')
@section('content')
<div style="background-image: url('{{ asset('assets/admin/images/login.png') }}')" class="login_area">
    <div class="login">
        <div class="login__header">
            <h2>@lang('Verification')</h2>
            <p>@lang('Please enter the verification code')</p>
        </div>
        <div class="login__body">
            <form class="form" action="{{ route('admin.password.verify.code') }}" method="POST">
                @csrf
                <div class="form-row">
                    <span class="fas fa-envelope mb-2" aria-hidden="true"></span>
                    <label class="form-label mb-2" for="input">@lang('Verification Code')</label>
                    <div class="verification-code">
                        <input type="text" name="code" class="overflow-hidden" autocomplete="off">
                        <div class="boxes">
                            <span>-</span>
                            <span>-</span>
                            <span>-</span>
                            <span>-</span>
                            <span>-</span>
                            <span>-</span>
                        </div>
                    </div>
                </div>
                <div class="form-row my-2">
                    <a href="{{ route('admin.password.reset') }}" class="forget-text">@lang('Try to send again')</a>
                </div>
                <div class="form-row button-login">
                    <button type="submit" class="btn btn-login btn--primary sign-in">@lang('Verify')</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@push('style')
    <link rel="stylesheet" href="{{asset('assets/admin/css/auth.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/verification_code.css') }}">
    <style>
        .ball {
            position: absolute;
            border-radius: 100%;
            opacity: 0.7;
        }
        .verification-code::after {
            position: absolute;
            content: '';
            right: -37px;
            width: 35px;
            height: 50px;
            background: transparent;
            z-index: 2;
        }
    </style>
@endpush
@push('script')
<script>
    (function ($) {
        'use strict';
        $('[name=code]').on('input', function () {
            $(this).val(function (i, val) {
                if (val.length >= 6) {
                    $('form').find('button[type=submit]').html('<i class="las la-spinner fa-spin"></i>');
                    $('form').find('button[type=submit]').removeClass('disabled');
                    $('form')[0].submit();
                } else {
                    $('form').find('button[type=submit]').addClass('disabled');
                }
                if (val.length > 6) {
                    return val.substring(0, val.length - 1);
                }
                return val;
            });
            for (let index = $(this).val().length; index >= 0; index--) {
                $($('.boxes span')[index]).html('');
            }
        });
    })(jQuery)
</script>
<script>
    "use strict";
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
