@php
 $portfolio = getContent('theme_two_portfolio.content',true);
 $portfolios = App\Models\Portfolio::where('status',1)->limit(6)->get();
@endphp

<!-- ==================== Our Projects Start Here ==================== -->
<section class="projects-area section-bg py-80">
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <div class="section-heading">
                    <span class="subtitle">{{__($portfolio->data_values->top_heading)}}</span>
                     <h2 class="section-heading__title">
                        {{__($portfolio->data_values->heading)}}
                        <span class="animate-shape">
                            <img src="{{asset($activeTemplateTrue.'images/animate-shape.png')}}" alt="Animate-shape">
                        </span>
                    </h2>
                     <p class="section-heading__desc mb-3">{{__($portfolio->data_values->sub_heading)}}</p>
                 </div>
            </div>
        </div>
        <div class="row gy-4 align-items-center justify-content-center">
            @foreach($portfolios as $item)
            <div class="col-lg-4 col-md-4">
                <div class="Our-Project">
                    <a href="{{ route('portfolio.details', ['slug' => slug($item->title), 'id' => $item->id])}}">
                        <img class="img-1" src="{{getImage(getFilePath('portfolioImage').'/'.$item->image)}}" alt="image">
                        <div class="content">
                            <h4>  @if(strlen(__($item->title)) >20)
                                {{substr( __($item->title), 0,20).'...' }}
                                @else
                                {{__($item->title)}}
                                @endif</h4>
                            <span>
                                @if(strlen(__($item->sub_title)) >20)
                                {{substr( __($item->sub_title), 0,20).'...' }}
                                @else
                                {{__($item->sub_title)}}
                                @endif
                            </span>
                        </div>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- ==================== Our Projects us End Here ==================== -->
