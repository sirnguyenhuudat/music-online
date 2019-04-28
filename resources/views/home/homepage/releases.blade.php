        <div class="ms_releases_wrapper">
            <div class="ms_heading">
                <h1>{{ trans('home_index.new_releases') }}</h1>
                <span class="veiw_all"><a href="#">{{ trans('home_index.view_more') }}</a></span>
            </div>
            <div class="ms_release_slider swiper-container">
                <div class="ms_divider"></div>
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="ms_release_box">
                            <div class="w_top_song">
                                <span class="slider_dot"></span>
                                <div class="w_tp_song_img">
                                    <img src="{{ asset(config('bower.home_images') . '/weekly/song1.jpg') }}" alt="">
                                    <div class="ms_song_overlay">
                                    </div>
                                    <div class="ms_play_icon">
                                        <img src="{{ asset(config('bower.home_images') . '/svg/play.svg') }}" alt="">
                                    </div>
                                </div>
                                <div class="w_tp_song_name">
                                    {{--<h3><a href="#">{{ $release->name }}</a></h3>--}}
                                    {{--<p>{{ $release->artist->name }}</p>--}}
                                </div>
                            </div>
                            <div class="weekly_right">
                                {{--<span class="w_song_time">{{ $release->length }}</span>--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Add Arrows -->
            <div class="swiper-button-next2 slider_nav_next"></div>
            <div class="swiper-button-prev2 slider_nav_prev"></div>
        </div>
