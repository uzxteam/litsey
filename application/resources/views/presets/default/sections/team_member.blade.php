@php
    $team =  getContent('team_member.content',true);
    $teamElements = getContent('team_member.element',false);
@endphp
<!-- ==================== Team Start Here ==================== -->
<section class="team-area py-80">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="section-heading  text-center">
                    <span class="subtitle">{{__($team->data_values->top_heading)}}</span>
                    <h2 class="section-heading__title">{{__($team->data_values->heading)}}</h2>
                    <p class="section-heading__desc">{{__($team->data_values->subheading)}}</p>
                </div>
            </div>
        </div>
        <div class="row gy-4 justify-content-center">
            @foreach($teamElements as $item)
            <div class="col-lg-3 col-md-6">
                <div class="team-item">
                    <div class="team-item__thumb">
                        <img src="{{getImage(getFilePath('teamMember').'/'.$item->data_values->agent_image)}}" alt="team member">
                    </div>
                    <div class="team-item__content-wrapper">
                        <div class="team-name">
                            <h3>
                                @if(strlen(__($item->data_values->title)) >20)
                                        {{substr( __($item->data_values->title), 0,20).'...' }}
                                    @else
                                        {{__($item->data_values->title)}}
                                @endif
                            </h3>
                            <span>
                                @if(strlen(__($item->data_values->description)) >20)
                                        {{substr( __($item->data_values->description), 0,20).'...' }}
                                    @else
                                        {{__($item->data_values->description)}}
                                @endif
                            </span>
                        </div>
                        <div class="social-wrap d-flex align-items-center justify-content-end">
                            <ul class="d-flex">
                                <li> <a href="mailto:{{$item->data_values->email}}" title="{{__($item->data_values->email)}}"><i class="fas fa-envelope"></i></a>
                                </li>
                                <li class="share__icon"><a href=""><i class="fas fa-share-alt"></i></a>
                                    <ul class="social-team">
                                        <li class="social-list__item"><a href="{{__($item->data_values->facebook_link)}}" class="social-list__link">@php echo $item->data_values->facebook_icon; @endphp</a> </li>
                                        <li class="social-list__item"><a href="{{__($item->data_values->twitter_link)}}" class="social-list__link active"> @php echo $item->data_values->twitter_icon; @endphp</a></li>
                                        <li class="social-list__item"><a href="{{__($item->data_values->instagram_link)}}" class="social-list__link"> @php echo $item->data_values->instagram_icon; @endphp</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- ==================== Team Start Here ==================== -->
