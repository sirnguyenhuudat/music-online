<?php

namespace App\Http\Controllers\Home;

use App\Http\Requests\UploadTrack;
use App\Repositories\Artist\ArtistEloquentRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Track\TrackEloquentRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class TrackController extends Controller
{
    protected $_trackRepository, $_artistRepository;

    public function __construct()
    {
        $this->setTrackRepositoty();
        $this->setArtistRepositoty();
    }

    public function setTrackRepositoty()
    {
        $this->_trackRepository = new TrackEloquentRepository();
    }

    public function setArtistRepositoty()
    {
        $this->_artistRepository = new ArtistEloquentRepository();
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

    public function upload()
    {
        if (Auth::user()) {
            $data['title_page'] = trans('home_track.upload');
            $data['artists'] = $this->_artistRepository->orderBy('name', 'asc');

            return view('home.upload', $data);
        } else {
            return redirect()->route('home');
        }
    }

    public function uploadTrack(UploadTrack $request)
    {
        if (Auth::user()) {
            $dataInsert = [
                'name' => $request->input('name'),
                'slug' => Str::slug($request->input('name')),
                'user_id' => Auth::id(),
                'author' => $request->input('author'),
                'source' => trans('home_track.music-online'),
                'artist_id' => $request->input('artist_id'),
                'lyric' => trans('home_track.updating'),
            ];
            $dir = 'uploads/' . date('Y-m');
            $dataInsert['path'] = $dir . '/' .saveAudio($dir, $request->file('file'));
            $track = $this->_trackRepository->create($dataInsert);

            return redirect()->route('track.uploaded')->with('success', trans('home_track.upload_success', ['name' => $track->name,]));
        } else {
            return redirect()->route('home');
        }
    }

    public function uploaded()
    {
        if (Auth::user()) {
            $data['title_page'] = trans('home_track.uploaded');
            $data['tracks'] = $this->_trackRepository->getTracksUploadByMember(Auth::id());

            return view('home.uploaded', $data);
        } else {
            return redirect()->route('home');
        }
    }
}
