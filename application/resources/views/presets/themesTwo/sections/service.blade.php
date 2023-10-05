@php
$service = getContent('service.content',true);
$services = App\Models\Service::where('status',1)->orderBy('created_at','desc')->take(6)->get();
@endphp
<!-- ==================== Service Start Here ==================== -->
<section class="service-area section-bg py-80 ">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="section-heading  text-center">
                    <span class="subtitle">{{__($service->data_values->top_heading)}}</span>
                    <h2 class="section-heading__title">
                        {{__($service->data_values->heading)}}
                        <span class="animate-shape center">
                            <img src="{{asset($activeTemplateTrue.'images/animate-shape.png')}}" alt="Animate-shape">
                        </span>
                    </h2>
                    <p class="section-heading__desc">{{__($service->data_values->sub_heading)}}</p>
                </div>
            </div>
        </div>
        <div class="row gy-4">
            @foreach ($services as $item)
            <div class="col-lg-6">
                <div class="service">
                    <div class="service__icon">
                        @php echo $item->icon @endphp
                    </div>
                    <div class="service__content">
                        <h3 class="title">@if(strlen(__($item->title)) >50)
                            {{substr( __($item->title), 0,50).'...' }}
                            @else
                            {{__($item->title)}}
                            @endif</h3>
                        <p>@if(strlen(strip_tags($item->description)) >140)
                            {{substr(strip_tags($item->description), 0,140).'...' }}
                            @else
                            {{strip_tags($item->description)}}
                            @endif</p>

                            <div class="service-bottom-wrap d-flex justify-content-between align-items-center">
                                <p class="price-service">{{__($general->cur_sym)}} {{showAmount($item->price)}}</p>
                                <a href="{{ route('service.details', ['slug' => slug($item->title), 'id' => $item->id])}}" class="btn btn--base"> @lang('Buy now') <i class="fas fa-arrow-right"></i></a>
                            </div>

                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- ==================== Service End Here ==================== -->
