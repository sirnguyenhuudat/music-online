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
});
