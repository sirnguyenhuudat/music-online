<?php

namespace App\Providers;

use App\Repositories\Track\TrackEloquentRepository;
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
    public function boot()
    {
        $this->setTrackRepository();
        $tracksTrending = $this->_trackRepository->getTracksTrending();
        View::share('tracksTrending', $tracksTrending);
    }

    public function setTrackRepository()
    {
        $this->_trackRepository = new TrackEloquentRepository();
    }
}
