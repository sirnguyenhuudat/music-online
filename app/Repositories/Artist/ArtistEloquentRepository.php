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
}
