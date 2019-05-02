<div class="ms_fea_album_slider">
    <div class="ms_heading">
        <h1>{{ trans('home_index.featured_album') }}</h1>
        <span class="veiw_all"><a href="{{ route('albums', trans('home_album.list-albums')) }}">{{ trans('home_index.view_more') }}</a></span>
    </div>
    <div class="ms_album_slider swiper-container">
        <div class="swiper-wrapper">
            @forelse($featured_albums as $album)
                <div class="swiper-slide">
                    <div class="ms_rcnt_box">
                        <div class="ms_rcnt_box_img">
                            @if ($album->picture == '')
                                <img src="{{ asset(config('bower.home_images') . '/album/album1.jpg') }}" alt="">
                            @else
                                <img src="{{ asset(getThumbName($album->picture, 250, 250)) }}" alt="">
                            @endif
                            <div class="ms_main_overlay">
                                <div class="ms_box_overlay"></div>
                                <div class="ms_more_icon">
                                    <img src="{{ asset(config('bower.home_images') . '/svg/more.svg') }}" alt="">
                                </div>
                                <ul class="more_option">
                                    <li><a href="#"><span class="opt_icon"><span class="icon icon_fav"></span></span>{{ trans('home_index.add_to_favourites') }}</a></li>
                                    <li><a href="#"><span class="opt_icon"><span class="icon icon_queue"></span></span>{{ trans('home_index.add_to_queue') }}</a></li>
                                    <li><a href="#"><span class="opt_icon"><span class="icon icon_dwn"></span></span>{{ trans('home_index.download_now') }}</a></li>
                                    <li><a href="#"><span class="opt_icon"><span class="icon icon_playlst"></span></span>{{ trans('home_index.add_to_playlist') }}</a></li>
                                </ul>
                                <div class="ms_play_icon">
                                    <img src="{{ asset(config('bower.home_images') . '/svg/play.svg') }}" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="ms_rcnt_box_text">
                            <h3><a href="{{ route('album.detail', ['id' => $album->id, 'url' => $album->slug . '.html']) }}">{{ $album->title }}</a></h3>
                            <p>{{ $album->artist->name }}</p>
                        </div>
                    </div>
                </div>
            @empty
            @endforelse
        </div>
    </div>
    <!-- Add Arrows -->
    <div class="swiper-button-next3 slider_nav_next"></div>
    <div class="swiper-button-prev3 slider_nav_prev"></div>
</div>

