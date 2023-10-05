@extends($activeTemplate.'layouts.master')

@section('content')
<div class="col-xl-9 col-lg-8">
    <div class="dashboard-body">
        <div class="row">
           <div class="contactus-form">
            <div class=" card-deposit text-center">
                <div class="card-header card-header-bg">
                    <h3>@lang('Payment Preview')</h3>
                </div>
                <div class="card-body-deposit text-center">
                        <h4 class="my-2"> @lang('PLEASE SEND EXACTLY') <span class="text-success"> {{ $data->amount }}</span> {{__($data->currency)}}</h4>
                        <h5 class="mb-2">@lang('TO') <span class="text-success"> {{ $data->sendto }}</span></h5>
                        <img src="{{$data->img}}" alt="@lang('Image')">
                        <h4 class="text-white bold my-4">@lang('SCAN TO SEND')</h4>
                </div>
            </div>
           </div>
        </div>
    </div>
</div>
@endsection
