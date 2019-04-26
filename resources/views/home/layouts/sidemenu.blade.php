<div class="ms_sidemenu_wrapper">
    <div class="ms_nav_close">
        <i class="fa fa-angle-right" aria-hidden="true"></i>
    </div>
    <div class="ms_sidemenu_inner">
        <div class="ms_logo_inner">
            <div class="ms_logo">
                <a href="index-2.html">
                    <img src="{{ asset(config('bower.home_images') . '/logo.png') }}" alt="" class="img-fluid"/>
                </a>
            </div>
            <div class="ms_logo_open">
                <a href="index-2.html">
                    <img src="{{ asset(config('bower.home_images') . '/open_logo.png') }}" alt="" class="img-fluid"/>
                </a>
            </div>
        </div>
        <div class="ms_nav_wrapper">
            <ul>
                <li>
                    <a href="index-2.html" class="active" title="Discover">
						<span class="nav_icon">
							<span class="icon icon_discover"></span>
						</span>
                        <span class="nav_text">
							{{ trans('home_index.discover') }}
						</span>
                    </a>
                </li>
                <li>
                    <a href="album.html" title="Albums">
						<span class="nav_icon">
							<span class="icon icon_albums"></span>
						</span>
                        <span class="nav_text">
                            {{ trans('home_index.albums') }}
						</span>
                    </a>
                </li>
                <li>
                    <a href="artist.html" title="Artists">
						<span class="nav_icon">
							<span class="icon icon_artists"></span>
						</span>
                        <span class="nav_text">
                            {{ trans('home_index.artists') }}
						</span>
                    </a>
                </li>
                <li>
                    <a href="genres.html" title="Genres">
						<span class="nav_icon">
							<span class="icon icon_genres"></span>
						</span>
                        <span class="nav_text">
                            {{ trans('home_index.genres') }}
						</span>
                    </a>
                </li>
                <li>
                    <a href="top_track.html" title="Top Tracks">
						<span class="nav_icon">
							<span class="icon icon_tracks"></span>
						</span>
                        <span class="nav_text">
                            {{ trans('home_index.top_tracks') }}
						</span>
                    </a>
                </li>
                <li>
                    <a href="free_music.html" title="Free Music">
						<span class="nav_icon">
							<span class="icon icon_music"></span>
						</span>
                        <span class="nav_text">
                            {{ trans('home_index.free_music') }}
						</span>
                    </a>
                </li>
            </ul>
            <ul class="nav_downloads">
                <li>
                    <a href="download.html" title="Downloads">
						<span class="nav_icon">
							<span class="icon icon_download"></span>
						</span>
                        <span class="nav_text">
                            {{ trans('home_index.downloads') }}
						</span>
                    </a>
                </li>
                <li>
                    <a href="purchase.html" title="Purchased">
						<span class="nav_icon">
							<span class="icon icon_purchased"></span>
						</span>
                        <span class="nav_text">
                            {{ trans('home_index.purchased') }}
						</span>
                    </a>
                </li>
                <li>
                    <a href="favourite.html" title="Favourites">
						<span class="nav_icon">
							<span class="icon icon_favourite"></span>
						</span>
                        <span class="nav_text">
                            {{ trans('home_index.favourites') }}
						</span>
                    </a>
                </li>
                <li>
                    <a href="history.html" title="History">
						<span class="nav_icon">
							<span class="icon icon_history"></span>
						</span>
                        <span class="nav_text">
                            {{ trans('home_index.history') }}
						</span>
                    </a>
                </li>
            </ul>
            <ul class="nav_playlist">
                <li>
                    <a href="feature_playlist.html" title="Featured Playlist">
						<span class="nav_icon">
							<span class="icon icon_fe_playlist"></span>
						</span>
                        <span class="nav_text">
                            {{ trans('home_index.featured_playlist') }}
						</span>
                    </a>
                </li>
                <li>
                    <a href="add_playlist.html" title="Create Playlist">
						<span class="nav_icon">
							<span class="icon icon_c_playlist"></span>
						</span>
                        <span class="nav_text">
                            {{ trans('home_index.create_playlist') }}
						</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
