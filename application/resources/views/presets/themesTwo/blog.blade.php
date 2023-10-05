@extends($activeTemplate.'layouts.frontend')
@section('content')

<!-- ==================== Blog Start Here ==================== -->
<section class="blog py-80">
    <div class="container">
        <div class="row gy-4 justify-content-center">
            @foreach($blogs as $item)
            <div class="col-lg-4 col-md-6">
                <div class="blog-item">
                    <div class="blog-item__thumb">
                        <a href="{{ route('blog.details', ['slug' => slug($item->data_values->title), 'id' => $item->id])}}" class="blog-item__thumb-link">
                            <img src="{{getImage(getFilePath('blog').'/'.'thumb_'.$item->data_values->blog_image)}}" alt="blog-image">
                        </a>
                    </div>
                    <div class="blog-item__content">
                        <ul class="text-list inline">
                            <li class="text-list__item"> <span class="text-list__item-icon"><i class="fas fa-calendar-alt"></i></span>{{showDateTime($item->created_at)}}</li>
                        </ul>
                        <h4 class="blog-item__title"><a href="{{ route('blog.details', ['slug' => slug($item->data_values->title), 'id' => $item->id])}}" class="blog-item__title-link">
                            @if(strlen(__($item->data_values->title)) >50)
                            {{substr( __($item->data_values->title), 0,50).'...' }}
                            @else
                            {{__($item->data_values->title)}}
                            @endif
                        </a></h4>
                        <a href="{{ route('blog.details', ['slug' => slug($item->data_values->title), 'id' => $item->id])}}" class="btn--simple">{{__($item->data_values->blog_btn)}} <span class="btn--simple__icon"><i class="fas fa-arrow-right"></i></span></a>
                    </div>
                </div>
            </div>
            @endforeach
            <div class="col-sm-12">
                <nav>
                    <ul class="pagination mt-3">
                        @if ($blogs->hasPages())
                        <div class="py-4">
                            {{ paginateLinks($blogs) }}
                        </div>
                        @endif
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- ==================== Blog End Here ==================== -->

@if($sections->secs != null)
@foreach(json_decode($sections->secs) as $sec)
@include($activeTemplate.'sections.'.$sec)
@endforeach
@endif

@endsection
