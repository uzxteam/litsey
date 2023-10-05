@php
$about = getContent('theme_two_about.content',true);
$aboutElements = getContent('theme_two_about.element',false);
$contact = getContent('contact_us.content',true);
@endphp


<!--========================== About Section Start ==========================-->
<div class="about-section pt-80 pb-100">
    <div class="container">
        <div class="row flex-wrap-reverse gy-4">

            <div class="col-lg-6 position-relative">
                <div class="about-right-content">
                     <div class="section-heading mb-0">
                        <span class="subtitle">{{__($about->data_values->top_heading)}}</span>
                         <h2 class="section-heading__title">
                            {{__($about->data_values->heading)}}
                            <span class="animate-shape">
                                <img src="{{asset($activeTemplateTrue.'images/animate-shape.png')}}" alt="Animate-shape">
                            </span>
                         </h2>
                         <p class="section-heading__desc mb-3">{{__($about->data_values->description)}}</p>


                         <ul class="about-service mb-4">
                            @foreach($aboutElements as $item)
                             <li>
                                 <span><i class="fas fa-check-circle"></i>{{__($item->data_values->content_list)}}</span>
                             </li>
                             @endforeach
                         </ul>
                         <div class="about-bottom">
                            <a href="{{url('/about')}}" class="btn btn--base me-3 mb-2">
                                {{__($about->data_values->about_btn)}} @php echo $about->data_values->about_btn_icon @endphp
                            </a>
                         </div>
                     </div>
                </div>
            </div>

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
                <div class="square-shape-2 animate-y-axis">
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
                        <img class="img-2" src="{{getImage(getFilePath('ThemeTwoAbout').'/'.@$about->data_values->about_image_1)}}" alt="image">
                        <img class="img-1" src="{{getImage(getFilePath('ThemeTwoAbout').'/'.@$about->data_values->about_image_2)}}" alt="image">

                        <div class="about-contact d-flex align-items-center">
                            <i class="fas fa-users"></i>
                            <div class="ms-3">
                                <h4>@lang('For Emergency')</h4>
                            <a href="tel:{{__($contact->data_values->contact_number)}}">{{__($contact->data_values->contact_number)}}</a>
                            </div>
                        </div>
                        <div class="about-contact-top">
                            <h4>{{__($about->data_values->experience)}}</h4>
                            <span>@lang('Yillik tajriba')</span>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<!--========================== About Section End ==========================-->

