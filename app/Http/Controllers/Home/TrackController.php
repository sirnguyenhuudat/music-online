<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Track\TrackEloquentRepository;

class TrackController extends Controller
{
    protected $_trackRepository;

    public function __construct()
    {
        $this->setTrackRepositoty();
    }

    public function setTrackRepositoty()
    {
        $this->_trackRepository = new TrackEloquentRepository();
    }

    public function getTrackByAjax(Request $request, $id)
    {
        if ($request->ajax()) {
            $track = $this->_trackRepository->find($id);
            if ($track) {
                $data = [
                    'name' => $track->name,
                    'artist' => $track->artist->name,
                    'path' => convertURL($track->path),
                ];
                if ($track->artist->avatar == '') {
                    $data['picture'] = getThumbName(config('image.icon') . 'artist.png');
                } else {
                    $data['picture'] = getThumbName($track->artist->avatar);
                }
                return response()->json($data);
            }
        }
    }

    public function index($id)
    {
        $track = $this->_trackRepository->find($id);
        if ($track) {
            $data['title_page'] = $track->name;
            $data['track'] = $track;

            return view('home.track', $data);
        } else {
            return redirect()->route('home');
        }
    }
}
