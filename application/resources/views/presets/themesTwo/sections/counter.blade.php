@php
$counter = getContent('counter.content',true);
$counterElements = getContent('counter.element',false,4);
 @endphp

<!-- ==================== Experience Start Here ==================== -->
<section class="experience-area section-bg py-80 ">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="section-heading  text-center">
                    <span class="subtitle">{{__($counter->data_values->top_heading)}}</span>
                    <h2 class="section-heading__title">
                        {{__($counter->data_values->heading)}}
                        <span class="animate-shape center">
                            <img src="{{asset($activeTemplateTrue.'images/animate-shape.png')}}" alt="Animate-shape">
                        </span>
                    </h2>
                </div>
            </div>
        </div>
        <div class="row gy-4 justify-content-center">
            @foreach($counterElements as $item)
            <div class="col-lg-3 col-md-4">
                <div class="experience">
                    <div class="experience__icon">
                        <h3><span class="odometer" data-count="{{__($item->data_values->counter_digit)}}"></span><span class="letter">+</span></h3>
                    </div>
                    <div class="experience__content">
                        <h3 class="title">{{__($item->data_values->title)}}</h3>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- ==================== Experience End Here ==================== -->

