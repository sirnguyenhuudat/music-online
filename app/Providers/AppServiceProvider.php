<?php

namespace App\Providers;

use App\Repositories\Track\TrackEloquentRepository;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Redis;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    protected $_trackRepository;
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Request $request)
    {
        $tracksTrending = [];
//        $ip = $request->getClientIp();
//        if (Redis::exists($ip . '_tracks_trending')) {
//            $tracksTrending = json_decode(Redis::get($ip . '_tracks_trending'));
//        } else {
            $this->setTrackRepository();
            $tracksTrending = $this->_trackRepository->getTracksTrending();
//            Redis::set($ip . '_tracks_trending', json_encode($tracksTrending), 'EX', 3600);
//        }
        View::share('tracksTrending', $tracksTrending);
    }

    public function setTrackRepository()
    {
        $this->_trackRepository = new TrackEloquentRepository();
    }
}
