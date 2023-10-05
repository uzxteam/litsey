@extends($activeTemplate .'layouts.frontend')
@section('content')
<section class="account py-80">
<div class="container">
    <div class="d-flex justify-content-center">
        <div class="verification-code-wrapper account-form">
            <div class="verification-area">
                <h5 class="pb-3 text-center border-bottom">@lang('2FA Verification')</h5>
                <form action="{{route('user.go2fa.verify')}}" method="POST" class="submit-form">
                    @csrf

                    @include($activeTemplate.'components.verification_code')

                    <div class="form--group">
                        <button type="submit" class="btn btn--base w-100">@lang('Save')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</section>
@endsection
@push('script')
<script>
    (function ($) {
        "use strict";
        $('#code').on('input change', function () {
            var xx = document.getElementById('code').value;

            $(this).val(function (index, value) {
                value = value.substr(0, 7);
                return value.replace(/\W/gi, '').replace(/(.{3})/g, '$1 ');
            });

        });
    })(jQuery)
</script>
@endpush
