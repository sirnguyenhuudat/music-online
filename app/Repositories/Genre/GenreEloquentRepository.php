<?php
namespace App\Repositories\Genre;

use App\Repositories\EloquentRepository;
use App\Models\Genre;

class GenreEloquentRepository extends EloquentRepository
{

    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return Genre::class;
    }

    public function getTopGenres()
    {
        return $this->_model->orderBy('order', 'desc')->limit(config('conf.genre_getTopGenres_limit'))->get();
    }
}
