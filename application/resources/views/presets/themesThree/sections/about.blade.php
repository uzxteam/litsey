@php
$about = getContent('theme_three_about.content',true);
$aboutElements = getContent('theme_three_about.element',false,4);
$aboutElementsCount = getContent('theme_three_about.element',false)->count();
$contact = getContent('contact_us.content',true);
@endphp

<!--========================== About Section Start ==========================-->
<div class="about-section pt-80 pb-100">
    <div class="container">
        <div class="row flex-wrap-reverse align-items-center gy-4">

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
                <div class="about-thumb">
                    <div class="about-thumb__inner">
                        <img class="img-2" src="{{getImage(getFilePath('ThemeThreeAbout').'/'.@$about->data_values->about_image)}}" alt="image">
                    </div>
                </div>
            </div>

            <div class="col-lg-6 position-relative">
                <div class="about-right-content">
                     <div class="section-heading mb-0">
                        <span class="subtitle">{{__($about->data_values->top_heading)}}</span>
                         <h2 class="section-heading__title">
                            {{__($about->data_values->heading)}}
                         </h2>
                           <div class="row">

                            <div class="col-lg-6 col-md-6">
                                <ul class="about-service mb-4">
                                    @foreach($aboutElements as  $index=>$item)
                                    @if($index % $aboutElementsCount == 0 )
                                    <li>
                                        <i class="fas fa-check-circle"></i>
                                        <h5>{{__($item->data_values->content_list)}}</h5>
                                        <p>{{$item->data_values->description}}</p>
                                    </li>
                                    @elseif($index % $aboutElementsCount == 1)
                                    <li>
                                        <i class="fas fa-check-circle"></i>
                                        <h5>{{__($item->data_values->content_list)}}</h5>
                                        <p>{{$item->data_values->description}}</p>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <ul class="about-service mb-4">
                                    @elseif($index % $aboutElementsCount == 2)
                                    <li>
                                        <i class="fas fa-check-circle"></i>
                                        <h5>{{__($item->data_values->content_list)}}</h5>
                                        <p>{{$item->data_values->description}}</p>
                                    </li>
                                    @else
                                    <li>
                                        <i class="fas fa-check-circle"></i>
                                        <h5>{{__($item->data_values->content_list)}}</h5>
                                        <p>{{$item->data_values->description}}</p>
                                    </li>
                                </ul>
                            </div>
                            @endif
                            @endforeach
                           </div>

                         <div class="about-bottom">
                            <a href="{{url('/about')}}" target="_blank" class="btn btn--base me-3 mb-2">
                                {{__($about->data_values->about_btn)}} <i class="fas fa-solid fa-arrow-right"></i>
                            </a>
                         </div>
                     </div>
                </div>
            </div>

        </div>
    </div>
</div>

<!--========================== About Section End ==========================-->

