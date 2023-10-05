@php
$links = getContent('policy_pages.element');
$importantLinks = getContent('footer_important_links.element', false, null, true);
$companyLinks = getContent('footer_company_links.element', false, null, true);
$subscribe = getContent('subscribe.content', true);
$contact = getContent('contact_us.content',true);
$socialIcons = getContent('social_icon.element',false);
@endphp


<!-- ==================== Footer Start Here ==================== -->
<footer class="footer-area section-bg-light bg-img" style="background-image: url({{asset($activeTemplateTrue.'images/footer-bg.jpg')}})">
    <span class="banner-effect-1"></span>
    <div class="pb-60 pt-80">
        <div class="container">
            <div class="row justify-content-center gy-5">
                <div class="col-xl-4 col-sm-6">
                    <div class="footer-item">
                        <div class="footer-item__logo">
                            <a href="{{route('home')}}" class="footer-logo-normal" id="footer-logo-normal"> <img src="{{ getImage(getFilePath('logoIcon').'/logo_white.png', '?'
                                .time()) }}" alt="{{config('app.name')}}"></a>
                            <a href="{{route('home')}}" class="footer-logo-dark hidden" id="footer-logo-dark"> <img src="{{ getImage(getFilePath('logoIcon').'/logo_white.png', '?'
                                .time()) }}" alt="{{config('app.name')}}"></a>
                        </div>
                        <p class="footer-item__desc mb-3">{{__($contact->data_values->short_description)}}</p>

                        <ul class="footer-contact-menu">
                            <li class="footer-contact-menu__item">
                                <div class="footer-contact-menu__item-icon">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                                <div class="footer-contact-menu__item-content">
                                    <p>{{__($contact->data_values->contact_details)}}</p>
                                </div>
                            </li>
                            <li class="footer-contact-menu__item">
                                <div class="footer-contact-menu__item-icon">
                                    <i class="fas fa-envelope"></i>
                                </div>
                                <div class="footer-contact-menu__item-content">
                                    <p>{{__($contact->data_values->email_address)}}</p>
                                </div>
                            </li>
                            <li class="footer-contact-menu__item">
                                <div class="footer-contact-menu__item-icon">
                                    <i class="fas fa-phone"></i>
                                </div>
                                <div class="footer-contact-menu__item-content">
                                    <p>{{__($contact->data_values->contact_number)}}</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-2 col-sm-6">
                    <div class="footer-item">
                        <h5 class="footer-item__title">@lang('Company Links')</h5>
                        <ul class="footer-menu">
                            @foreach($companyLinks as $link)
                            <li class="footer-menu__item"><a href="{{url('/').$link->data_values->url}}" class="footer-menu__link">{{$link->data_values->title}}</a></li>
                            @endforeach
                            @foreach($links as $link)
                            <li class="footer-menu__item"><a href="{{ route('policy.pages', [slug($link->data_values->title), $link->id]) }}" class="footer-menu__link">{{$link->data_values->title}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6">
                    <div class="footer-item">
                        <h5 class="footer-item__title">@lang('Important Link')</h5>
                        <ul class="footer-menu">
                            @foreach($importantLinks as $link)
                            <li class="footer-menu__item"><a href="{{url('/').$link->data_values->url}}" class="footer-menu__link">{{$link->data_values->title}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6">
                    <div class="footer-item">
                        <h5 class="footer-item__title">@lang('Newsletter')</h5>

                        <p class="footer-item__desc mb-3">
                             @if(strlen(__($subscribe->data_values->sub_heading)) >50)
                            {{substr( __($subscribe->data_values->sub_heading), 0,50).'...' }}
                            @else
                            {{__($subscribe->data_values->sub_heading)}}
                            @endif
                        </p>

                        <form action="{{route('subscribe')}}" method="POST">
                            @csrf
                            <div class="search-box footer w-100">
                                <input type="text" class="form--control" ame="email" placeholder="Email...">
                                <button type="submit" class="btn btn--base btn--sm">@lang('Subscribe')</button>
                            </div>
                        </form>

                        <ul class="social-list">
                            @foreach($socialIcons as $item)
                            <li class="social-list__item"><a href="{{ __($item->data_values->url)}}" class="social-list__link" target="_blank">@php echo $item->data_values->social_icon @endphp</a> </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
  <!-- Footer Top End-->

    <!-- bottom Footer -->
    <div class="bottom-footer section-bg py-3">
        <div class="container">
            <div class="row gy-2">
                <div class="col-lg-6 col-md-12">
                    <div class="bottom-footer-text"> @php echo $contact->data_values->website_footer @endphp </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="bottom-footer-menu">
                        <ul>
                            @foreach($links as $link)
                            <li><a href="{{ route('policy.pages', [slug($link->data_values->title), $link->id]) }}" target="_blank">{{$link->data_values->title}}</a></li>
                            @endforeach
                            <li><a href="{{url('/cookie-policy')}}" target="_blank">@lang('Cookie Policy')</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </footer>
  <!-- ==================== Footer End Here ==================== -->
