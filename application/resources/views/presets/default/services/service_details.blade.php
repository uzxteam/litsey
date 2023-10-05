@extends($activeTemplate.'layouts.frontend')
@section('content')
<!-- ==================== Blog Start Here ==================== -->
<section class="blog-detials py-60">
    <div class="container">
        <div class="row gy-5 justify-content-center">
            <div class="col-lg-8">
                <div class="blog-details service-details">
                   <div class="blog-details__content">
                        <p class="blog-details__desc wyg">
                            @php
                               echo $service->description;
                            @endphp
                        </p>
                   </div>
                </div>
            </div>

            <div class="col-lg-4">
                <!-- ============================= Blog Details Sidebar Start ======================== -->
                    <div class="blog-sidebar-wrapper">
                        <div class="blog-sidebar text-center">
                            <h5>@lang('Price'): {{__($general->cur_sym)}} {{showAmount($service->price)}}</h5>
                            <a href="{{route('user.service.payment',$service->id)}}" class="btn btn--base">@lang('Buy Now')</a>
                        </div>
                        <div class="blog-sidebar">
                            <h5 class="blog-sidebar__title">@lang('Latests')</h5>
                            @foreach ($latests as $item)
                            <div class="latest-blog">
                                <div class="latest-blog__content">
                                    <h6 class="latest-blog__title"><a href="{{ route('service.details', ['slug' => slug($item->title), 'id' => $item->id])}}">
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
<!-- ============================= Blog Details Sidebar End ======================== -->
            </div>
        </div>
    </div>
</section>
<!-- ==================== Blog End Here ==================== -->
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


