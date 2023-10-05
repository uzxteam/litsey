@php
    $team =  getContent('team_member.content',true);
    $teamElements = getContent('team_member.element',false);
@endphp

<!-- ==================== Team Start Here ==================== -->
<section class="team-area section-bg py-80">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="section-heading  text-center">
                    <span class="subtitle">{{__($team->data_values->top_heading)}}</span>
                    <h2 class="section-heading__title">{{__($team->data_values->heading)}}
                    </h2>
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
                                @if(strlen(__($item->data_values->title)) >40)
                                        {{substr( __($item->data_values->title), 0,50).'...' }}
                                    @else
                                        {{__($item->data_values->title)}}
                                @endif
                            </h3>
                            <span>
                                @if(strlen(__($item->data_values->description)) >70)
                                        {{substr( __($item->data_values->description), 0,70).'...' }}
                                    @else
                                        {{__($item->data_values->description)}}
                                @endif
                            </span>
                        </div>
                       
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- ==================== Team Start Here ==================== -->
