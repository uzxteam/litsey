@extends($activeTemplate.'layouts.frontend')
@section('content')
<!-- ==================== portfolio Start Here ==================== -->
<section class="blog-detials py-60">
    <div class="container">
        <div class="row gy-5 justify-content-center">
            <div class="col-lg-8">
                <div class="blog-details">

                    <div class="blog-item">
                        <div class="blog-item__thumb">
                            <img src="{{getImage(getFilePath('portfolioImage').'/'.$portfolio->image)}}" alt="blog-img">
                        </div>

                        <div class="blog-item__content pt-2">
                            <ul class="text-list inline">
                                <li class="text-list__item"> <span class="text-list__item-icon"><i class="fas fa-calendar-alt"></i></span>{{showDateTime($portfolio->created_at)}}</li>
                            </ul>
                        </div>
                    </div>
                   <div class="blog-details__content">
                        <h3 class="blog-details__title">{{__($portfolio->title)}}</h3>
                        <p class="blog-details__desc wyg">
                            @php
                               echo $portfolio->description;
                            @endphp
                        </p>
                        <div class="blog-details__share mt-4 d-flex align-items-center flex-wrap mb-4">
                            <h5 class="social-share__title mb-0 me-sm-3 me-1 d-inline-block">@lang('Share This')</h5>
                            <ul class="social-list blog-details">
                                <li class="social-list__item" data-bs-toggle="tooltip" data-bs-placement="top" title="Facebook"> <a class="social-list__link" target="_blank" href="https://www.facebook.com/share.php?u={{ Request::url() }}&title={{slug(@$portfolio->title)}}"><i class="lab la-facebook-f"></i></a> </li>
                                <li class="social-list__item" data-bs-toggle="tooltip" data-bs-placement="top" title="Linkedin"> <a class="social-list__link" target="_blank" href="https://www.linkedin.com/shareArticle?mini=true&url={{ Request::url() }}&title={{slug(@$portfolio->title)}}&source=behands"><i class="lab la-linkedin-in"></i></a> </li>
                                <li class="social-list__item" data-bs-toggle="tooltip" data-bs-placement="top" title="Twitter"> <a class="social-list__link" target="_blank" href="https://twitter.com/intent/tweet?status={{slug(@$portfolio->title)}}+{{ Request::url() }}"><i class="lab la-twitter"></i></a> </li>
                            </ul>
                        </div>
                   </div>
                </div>
            </div>

            <div class="col-lg-4">
                <!-- ============================= portfolio Details Sidebar Start ======================== -->
                    <div class="blog-sidebar-wrapper">
                        <div class="blog-sidebar">
                            <h5 class="blog-sidebar__title">@lang('Latests')</h5>
                            @foreach ($latests as $item)
                            <div class="latest-blog">
                                <div class="latest-blog__thumb">
                                    <a href="{{ route('portfolio.details', ['slug' => slug($item->title), 'id' => $item->id])}}"> <img src="{{getImage(getFilePath('portfolioImage').'/'.$item->image)}}" alt="latest blog"></a>
                                </div>
                                <div class="latest-blog__content">
                                    <h6 class="latest-blog__title"><a href="{{ route('portfolio.details', ['slug' => slug($item->title), 'id' => $item->id])}}">
                                        @if(strlen(__($item->title)) >50)
                                        {{substr( __($item->title), 0,50).'...' }}
                                        @else
                                        {{__($item->title)}}
                                        @endif
                                    </a></h6>
                                    <span class="latest-blog__date">{{showDateTime($item->created_at)}}</span>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
<!-- ============================= portfolio Details Sidebar End ======================== -->
            </div>
        </div>
    </div>
</section>
<!-- ==================== portfolio End Here ==================== -->
@endsection

@push('style')
    <style>
        .wyg h1,
        .wyg h2,
        .wyg h3,
        .wyg h4 {
            color: hsl(var(--black));
        }

        .wyg p {
            color: hsl(var(--black));
        }

        .wyg ul {
            margin: 35px;
        }

        .wyg ul li {
            list-style-type: disc;
            color: hsl(var(--black));
            font-family: var(--body-font);
        }

        /*========= dark css =======*/
        .dark .wyg h1,
        .dark .wyg h2,
        .dark .wyg h3,
        .dark .wyg h4 {
            color: hsl(var(--white));
        }

        .dark .wyg p {
            color: hsl(var(--white));
        }

        .dark .wyg ul {
            margin: 35px;
        }

        .dark .wyg ul li {
            list-style-type: disc;
            color: hsl(var(--white));
        }
    </style>
@endpush

