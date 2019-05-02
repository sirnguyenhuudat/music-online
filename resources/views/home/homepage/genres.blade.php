<div class="ms_genres_wrapper">
    <div class="row">
        <div class="col-lg-12">
            <div class="ms_heading">
                <h1>{{ trans('home_index.top_genres') }}</h1>
                <span class="veiw_all"><a href="#">{{ trans('home_index.view_more') }}</a></span>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="ms_genres_box">
                <img src="{{ asset(config('bower.home_images') . '/genrs/img1.jpg') }}" alt="" class="img-fluid" />
                <div class="ms_main_overlay">
                    <div class="ms_box_overlay"></div>
                    <div class="ms_play_icon">
                        <img src="{{ asset(config('bower.home_images') . '/svg/play.svg') }}" alt="">
                    </div>
                    <div class="ovrly_text_div">
                        <span class="ovrly_text1"><a href="#">{{ $top_genres[0]->name }}</a></span>
                        <span class="ovrly_text2"><a href="#">{{ trans('home_index.view_song') }}</a></span>
                    </div>
                </div>
                <div class="ms_box_overlay_on">
                    <div class="ovrly_text_div">
                        <span class="ovrly_text1"><a href="#">{{ $top_genres[0]->name }}</a></span>
                        <span class="ovrly_text2"><a href="#">{{ trans('home_index.view_song') }}</a></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="row">
                <div class="col-lg-4">
                    <div class="ms_genres_box">
                        <img src="{{ asset(config('bower.home_images') . '/genrs/img2.jpg') }}" alt="" class="img-fluid" />
                        <div class="ms_main_overlay">
                            <div class="ms_box_overlay"></div>
                            <div class="ms_play_icon">
                                <img src="{{ asset(config('bower.home_images') . '/svg/play.svg') }}" alt="">
                            </div>
                            <div class="ovrly_text_div">
                                <span class="ovrly_text1"><a href="#">{{ $top_genres[1]->name }}</a></span>
                            </div>
                        </div>
                        <div class="ms_box_overlay_on">
                            <div class="ovrly_text_div">
                                <span class="ovrly_text1"><a href="#">{{ $top_genres[1]->name }}</a></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="ms_genres_box">
                        <img src="{{ asset(config('bower.home_images') . '/genrs/img3.jpg') }}" alt="" class="img-fluid" />
                        <div class="ms_main_overlay">
                            <div class="ms_box_overlay"></div>
                            <div class="ms_play_icon">
                                <img src="{{ asset(config('bower.home_images') . '/svg/play.svg') }}" alt="">
                            </div>
                            <div class="ovrly_text_div">
                                <span class="ovrly_text1"><a href="#">{{ $top_genres[2]->name }}</a></span>
                            </div>
                        </div>
                        <div class="ms_box_overlay_on">
                            <div class="ovrly_text_div">
                                <span class="ovrly_text1"><a href="#">{{ $top_genres[2]->name }}</a></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="ms_genres_box">
                        <img src="{{ asset(config('bower.home_images') . '/genrs/img5.jpg') }}" alt="" class="img-fluid" />
                        <div class="ms_main_overlay">
                            <div class="ms_box_overlay"></div>
                            <div class="ms_play_icon">
                                <img src="{{ asset(config('bower.home_images') . '/svg/play.svg') }}" alt="">
                            </div>
                            <div class="ovrly_text_div">
                                <span class="ovrly_text1"><a href="#">{{ $top_genres[3]->name }}</a></span>
                            </div>
                        </div>
                        <div class="ms_box_overlay_on">
                            <div class="ovrly_text_div">
                                <span class="ovrly_text1"><a href="#">{{ $top_genres[3]->name }}</a></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="ms_genres_box">
                        <img src="{{ asset(config('bower.home_images') . '/genrs/img6.jpg') }}" alt="" class="img-fluid" />
                        <div class="ms_main_overlay">
                            <div class="ms_box_overlay"></div>
                            <div class="ms_play_icon">
                                <img src="{{ asset(config('bower.home_images') . '/svg/play.svg') }}" alt="">
                            </div>
                            <div class="ovrly_text_div">
                                <span class="ovrly_text1"><a href="#">{{ $top_genres[4]->name }}</a></span>
                            </div>
                        </div>
                        <div class="ms_box_overlay_on">
                            <div class="ovrly_text_div">
                                <span class="ovrly_text1"><a href="#">{{ $top_genres[4]->name }}</a></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-2">
            <div class="ms_genres_box">
                <img src="{{ asset(config('bower.home_images') . '/genrs/img4.jpg') }}" alt="" class="img-fluid" />
                <div class="ms_main_overlay">
                    <div class="ms_box_overlay"></div>
                    <div class="ms_play_icon">
                        <img src="{{ asset(config('bower.home_images') . '/svg/play.svg') }}" alt="">
                    </div>
                    <div class="ovrly_text_div">
                        <span class="ovrly_text1"><a href="#">{{ $top_genres[5]->name }}</a></span>
                    </div>
                </div>
                <div class="ms_box_overlay_on">
                    <div class="ovrly_text_div">
                        <span class="ovrly_text1"><a href="#">{{ $top_genres[5]->name }}</a></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
