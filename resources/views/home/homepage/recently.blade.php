        <div class="ms_rcnt_slider">
            <div class="ms_heading">
                <h1>{{ trans('home_index.recently_played') }}</h1>
                <span class="veiw_all"><a href="#">{{ trans('home_index.view_more') }}</a></span>
            </div>
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    @foreach($tracks_recently as $track)
                        <div class="swiper-slide">
                            <div class="ms_rcnt_box">
                                <div class="ms_rcnt_box_img">
                                    <img src="{{ asset(config('bower.home_images') . '/music/r_music1.jpg') }}" alt="">
                                    <div class="ms_main_overlay">
                                        <div class="ms_box_overlay"></div>
                                        <div class="ms_more_icon">
                                            <img src="{{ asset(config('bower.home_images') . '/svg/more.svg') }}" alt="">
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
                                                        @foreach(Auth::user()->playlists as $playlist)
                                                            <li>
                                                                <a href="{{ route('playlist.add_track', ['playlist_id' => $playlist->id, 'track_id' => $track->id,]) }}" target="_blank"><span class="opt_icon"><span class="icon icon_playlst"></span></span>
                                                                    {{ $playlist->title }}
                                                                </a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </li>
                                            @endif
                                        </ul>
                                        <div class="ms_play_icon">
                                            <a href="javascript:void(0)" class="weekly_play_icon" id="{{ $track->id }}"><img src="{{ asset(config('bower.home_images') . '/svg/play.svg') }}" alt=""></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="ms_rcnt_box_text">
                                    <h3><a href="{{ route('track.index', ['id' => $track->id, 'url' => $track->slug . '.html',]) }}">{{ $track->name }}</a></h3>
                                    <p>{{ $track->artist->name }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <!-- Add Arrows -->
            <div class="swiper-button-next slider_nav_next"></div>
            <div class="swiper-button-prev slider_nav_prev"></div>
        </div>
