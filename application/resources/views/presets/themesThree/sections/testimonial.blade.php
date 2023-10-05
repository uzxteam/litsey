@php
$testimonial = getContent('testimonial.content',true);
$testimonialElements = getContent('testimonial.element',false);
@endphp

<!--========================== Testimonials Section Start ==========================-->
<section class="testimonials py-80 ">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-6 position-relative">
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
                <div class="section-heading ">
                    <span class="subtitle">{{__($testimonial->data_values->top_heading)}}</span>
                    <h2 class="section-heading__title ">
                        {{__($testimonial->data_values->heading)}}
                    </h2>
                    <p class="section-heading__desc mb-30">{{__($testimonial->data_values->subheading)}}</p>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="testimonial-slider">
                    @foreach ($testimonialElements as $item)
                    <div class="testimonails-card">
                        <div class="testimonial-item position-relative">


                            <div class="testimonial-item__quate"><i class="fas fa-quote-right"></i></div>
                                <div class="testimonial-item__thumb">
                                    <img src="{{getImage(getFilePath('testimonial').'/'.$item->data_values->testimonial_image)}}" alt="testimonial">
                                </div>

                                <div class="testimonial-item__content">
                                    <div class="testimonial-item__info">

                                        <div class="testimonial-item__details">
                                            <h5 class="testimonial-item__name">
                                                @if(strlen(__($item->data_values->title)) >20)
                                                {{substr( __($item->data_values->title), 0,20).'...' }}
                                                @else
                                                {{__($item->data_values->title)}}
                                                @endif
                                            </h5>
                                            <span class="testimonial-item__designation">
                                                @if(strlen(__($item->data_values->designation)) >30)
                                                {{substr( __($item->data_values->designation), 0,30).'...' }}
                                                @else
                                                {{__($item->data_values->designation)}}
                                                @endif
                                            </span>
                                        </div>
                                    </div>
                                    <p class="testimonial-item__desc">
                                        @if(strlen(__($item->data_values->description)) >180)
                                        {{substr( __($item->data_values->description), 0,180).'...' }}
                                        @else
                                        {{__($item->data_values->description)}}
                                        @endif
                                    </p>


                                    <div class="testimonial-item__rating">
                                        <ul class="rating-list">
                                            @if($item->data_values->star_count == 1)
                                            <li class="rating-list__item"><i class="fas fa-star"></i></li>
                                            @elseif($item->data_values->star_count == 2)
                                            <li class="rating-list__item"><i class="fas fa-star"></i></li>
                                            <li class="rating-list__item"><i class="fas fa-star"></i></li>
                                            @elseif($item->data_values->star_count == 3)
                                            <li class="rating-list__item"><i class="fas fa-star"></i></li>
                                            <li class="rating-list__item"><i class="fas fa-star"></i></li>
                                            <li class="rating-list__item"><i class="fas fa-star"></i></li>
                                            @elseif($item->data_values->star_count == 4)
                                            <li class="rating-list__item"><i class="fas fa-star"></i></li>
                                            <li class="rating-list__item"><i class="fas fa-star"></i></li>
                                            <li class="rating-list__item"><i class="fas fa-star"></i></li>
                                            <li class="rating-list__item"><i class="fas fa-star"></i></li>
                                            @else
                                            <li class="rating-list__item"><i class="fas fa-star"></i></li>
                                            <li class="rating-list__item"><i class="fas fa-star"></i></li>
                                            <li class="rating-list__item"><i class="fas fa-star"></i></li>
                                            <li class="rating-list__item"><i class="fas fa-star"></i></li>
                                            <li class="rating-list__item"><i class="fas fa-star"></i></li>
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!--========================== Testimonials Section End ==========================-->
