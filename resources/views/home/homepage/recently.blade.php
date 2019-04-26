        <div class="ms_rcnt_slider">
            <div class="ms_heading">
                <h1>{{ trans('home_index.recently_played') }}</h1>
                <span class="veiw_all"><a href="#">{{ trans('home_index.view_more') }}</a></span>
            </div>
            <div class="swiper-container">
                <div class="swiper-wrapper">
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
                                        <<li><a href="#"><span class="opt_icon"><span class="icon icon_fav"></span></span>{{ trans('home_index.add_to_favourites') }}</a></li>
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
                                {{--<h3><a href="#">{{ $recently->name }}</a></h3>--}}
                                {{--<p>{{ $recently->artist->name }}</p>--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Add Arrows -->
            <div class="swiper-button-next slider_nav_next"></div>
            <div class="swiper-button-prev slider_nav_prev"></div>
        </div>
