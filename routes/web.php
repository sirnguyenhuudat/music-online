<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group([
    'prefix' => '/backend',
    'as' => 'backend.',
    'namespace' => 'Backend',
], function () {
    Route::resource('genres', 'GenreController');
    Route::resource('artists', 'ArtistController');
    Route::resource('tracks', 'TrackController');
    Route::resource('albums', 'AlbumController');
    Route::resource('comments', 'CommentController')->only([
        'index',
        'update',
        'destroy',
    ]);
    Route::resource('users', 'UserController');
    Route::resource('roles', 'RoleController');
    Route::get('/login', 'LoginController@showLoginForm');
});

Route::group([
    'prefix' => '/',
    'namespace' => 'Home',
], function () {
    Route::get('home', 'HomeController@index')->name('home');
    // Package Typehead search
    Route::get('search/track', 'HomeController@searchByTrack');
    Route::get('search/album', 'HomeController@searchByAlbum');
    Route::get('search/artist', 'HomeController@searchByArtist');
    // Track
    Route::get('track/{id}', 'TrackController@getTrackByAjax')->where('id', '[0-9]+');
    Route::get('track/{id}/{url}', 'TrackController@index')->name('track.index')->where('id', '[0-9]+');
    // Album
    Route::get('albums/{url}', 'AlbumController@index')->name('albums');
    Route::get('album/{id}/{url}', 'AlbumController@detail')->name('album.detail')->where('id', '[0-9]+');
    // Genre
    Route::get('genres/{url}', 'GenreController@index')->name('genres');
//    Route::get('genres/{id}/{url}', 'GenreController@detail')->name('genre.detail')->where('id', '[0-9]+');
    // Member
    Route::get('profile/{id}/{url}', 'MemberController@profile')->name('member.profile')->where('id', '[0-9]+');
    Route::get('setting/{id}/{url}', 'MemberController@setting')->name('member.setting')->where('id', '[0-9]+');
    Route::put('setting/{id}', 'MemberController@update')->name('member.update')->where('id', '[0-9]+');
    // Playlist manage
    Route::get('playlist/list-playlist.html', 'PlaylistController@getPlaylistByMember')->name('playlist.get_playlist_by_member');
    Route::post('playlist', 'PlaylistController@store')->name('playlist.store');
    Route::get('playlist/{id}/{url}', 'PlaylistController@show')->name('playlist.show')->where('id', '[0-9]+');
    Route::delete('playlist/{id}', 'PlaylistController@destroy')->name('playlist.destroy')->where('id', '[0-9]+');
    Route::get('playlist/add_track/{playlist_id}/{track_id}', 'PlaylistController@addTrackToPlaylist')->name('playlist.add_track')->where([
        'playlist_id' => '[0-9]+',
        'track_id' => '[0-9]+',
    ]);
    Route::delete('playlist/remove_track/{playlist_id}/{track_id}', 'PlaylistController@removeTrackToPlaylist')->name('playlist.remove_track')->where([
        'playlist_id' => '[0-9]+',
        'track_id' => '[0-9]+',
    ]);
    // Upload
    Route::get('upload.html', 'TrackController@upload')->name('track.upload');
    Route::post('upload.html', 'TrackController@uploadTrack')->name('track.upload_track');
    Route::get('uploaded.html', 'TrackController@uploaded')->name('track.uploaded');
});

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
