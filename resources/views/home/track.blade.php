@extends ('home.template')

@section ('title_page')
    {{ $title_page }}
@endsection

@section('content')
    <div class="ms_content_wrapper padder_top80">
        <!-- Header -->
        @include('home.homepage.header')
        <!-- track single -->
        <div class="ms_blog_single_wrapper">
            <div class="row">
                <div class="col-lg-8 col-md-8">
                    <div class="ms_blog_single">
                        <div class="blog_single_img">
                            @include('home.track.player-audio')
                        </div>
                        <div class="blog_single_content">
                            <h3 class="ms_blog_title">{{ $track->name }} - <i>{{ $track->artist->name }}</i></h3>
                            <div class="ms_post_meta">
                                <ul>
                                    <li>{{ $track->created_at }} / </li>
                                    <li>{{ count($track->comments) }} {{ trans('home_track.comments') }}  </li>
                                </ul>
                            </div>
                            <blockquote>{{ trans('home_track.lyric') }}</blockquote>
                            <p>
                                @php
                                    $lyric = str_replace("\r\n", "<br/>", $track->lyric);
                                 @endphp
                                {!! $lyric !!}
                            </p>
                        </div>
                        <!--Blog Comment Form-->
                        @if (Auth::user())
                        <div class="blog_comments_forms">
                            <h1>{{ trans('home_track.leave_a_comment') }}</h1>
                            @if (session('success'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('success') }}
                                </div>
                                <br><br>
                            @endif
                            <form action="{{ route('comment.save', ['type' => 'track-' . $track->id, 'url' => $track->slug . '.html',]) }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="comment_input_wrapper">
                                            <input name="name" value="{{ Auth::user()->name }}" type="text" class="cmnt_field" placeholder="{{ trans('home_track.your_name') }}" disabled>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="comment_input_wrapper">
                                            <input name="email" value="{{ Auth::user()->email }}" type="email" class="cmnt_field" placeholder="{{ trans('home_track.your_email') }}" disabled>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <div class="comment_input_wrapper {{ $errors->has('comment') ? 'has-warning' : '' }}">
                                            <textarea id="comment" name="comment" class="cmnt_field {{ $errors->has('comment') ? 'is-invalid' : '' }}" placeholder="{{ trans('home_track.your_comment') }}">{{ old('comment') }}</textarea>
                                        </div>
                                        <small class="form-text text-muted">{{ $errors->first('comment') }}</small>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <div class="comment-form-submit">
                                            <input name="submit" type="submit" id="comment-submit" class="submit ms_btn" value="{{ trans('home_track.post_comment') }}">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <!--Sidebar Start-->
                    <div class="ms_sidebar">
                        <div class="blog_comments">
                            @if(count($track->comments))
                                <h1>{{ trans('home_track.comments') }}</h1>
                            @endif
                            @forelse($track->comments->where('status', 1) as $comm)
                                <ol>
                                    <li>
                                        <div class="ms_comment_section">
                                            <div class="comment_img">
                                                @if($comm->user->avatar != '')
                                                    <img src="{{ asset(getThumbName($comm->user->avatar)) }}" alt="">
                                                @else
                                                    <img src="{{ asset(config('bower.home_images') . 'logo.png') }}" alt="">
                                                @endif
                                            </div>
                                            <div class="comment_info">
                                                <div class="comment_head">
                                                    <h3>{{ $comm->user->name }}</h3>
                                                    <p>{{ $comm->created_at->diffForHumans() }}</p>
                                                    <div>{{ $comm->content }}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ol>
                            @empty
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section ('style')
    <style>
        .jp_queue_wrapper {
            display: none;
        }
        small.form-text {
            color: red !important;
        }
    </style>
@endsection

@section ('script')
    <script type="text/javascript">
        $(function() {
            'use strict';
            if ($('.audio-player').length) {
                var myPlayListOtion = '<ul class="more_option"><li><a href="#"><span class="opt_icon" title="Add To Favourites"><span class="icon icon_fav"></span></span></a></li><li><a href="#"><span class="opt_icon" title="Add To Queue"><span class="icon icon_queue"></span></span></a></li><li><a href="#"><span class="opt_icon" title="Download Now"><span class="icon icon_dwn"></span></span></a></li><li><a href="#"><span class="opt_icon" title="Add To Playlist"><span class="icon icon_playlst"></span></span></a></li><li><a href="#"><span class="opt_icon" title="Share"><span class="icon icon_share"></span></span></a></li></ul>';
                var myPlaylist = new jPlayerPlaylist({
                    jPlayer: '#jquery_jplayer_1',
                    cssSelectorAncestor: '#jp_container_1'
                }, [{
                    image : '{{ $track->artist->avatar != '' ? asset(getThumbName($track->artist->avatar)) : asset(config('bower.home_images') . 'logo.png') }}',
                    title: '{{ $track->name }}',
                    artist: '{{ $track->artist->name }}',
                    mp3: '{{ $track->source == 'Music Online' ? url('/') . '/' . $track->path : convertURL($track->path) }}',
                    option : myPlayListOtion
                }], {
                    swfPath: 'js/plugins',
                    supplied: 'oga, mp3',
                    wmode: 'window',
                    useStateClassSkin: true,
                    autoBlur: false,
                    smoothPlayBar: true,
                    keyEnabled: true,
                    playlistOptions: {
                        autoPlay: false
                    }
                });
                $('#jquery_jplayer_1').on($.jPlayer.event.ready + ' ' + $.jPlayer.event.play, function(event) {
                    var current = myPlaylist.current;
                    var playlist = myPlaylist.playlist;
                    $.each(playlist, function(index, obj) {
                        if (index == current) {
                            $('.jp-now-playing').html('<div class="jp-track-name"><span class="que_img"><img src="'+obj.image+'"></span><div class="que_data">' + obj.title + ' <div class="jp-artist-name">' + obj.artist + '</div></div></div>');
                        }
                    });
                    $('.knob-wrapper').mousedown(function() {
                        $(window).mousemove(function(e) {
                            var angle1 = getRotationDegrees($('.knob')),
                                volume = angle1 / 270

                            if (volume > 1) {
                                $('#jquery_jplayer_1').jPlayer('volume', 1);
                            } else if (volume <= 0) {
                                $('#jquery_jplayer_1').jPlayer('mute');
                            } else {
                                $('#jquery_jplayer_1').jPlayer('volume', volume);
                                $('#jquery_jplayer_1').jPlayer('unmute');
                            }
                        });

                        return false;
                    }).mouseup(function() {
                        $(window).unbind('mousemove');
                    });

                    function getRotationDegrees(obj) {
                        var matrix = obj.css('-webkit-transform') || obj.css('-moz-transform') || obj.css('-ms-transform') || obj.css('-o-transform') || obj.css('transform');
                        if(matrix !== 'none') {
                            var values = matrix.split('(')[1].split(')')[0].split(',');
                            var a = values[0];
                            var b = values[1];
                            var angle = Math.round(Math.atan2(b, a) * (180/Math.PI));
                        } else { var angle = 0; }

                        return (angle < 0) ? angle + 360 : angle;
                    }
                    var timeDrag = false;
                    $('.jp-play-bar').mousedown(function(e) {
                        timeDrag = true;
                        updatebar(e.pageX);
                    });
                    $(document).mouseup(function(e) {
                        if (timeDrag) {
                            timeDrag = false;
                            updatebar(e.pageX);
                        }
                    });
                    $(document).mousemove(function(e) {
                        if (timeDrag) {
                            updatebar(e.pageX);
                        }
                    });
                    var updatebar = function(x) {
                        var progress = $('.jp-progress');
                        var position = x - progress.offset().left;
                        var percentage = 100 * position / progress.width();
                        if (percentage > 100) {
                            percentage = 100;
                        }
                        if (percentage < 0) {
                            percentage = 0;
                        }
                        $('#jquery_jplayer_1').jPlayer('playHead', percentage);
                        $('.jp-play-bar').css('width', percentage + '%');
                    };
                    $('#playlist-toggle, #playlist-text, #playlist-wrap li a').unbind().on('click', function() {
                        $('#playlist-wrap').fadeToggle();
                        $('#playlist-toggle, #playlist-text').toggleClass('playlist-is-visible');
                    });
                    $('.hide_player').unbind().on('click', function() {
                        $('.audio-player').toggleClass('is_hidden');
                        $(this).html($(this).html() == '<i class="fa fa-angle-down"></i> HIDE' ? '<i class="fa fa-angle-up"></i> SHOW PLAYER' : '<i class="fa fa-angle-down"></i> HIDE');
                    });
                    $('body').unbind().on('click', '.audio-play-btn', function() {
                        $('.audio-play-btn').removeClass('is_playing');
                        $(this).addClass('is_playing');
                        var playlistId = $(this).data('playlist-id');
                        myPlaylist.play(playlistId);
                    });
                });
            }
        });
    </script>
@endsection
