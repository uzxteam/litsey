@extends($activeTemplate.'layouts.frontend')
@section('content')

<!-- ==================== Pricing Start Here  ==================== -->
<section class="pricing-plan py-80">
    <div class="container">
        <div class="row gy-4 justify-content-center position-relative">
            @foreach ($plans as $item)
            <div class="col-lg-4 col-md-6">
                <div class="pricing-plan-item">
                    <div class="price-shape-1"></div>
                    <div class="price-shape-2"></div>
                    <div class="pricing-plan-item__price">
                        <h3 class="title">{{__($general->cur_sym)}} {{showAmount($item->price)}}<span>{{$item->type==1 ? '/m' : '/y'}}</span> </h3>
                    </div>
                    <div class="pricing-plan-item__top mb-2">
                        <h3 class="title">{{__($item->name)}}</h3>
                    </div>
                    <div class="pricing-plan-item__list">
                        <ul>
                        @if(@$item->content)
                            @foreach(json_decode(@$item->content) as $value)
                         <li> <i class="fas fa-check-circle"></i>{{$value}}</li>
                           @endforeach
                         @endif

                        </ul>
                    </div>
                    <div class="pricing-plan-item__bottom">
                        <a href="{{route('user.payment',$item->id)}}" class="btn btn--base me-2 mb-2">
                            @lang('Get Started') <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- ==================== Pricing End Here ==================== -->


@if($sections->secs != null)
@foreach(json_decode($sections->secs) as $sec)
@include($activeTemplate.'sections.'.$sec)
@endforeach
@endif

@endsection

