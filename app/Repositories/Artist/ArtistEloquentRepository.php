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
}
