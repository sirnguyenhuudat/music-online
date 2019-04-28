        <div class="ms_weekly_wrapper">
            <div class="ms_weekly_inner">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ms_heading">
                            <h1>{{ trans('home_index.weekly_top_15') }}</h1>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 padding_right40">
                        <div class="ms_weekly_box">
                            <div class="weekly_left">
                                <span class="w_top_no">
                                    {{--{{ ++$key }}--}}
                                </span>
                                <div class="w_top_song">
                                    <div class="w_tp_song_img">
                                        <img src="{{ asset(config('bower.home_images') . '/weekly/song1.jpg') }}" alt="" class="img-fluid">
                                        <div class="ms_song_overlay">
                                        </div>
                                        <div class="ms_play_icon">
                                            <img src="{{ asset(config('bower.home_images') . '/svg/play.svg') }}" alt="">
                                        </div>
                                    </div>
                                    <div class="w_tp_song_name">
                                        {{--<h3><a href="#">{{ $weekly->name }}</a></h3>--}}
                                        {{--<p>{{ $weekly->artist->name }}</p>--}}
                                    </div>
                                </div>
                            </div>
                            <div class="weekly_right">
                                {{--<span class="w_song_time">{{ $weekly->length }}</span>--}}
                                <span class="ms_more_icon" data-other="1">
                                    <img src="{{ asset(config('bower.home_images') . '/svg/more.svg') }}" alt="">
                                </span>
                            </div>
                            <ul class="more_option">
                                <li><a href="#"><span class="opt_icon"><span class="icon icon_fav"></span></span>{{ trans('home_index.add_to_favourites') }}</a></li>
                                <li><a href="#"><span class="opt_icon"><span class="icon icon_queue"></span></span>{{ trans('home_index.add_to_queue') }}</a></li>
                                <li><a href="#"><span class="opt_icon"><span class="icon icon_dwn"></span></span>{{ trans('home_index.download_now') }}</a></li>
                                <li><a href="#"><span class="opt_icon"><span class="icon icon_playlst"></span></span>{{ trans('home_index.add_to_playlist') }}</a></li>
                            </ul>
                        </div>
                        <div class="ms_divider"></div>
                    </div>
                    <div class="col-lg-4 col-md-12 padding_right40">
                    </div>
                    <div class="col-lg-4 col-md-12">
                    </div>
                </div>
            </div>
        </div>
