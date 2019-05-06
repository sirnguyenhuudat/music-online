@extends ('home.template')

@section ('title_page')
    {{ $title_page }}
@endsection

@section('content')
    <!-- Header -->
    @include('home.homepage.header')
    <!-- Album Single Section Start-->
    <div class="ms_album_single_wrapper">
        <div class="album_single_data">
            <div class="album_single_img">
                @if($album->picture == '')
                    <img src="{{ asset(config('bower.home_images') . '/weekly/song1.jpg') }}" alt="">
                @else
                    <img src="{{ asset(getThumbName($album->picture, 250, 250)) }}" alt="">
                @endif
            </div>
            <div class="album_single_text">
                <h2>{{ $album->title }}</h2>
                <p class="singer_name">{{ trans('home_album.by') }}{{ $album->artist->name }}</p>
                <div class="album_feature">
                    <a href="#" class="album_date">{{ count($album->tracks) }} {{ trans('home_album.songs') }}</a>
                    <a href="#" class="album_date">{{ trans('home_album.released') }}{{ $album->relate_date }}</a>
                </div>
                <div class="album_btn">
                    <a href="#" class="ms_btn play_btn"><span class="play_all"><img src="{{ asset(config('bower.home_images') . 'svg/play_all.svg') }}" alt="">{{ trans('home_album.play_all') }}</span><span class="pause_all"><img src="{{ asset(config('bower.home_images') . 'svg/pause_all.svg') }}" alt="">{{ trans('home_album.pause') }}</span></a>
                    <a href="#" class="ms_btn"><span class="play_all"><img src="{{ asset(config('bower.home_images') . 'svg/add_q.svg') }}" alt="">{{ trans('home_album.add_to_queue') }}</span></a>
                </div>
            </div>
            <div class="album_more_optn ms_more_icon">
                <span><img src="{{ asset(config('bower.home_images') . 'svg/more.svg') }}" alt=""></span>
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
                                    <a href="#" target="_blank"><span class="opt_icon"><span class="icon icon_playlst"></span></span>
                                        {{ $playlist->title }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
        <!--Song List-->
        <div class="album_inner_list">
            <div class="album_list_wrapper">
                <ul class="album_list_name">
                    <li>#</li>
                    <li>{{ trans('home_album.song_title') }}</li>
                    <li>{{ trans('home_album.artist') }}</li>
                    <li class="text-center">{{ trans('home_album.month_view') }}</li>
                    <li class="text-center">{{ trans('home_index.add_to_favourites') }}</li>
                    <li class="text-center">{{ trans('home_album.more') }}</li>
                </ul>
                @forelse($album->tracks as $key => $track)
                    <ul>
                        <li><a href="javascript:void(0)" class="weekly_play_icon" id="{{ $track->id }}"><span class="play_no">{{ ++$key }}</span><span class="play_hover"></span></a></li>
                        <li><a href="{{ route('track.index', ['id' => $track->id, 'url' => $track->slug . '.html',]) }}">{{ $track->name }}</a></li>
                        <li><a href="#">{{ $track->artist->name }}</a></li>
                        <li class="text-center"><a href="#">{{ $track->month_view }}</a></li>
                        <li class="text-center"><a href="#"><span class="ms_icon1 ms_fav_icon"></span></a></li>
                        <li class="text-center ms_more_icon"><a href="javascript:;"><span class="ms_icon1 ms_active_icon"></span></a>
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
                                                    <a href="{{ route('playlist.add_track', ['playlist_id' => $playlist->id, 'track_id' => $track->id,]) }}" target="_blank"><span class="opt_icon"><span class="icon icon_playlst"></span></span>
                                                        {{ $playlist->title }}
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                @endif
                            </ul>
                        </li>
                    </ul>
                @empty
                @endforelse
            </div>
        </div>
    </div>
    <!-- Main Content Start-->
    <div class="ms_content_wrapper ms_album_content">
        <!-- Comments -->
        @if(count($album->comments) > 0)
            <div class="ms_test_wrapper">
                <div class="ms_heading">
                    <h1>{{ trans('home_album.comments') }} ({{ count($album->comments) }})</h1>
                </div>
                <div class="ms_test_slider swiper-container">
                    <div class="swiper-wrapper">
                        @forelse($album->comments as $comm)
                            <div class="swiper-slide">
                                <div class="ms_test_box">
                                    <div class="ms_test_top">
                                        <div class="ms_test_img">
                                            @if($comm->user->avatar != '')
                                                <img src="{{ asset(getThumbName($comm->user->avatar)) }}" alt="">
                                            @endif
                                        </div>
                                        <div class="ms_test_name">
                                            <h3>{{ $comm->user->name }}</h3>
                                            <span class="cmnt_time">{{ $comm->created_at->diffForHumans() }}</span>
                                        </div>
                                    </div>
                                    <div class="ms_test_para">
                                        <p>{!! $comm->content !!}</p>
                                    </div>
                                </div>
                            </div>
                        @empty
                        @endforelse
                    </div>
                </div>
                <!-- Add Arrows -->
                <div class="swiper-button-next1 slider_nav_next"></div>
                <div class="swiper-button-prev1 slider_nav_prev"></div>
            </div>
    @endif
    <!-- Comment Form section Start-->
        <div class="ms_cmnt_wrapper">
            <div class="ms_heading">
                <h1>{{ trans('home_album.leave_a_comment') }}</h1>
            </div>
            <div class="ms_cmnt_form">
                <form>
                    <div class="ms_input_group">
                        <div class="ms_input">
                            <input type="text" class="form-control" placeholder="{{ trans('home_album.enter_your_name') }}">
                        </div>
                        <div class="ms_input marger_top20">
                            <input type="text" class="form-control" placeholder="{{ trans('home_album.enter_your_email') }}">
                        </div>
                    </div>
                    <div class="ms_input_group1">
                        <div class="ms_input">
                            <textarea name="message" class="form-control" placeholder="{{ trans('home_album.enter_your_comment') }}"></textarea>
                        </div>
                    </div>
                    <div class="ms_input_group2">
                        <div class="ms_input">
                            <button class="ms_btn">{{ trans('home_album.post_your_comment') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!--Main div close-->
    </div>
    <!-- Audio Player Section -->
    @include('home.layouts.player')
    @include('home.layouts.extends');
@endsection


