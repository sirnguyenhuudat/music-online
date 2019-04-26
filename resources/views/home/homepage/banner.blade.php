        <div class="ms-banner">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="ms_banner_img">
                            <img src="{{ asset(config('bower.home_images') . '/banner.png') }}" alt="" class="img-fluid">
                        </div>
                        <div class="ms_banner_text">
                            <h1>{{ trans('home_index.banner_title') }}</h1>
                            <h1 class="ms_color">{{ trans('home_index.banner_slogan') }}</h1>
                            <p>{{ trans('home_index.banner_content') }}</p>
                            <div class="ms_banner_btn">
                                <a href="#" class="ms_btn">{{ trans('home_index.listen_now') }}</a>
                                <a href="#" class="ms_btn">{{ trans('home_index.add_to_queue') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
