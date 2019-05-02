@extends ('home.template')

@section ('title_page')
    {{ $title_page }}
@endsection

@section('content')
    <div class="ms_content_wrapper padder_top80">
        <!-- Header -->
        @include ('home.homepage.header')
        @forelse ($genres as $genre)
            <div class="ms_rcnt_slider marger_top60">
                <div class="ms_heading">
                    <h1>{{ $genre->name }}</h1>
                </div>
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        @forelse ($genre->tracks as $key => $track)
                            <div class="swiper-slide">
                                <div class="ms_rcnt_box">
                                    <div class="ms_rcnt_box_img">
                                        @if ($track->artist->avatar == '')
                                            <img src="{{ asset(config('bower.home_images') . 'music/r_music1.jpg') }}" alt="">
                                        @else
                                            <img src="{{ asset(getThumbName($track->albums->picture, 250, 250)) }}" alt="">
                                        @endif
                                        <div class="ms_main_overlay">
                                            <div class="ms_box_overlay"></div>
                                            <div class="ms_more_icon">
                                                <img src="{{ asset(config('bower.home_images') . 'svg/more.svg') }}" alt="">
                                            </div>
                                            <ul class="more_option">
                                                <li>
                                                    <a href="#">
                                                        <span class="opt_icon"><span class="icon icon_fav"></span></span>{{ trans('home_index.add_to_favourites') }}
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <span class="opt_icon"><span class="icon icon_queue"></span></span>{{ trans('home_index.add_to_queue') }}
                                                    </a>
                                                </li>
                                                @if (Auth::user() && count(Auth::user()->playlists) > 0)
                                                    <li><a><span class="opt_icon"><span class="icon icon_playlst"></span></span>{{ trans('home_index.add_to_playlist') }}</a>
                                                        <ul>
                                                            @foreach (Auth::user()->playlists as $playlist)
                                                                <li>
                                                                    <a href="{{ route('playlist.add_track', ['playlist_id' => $playlist->id, 'track_id' => $trackOfWeek->id,]) }}" target="_blank"><span class="opt_icon"><span class="icon icon_playlst"></span></span>
                                                                        {{ $playlist->title }}
                                                                    </a>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </li>
                                                @endif
                                            </ul>
                                            <div class="ms_play_icon">
                                                <img src="{{ asset(config('bower.home_images') . 'svg/play.svg') }}" alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ms_rcnt_box_text">
                                        <h3><a href="{{ route('track.index', ['id' => $track->id, 'url' => $track->slug . '.html',]) }}">{{ $track->name }}</a></h3>
                                        <p>{{ $track->artist->name }}</p>
                                    </div>
                                </div>
                            </div>
                            @if ($key == config('conf.view_number_track_on_one_genre'))
                                @break
                            @endif
                        @empty
                        @endforelse
                    </div>
                </div>
            </div>
        @empty
        @endforelse
    </div>
@endsection

@section ('style')
@endsection

@section ('script')
@endsection
