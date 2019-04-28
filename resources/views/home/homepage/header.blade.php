        <div class="ms_header">
            <div class="ms_top_left">
                <div class="ms_top_search">
                    <input type="text" class="form-control" placeholder="{{ trans('home_index.search_music_here') }}">
                    <span class="search_icon">
                        <img src="{{ asset(config('bower.home_images') . '/svg/search.svg') }}" alt="">
                    </span>
                </div>
                <div class="ms_top_trend">
                    <span><a href="#"  class="ms_color">{{ trans('home_index.trending_title') }}</a></span> <span class="top_marquee"><a href="#">{{ trans('home_index.trending_content') }}</a></span>
                </div>
            </div>
            <div class="ms_top_right">
                <div class="ms_top_lang">
                    <span data-toggle="modal" data-target="#lang_modal">{{ trans('home_index.langs') }} <img src="{{ asset(config('bower.home_images') . '/svg/lang.svg') }}" alt=""></span>
                </div>
                <div class="ms_top_btn">
                    <a href="javascript:void(0)" class="ms_btn reg_btn" data-toggle="modal" data-target="#myModal"><span>{{ trans('home_index.register') }}</span></a>
                    <a href="javascript:void(0)" class="ms_btn login_btn" data-toggle="modal" data-target="#myModal1"><span>{{ trans('home_index.login') }}</span></a>
                </div>
            </div>
        </div>
