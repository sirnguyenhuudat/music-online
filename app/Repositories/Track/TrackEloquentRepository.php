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

    public function listTrack()
    {
        return $this->_model->orderBy('trending', 'desc')->orderBy('id', 'desc')->get();
    }

    public function getTracksWeekly()
    {
        return $this->_model->orderBy('week_view', 'desc')->limit(config('conf.track_getTracksWeekly_limit'))->get();
    }

    public function getReleaseTracks()
    {
        return $this->_model->orderBy('created_at', 'desc')->limit(config('conf.track_getReleaseTracks_limit'))->get();
    }

    public  function getTracksUploadByMember($id)
    {
        return $this->_model->where('user_id', $id)->orderBy('id', 'desc')->paginate(config('conf.track_getTracksUploadByMember_paginate'));
    }

    public function getTracksByName($trackName)
    {
        return $this->_model->where('name', 'like', '%' . $trackName . '%')->get();
    }

    public function getTracksByArrId(Array $arrTrackId)
    {
        return $this->_model->whereIn('id', $arrTrackId)->get();
    }

    public function getTracksTrending()
    {
        return $this->_model->select(['name', 'id', 'slug'])->where('trending', 1)->get();
    }

    public function getFullTracksTrending()
    {
        return $this->_model->where('trending', 1)->get();
    }
}
