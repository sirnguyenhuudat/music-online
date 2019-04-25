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
}
