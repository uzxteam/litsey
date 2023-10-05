@php
$plan = getContent('plan.content',true);
$plans = App\Models\Plan::where('status',1)->orderBy('created_at','desc')->take(3)->get();
@endphp


<!-- ==================== Pricing Start Here ==================== -->
<section class="pricing-plan py-80">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="section-heading  text-center">
                    <span class="subtitle">{{__($plan->data_values->top_heading)}}</span>
                    <h2 class="section-heading__title">
                        {{__($plan->data_values->heading)}}
                        <span class="animate-shape center">
                            <img src="{{asset($activeTemplateTrue.'images/animate-shape.png')}}" alt="Animate-shape">
                        </span>
                    </h2>
                    <p class="section-heading__desc">{{__($plan->data_values->sub_heading)}}</p>
                </div>
            </div>
        </div>
        <div class="row gy-4 justify-content-center position-relative">
            <div class="square-shape-1 animate-y-axis">
                <div class="item">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                <div class="item">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                <div class="item">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                <div class="item">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                <div class="item">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                <div class="item">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                <div class="item">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
            @foreach ($plans as $item)
            <div class="col-lg-4 col-md-6">
                <div class="pricing-plan-item">
                    <div class="price-shape-1"></div>
                    <div class="price-shape-2"></div>
                    <div class="pricing-plan-item__top mb-2">
                        <h3 class="title mb-4">{{__($item->name)}}</h3>
                    </div>
                    <div class="pricing-plan-item__price">
                        <h3 class="title">{{__($general->cur_sym)}} {{showAmount($item->price)}}<span>{{$item->type==1 ? '/m' : '/y'}}</span> </h3>
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
                        <a class="btn btn--base" href="{{route('user.payment',$item->id)}}">
                            @lang('Get Started') <i class="fa-sharp fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>
<!-- ==================== Pricing End Here ==================== -->
