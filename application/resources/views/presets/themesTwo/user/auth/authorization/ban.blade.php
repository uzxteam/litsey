@extends($activeTemplate .'layouts.frontend')
@section('content')
<section class="account py-80">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 account-form">
            <h3 class="text-center text-danger">@lang('You are banned')</h3>
            <p class="fw-bold mb-1">@lang('Reason'):</p>
            <p>{{ $user->ban_reason }}</p>
        </div>
    </div>
</div>
</section>
@endsection
