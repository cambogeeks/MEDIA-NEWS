@extends('visitor.layouts.main')

@section('page_title', 'welcome to 180 inspire website')

@section('slideshow')
    @if(!empty($sliders) && count($sliders) > 0)
    <!-- Slideshow -->
    <div class="slideshow_container">
        <div class="uk-panel">
            <div class="slideshow_section" data-uk-slideshow="{animation: 'swipe'}">
                <div class="uk-slidenav-position">
                    <ul class="uk-slideshow uk-overlay-active">
                    @foreach($sliders as $slider)
                        @includeIf('visitor.partials._homepage_slideshow', ['slider' => $slider])
                    @endforeach
                    </ul>

                    <a href="#" class="uk-slidenav uk-slidenav-previous uk-hidden-touch" data-uk-slideshow-item="previous"></a>
                    <a href="#" class="uk-slidenav uk-slidenav-next uk-hidden-touch" data-uk-slideshow-item="next"></a>
                </div>
            </div>
        </div>
    </div>
    <!-- /Slideshow -->
    @endif
@endsection

@section('content')
<div class="page-wrapper__bg">
    <!-- Latest article -->
    <div class="section">
        <div class="latest-article">
            <div class="uk-container uk-container-center">
                <div class="uk-grid uk-grid-collapse">

                    <div class="uk-width-small-1-1 uk-width-medium-2-3 uk-width-large-2-3 uk-width-xlarge-2-3">
                        <div class="section-heading bottom-line">
                            <h3 class="bg_grey font-kh-nokora">
                                <i class="fa fa-newspaper-o"></i>
                                @lang('visitor.latest_post')
                            </h3>
                        </div>

                        <div class="section-bg__white">
                            <div class="padding-small uk-grid uk-grid-collapse uk-grid-width-1-1 uk-grid-width-small-1-2 uk-grid-width-medium-1-3 uk-grid-width-large-1-3 uk-grid-width-xlarge-1-3">
                                @foreach($articles as $article)
                                    @includeIf('visitor.components.article.grid_box_1', ['article' => $article])
                                @endforeach
                            </div>

                            <div class="sponsor-slideset__footer">
                                <div class="inner">
                                    <a href="{{ route('visitor.article.page') }}">READ MORE</a>
                                </div>
                            </div>

                        </div>

                    </div>

                    <div class="uk-width-small-1-1 uk-width-medium-1-3 uk-width-large-1-3 uk-width-xlarge-1-3">
                        <div class="section-advert__right padding-left__sm">
                            <div class="advert-box">
                                <div class="inner">
                                    <a href="#" class="custom-advert__link">
                                        <img src="{{ asset('images/ads/media_ads_video.png') }}"alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="advert-box">
                                <div class="inner">
                                    <a href="#" class="custom-advert__link">
                                        <img src="{{ asset('images/ads/media_ads_bigk_film.png') }}" alt="">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- /Latest article -->

    <!-- Latest video grid -->
    <div class="section">
        <div class="latest-video">
            <div class="uk-container uk-container-center">

                <div class="section-heading bottom-line">
                    <h3 class="bg_grey font-kh-nokora">
                        <i class="fa fa-play"></i>
                        @lang('visitor.latest_video')
                    </h3>
                </div>

                <div class="section-bg__white">
                    <div class=" uk-grid uk-grid-collapse uk-grid-width-1-1 uk-grid-width-small-1-2 uk-grid-width-medium-1-3 uk-grid-width-large-1-4 uk-grid-width-xlarge-1-4 padding-small">
                        @foreach($videos as $video)
                            @includeIf('visitor.components.video.video_grid_index', ['video' => $video])
                        @endforeach
                    </div>

                    <div class="sponsor-slideset__footer">
                        <div class="inner">
                            <a href="{{ route('visitor.video.page') }}">WATCH MORE</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="section">
        <div class="latest-video pt-3 pb-3" style="background-image: url('{{URL('images/bg-angkor.jpg')}}');color: white !important;background-position: center;background-size: cover;">
            <div class="uk-container uk-container-center">

                <div class="section-heading bottom-line">
                    <h3 class="bg_grey font-kh-nokora">
                        <i class="fa fa-users"></i>
                        @lang('visitor.meetAuthor')
                    </h3>
                </div>

                <div style="background-color: rgba(0,0,0,.5);">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6 col-md-12">
                                <div class="row">
                                    @if(count($authors))
                                        <div class="owl-carousel owl-theme" style="padding:10px">
                                            @if(count($authors)==1)
                                                @foreach($authors as $author)
                                                    <div class="item">
                                                        <center>
                                                            <div style="background-repeat: no-repeat;background-position:center;width:180px;height:180px;background-image: url('{{$author->picture}}')"></div>
                                                            <h5 class="text-center"><a href="{{route('visitor.author.detail',$author->id)}}" style="color:white">{{$author->username}}</a></h5>
                                                        </center>
                                                    </div>
                                                @endforeach
                                            @else
                                                @for($i=0;$i<count($authors);$i++)
                                                        <div class="item">
                                                           <div class="row">
                                                               <div class="col-12 mb-1 mt-1 text-center">
                                                                   <center>
                                                                       <div style="background-repeat: no-repeat;background-position:center;width:180px;height:180px;background-image: url('{{$authors[$i]->picture}}')"></div>
                                                                       <h5><a href="{{route('visitor.author.detail',$authors[$i]->id)}}" style="color:white">{{$authors[$i]->username}}</a></h5>
                                                                   </center>

                                                               </div>
                                                               <div class="col-12 mb-1 mt-1 text-center">
                                                                   <center>
                                                                       <div style="background-repeat: no-repeat;background-position:center;width:180px;height:180px;background-image: url('{{$authors[$i++]->picture}}')"></div>
                                                                       <h5><a href="{{route('visitor.author.detail',$authors[$i]->id)}}" style="color:white">{{$authors[$i++]->username}}</a></h5>
                                                                   </center>
                                                               </div>
                                                           </div>
                                                        </div>
                                                        <?php $i--?>
                                                @endfor
                                            @endif
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12 pb-3">
                                <div style="text-align: justify">
                                    @if($authorFeature->video_url)
                                        <h2 style="margin-top: 7px;">{{$authorFeature->title}}</h2>
                                        <p>{!! str_limit($authorFeature->content, 150, '...') !!}</p>
                                        <iframe width="100%" height="305px" src="https://www.youtube.com/embed/{{ $authorFeature->video_url }}" frameborder="0" allowfullscreen></iframe>
                                    @endif
                                </div>

                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
    <!-- /Latest video grid -->

    @if(count($partners) > 0)
    <!-- Sponsor slideset -->
    <div class="section">
        <div class="sponsor-slideset">
            <div class="uk-container uk-container-center">
                <div class="section-heading-large">
                    <h3>
                        @lang('visitor.partner')
                    </h3>
                </div>

                <div class="section-bg__white">
                    <div class="uk-panel sponsor-slideset__wrapper">
                        <div>
                            <div data-uk-slideset="{small: 2, medium: 4, large: 6, animation: 'slide-horizontal', autoplay: true}">
                                <div class="uk-slidenav-position">
                                    <ul class="sponsor-slideset__list uk-grid uk-grid-collapse uk-slideset">
                                    @foreach($partners as $partner)
                                        @if($partner->logo_src)
                                        <li>
                                            <a href="{{ $partner->external_url }}" class="uk-display-block">
                                                <img src="{{ asset(str_replace('thumbs', 'uploads', $partner->logo_src)) }}" alt="{{ $partner->company_name }}">
                                            </a>
                                        </li>
                                        @endif
                                    @endforeach
                                    </ul>
                                    <a href="" class="uk-slidenav uk-slidenav-previous" data-uk-slideset-item="previous"></a>
                                    <a href="" class="uk-slidenav uk-slidenav-next" data-uk-slideset-item="next"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="sponsor-slideset__footer">
                        <div class="inner">
                            <a href="#">SEE ALL</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Sponsor slideset -->
    @endif
</div>
@endsection

@push('script_dependencies')
    <script>
        var tracks = [
            @if(!empty($audios))
                @foreach($audios as $key => $audio)
                {
                    "track": '{{ ++$key }}',
                    "name": "{{ $audio->title }}",
                    "length": "{{ $audio->duration }}",
                    "file": "{{ $audio->sound_url }}"
                },
                @endforeach
            @endif
        ];
    </script>
    <script src="{{ asset('js/sound-player.js') }}"></script>
<script src="{{asset('css/owlcarousel/owl.carousel.min.js')}}"></script>
<script>
    $('.owl-carousel').owlCarousel({
        loop:true,
        margin:15,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:3
            },
            1000:{
                items:3
            }
        }
    })
</script>
@endpush

@section('scripts')

@endsection
