@php
 $portfolio = getContent('portfolio.content',true);
$portfolios = App\Models\Portfolio::where('status',1)->limit(5)->get();
$portfoliosCount = App\Models\Portfolio::where('status',1)->count();
@endphp
<!-- ==================== Our Projects Start Here ==================== -->
<section class="projects-area section-bg py-80">
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <div class="">
                     <div class="section-heading">
                        <span class="subtitle">{{__($portfolio->data_values->top_heading)}}</span>
                         <h2 class="section-heading__title">{{__($portfolio->data_values->heading)}}</h2>
                         <p class="section-heading__desc mb-3">{{__($portfolio->data_values->sub_heading)}}</p>
                     </div>
                </div>
            </div>
        </div>
        <div class="row gy-4 align-items-center">
            @foreach($portfolios as $index=>$item)
            @if($index % $portfoliosCount == 0 )
            <div class="col-lg-4 col-md-4">
                <div class="Our-Project">
                    <a href="{{ route('portfolio.details', ['slug' => slug($item->title), 'id' => $item->id])}}">
                        <img class="img-1" src="{{getImage(getFilePath('portfolioImage').'/'.$item->image)}}" alt="image">
                        <div class="content">
                            <h4>
                                @if(strlen(__($item->title)) >20)
                                {{substr( __($item->title), 0,20).'...' }}
                                @else
                                {{__($item->title)}}
                                @endif

                            </h4>
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
            <div class="col-lg-4 col-md-4">
                <div class="row gy-3">
                    @elseif($index % $portfoliosCount == 1)
                    <div class="col-lg-12">
                        <div class="Our-Project">
                            <a href="{{ route('portfolio.details', ['slug' => slug($item->title), 'id' => $item->id])}}">
                                <img class="img-1" src="{{getImage(getFilePath('portfolioImage').'/'.$item->image)}}" alt="image">
                                <div class="content">
                                    <h4>
                                        @if(strlen(__($item->title)) >20)
                                        {{substr( __($item->title), 0,20).'...' }}
                                        @else
                                        {{__($item->title)}}
                                        @endif
                                    </h4>
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
                    @elseif($index % $portfoliosCount == 2)
                    <div class="col-lg-12">
                        <div class="Our-Project">
                            <a href="{{ route('portfolio.details', ['slug' => slug($item->title), 'id' => $item->id])}}">
                                <img class="img-1" src="{{getImage(getFilePath('portfolioImage').'/'.$item->image)}}" alt="image">
                                <div class="content">
                                    <h4>
                                        @if(strlen(__($item->title)) >20)
                                        {{substr( __($item->title), 0,20).'...' }}
                                        @else
                                        {{__($item->title)}}
                                        @endif
                                    </h4>
                                    <span>
                                        @if(strlen(__($item->Sub_title)) >20)
                                        {{substr( __($item->Sub_title), 0,20).'...' }}
                                        @else
                                        {{__($item->Sub_title)}}
                                        @endif
                                    </span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4">
                <div class="row gy-3">
                    @elseif($index % $portfoliosCount == 3)

                    <div class="col-lg-12">
                        <div class="Our-Project">
                            <a href="{{ route('portfolio.details', ['slug' => slug($item->title), 'id' => $item->id])}}">
                                <img class="img-1" src="{{getImage(getFilePath('portfolioImage').'/'.$item->image)}}" alt="image">
                                <div class="content">
                                    <h4>
                                        @if(strlen(__($item->title)) >20)
                                        {{substr( __($item->title), 0,20).'...' }}
                                        @else
                                        {{__($item->title)}}
                                        @endif
                                    </h4>
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
                    @else
                    <div class="col-lg-12">
                        <div class="Our-Project">
                            <a href="{{ route('portfolio.details', ['slug' => slug($item->title), 'id' => $item->id])}}">
                                <img class="img-1" src="{{getImage(getFilePath('portfolioImage').'/'.$item->image)}}" alt="image">
                                <div class="content">
                                    <h4>
                                        @if(strlen(__($item->title)) >20)
                                        {{substr( __($item->title), 0,20).'...' }}
                                        @else
                                        {{__($item->title)}}
                                        @endif
                                    </h4>
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
                </div>
            </div>
            @endif
            @endforeach
        </div>
    </div>
</section>
<!-- ==================== Our Projects us End Here ==================== -->
