@php
$chooseUs = getContent('choose_us.content',true);
$chooseUsElements = getContent('choose_us.element',false);
@endphp
<!-- ==================== Why Choose us Start Here ==================== -->
<section class="why-choose-area py-80">
    <img class="why-choose-bg" src="{{asset($activeTemplateTrue.'images/chooseus-bg.png')}}" alt="choose us image">
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <div class="">
                     <div class="section-heading">
                        <span class="subtitle">{{__($chooseUs->data_values->top_heading)}}</span>
                         <h2 class="section-heading__title">{{__($chooseUs->data_values->heading)}}</h2>
                         <p class="section-heading__desc mb-3">{{__($chooseUs->data_values->sub_heading)}}</p>
                     </div>
                </div>
            </div>
        </div>
        <div class="row gy-4 ">
            <div class="col-lg-5">
                <div class="why-choose-us__thumb">
                    <img class="img-1" src="{{getImage(getFilePath('chooseus').'/'.@$chooseUs->data_values->choose_image)}}" alt="choose us image">
                    <div class="popup-vide-wrap">
                        <div class="video-main">
                            <div class="promo-video">
                                <div class="waves-block">
                                    <div class="waves wave-1"></div>
                                    <div class="waves wave-2"></div>
                                    <div class="waves wave-3"></div>
                                </div>
                            </div>
                            <a class="play-video popup_video" href="{{__($chooseUs->data_values->url)}}">
                                <span class="play-btn"> <i class="fa fa-play"></i></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-7">
                <div class="why-choose-us__content">
                    <h3>{{__($chooseUs->data_values->top_heading_2)}}</h3>

                    <p class="section-heading__desc mb-3">{{__($chooseUs->data_values->sub_heading_2)}}</p>
                    <div class="why-choose-us__topic">
                        @foreach($chooseUsElements as $item)
                        <div class="item">
                            <div class="why-title-cont d-flex align-items-center">
                                <i class="fas fa-check"></i>
                                <div class="content ms-3">
                                    <h4>
                                        @if(strlen(__($item->data_values->title)) >50)
                                        {{substr( __($item->data_values->title), 0,50).'...' }}
                                        @else
                                        {{__($item->data_values->title)}}
                                        @endif
                                    </h4>
                                    <p>
                                        @if(strlen(__($item->data_values->description)) >120)
                                        {{substr( __($item->data_values->description), 0,120).'...' }}
                                        @else
                                        {{__($item->data_values->description)}}
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ==================== Why Choose us End Here ==================== -->
