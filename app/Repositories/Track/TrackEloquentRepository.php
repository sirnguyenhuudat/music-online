<?php
namespace App\Repositories\Track;

use App\Repositories\EloquentRepository;
use App\Models\Track;

class TrackEloquentRepository extends EloquentRepository
{
    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return Track::class;
    }
}
