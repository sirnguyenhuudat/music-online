<?php
namespace App\Repositories\Artist;

use App\Repositories\EloquentRepository;
use App\Models\Artist;

class ArtistEloquentRepository extends EloquentRepository
{
    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return Artist::class;
    }

    public function getFeaturedArtists()
    {
        return $this->_model->orderBy('featured', 'desc')->limit(config('conf.artist_getFeaturedArtists_limit'))->get();
    }

    public function getArtistsByName($artistName)
    {
        return $this->_model->where('title', 'like', '%' . $artistName . '%')->get();
    }

    public function listArtist()
    {
        return $this->_model->orderBy('featured', 'desc')->orderBy('id', 'desc')->get();
    }

    public function getAllArtistExceptsFeatured()
    {
        return $this->_model->where('featured', '0')->get();
    }

    public function getSimilarArtists($id)
    {
        return $this->_model->where('id', '<', $id)->limit(config('conf.artist_getSimilarArtists_limit'))->get();
    }
}
