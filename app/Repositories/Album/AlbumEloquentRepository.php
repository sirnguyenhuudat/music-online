<?php
namespace App\Repositories\Album;

use App\Repositories\EloquentRepository;
use App\Models\Album;

class AlbumEloquentRepository extends EloquentRepository
{
    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return Album::class;
    }

    public function getFeaturedAlbums()
    {
        return $this->_model->orderBy('featured', 'desc')->limit(config('conf.album_getFeaturedAlbums_limit'))->get();
    }

    public function getTrendingAlbums()
    {
        return $this->_model->orderBy('week_view', 'desc')->limit(config('conf.album_getTrendingAlbums_limit'))->get();
    }

    public function getTop15Albums()
    {
        return $this->_model->orderBy('views', 'desc')->limit(config('conf.album_getTop15Albums_limit'))->get();
    }

    public function getRelateAlbums()
    {
        return $this->_model->orderBy('relate_date', 'desc')->limit(config('conf.album_getRelateAlbums_limit'))->get();
    }

    public function getAlbumsByTitle($albumTitle)
    {
        return $this->_model->where('title', 'like', '%' . $albumTitle . '%')->get();
    }
}
