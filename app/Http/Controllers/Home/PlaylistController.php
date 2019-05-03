<?php

namespace App\Http\Controllers\Home;

use App\Http\Requests\StorePlaylist;
use App\Repositories\Playlist\PlaylistEloquentRepository;
use App\Repositories\Track\TrackEloquentRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PlaylistController extends Controller
{
    protected $_playlistRepository, $_trackRepository;

    public function __construct(PlaylistEloquentRepository $playlistRepository, TrackEloquentRepository $trackRepository)
    {
        $this->_playlistRepository = $playlistRepository;
        $this->_trackRepository = $trackRepository;
    }

    public function getPlaylistByMember()
    {
        if (Auth::user()) {
            $id = Auth::id();
            $data['title_page'] = trans('home_playlist.title_page');
            $data['playlists'] = $this->_playlistRepository->getPlaylistByMember($id);

            return view('home.playlist', $data);
        } else {
            return redirect()->route('home');
        }
    }

    public function store(StorePlaylist $request)
    {
        if (Auth::id()) {
            $dataInsert = [
                'title' => $request->input('title'),
                'slug' => Str::slug($request->input('title')),
                'user_id' => Auth::id(),
            ];
            $playlist = $this->_playlistRepository->create($dataInsert);

            return redirect()->route('playlist.get_playlist_by_member')->with('success', trans('home_playlist.created', [
                'title' => $playlist->title,
            ]));
        } else {
            return redirect()->route('home');
        }
    }

    public function show($id)
    {
        $playlist = $this->_playlistRepository->find($id);
        if ($playlist) {
            $data['title_page'] = $playlist->title;
            $data['playlist'] = $playlist;

            return view('home.playlist_detail', $data);
        } else {
            return redirect()->route('home');
        }
    }

    public function destroy($id)
    {
        $playlist = $this->_playlistRepository->find($id);
        if ($playlist && $playlist->user_id == Auth::id()){
            $playlist->delete();

            return redirect()->route('playlist.get_playlist_by_member')->with('success', trans('home_playlist.deleted', [
                'title' => $playlist->title,
            ]));
        } else {
            return redirect()->route('home');
        }
    }

    public function addTrackToPlaylist($playlist_id, $track_id)
    {
        $playlist = $this->_playlistRepository->find($playlist_id);
        $track = $this->_trackRepository->find($track_id);
        if ($playlist && $track) {
            $dataTrackId = [];
            $arrTracks = $playlist->tracks;
            foreach ($arrTracks as $track){
                $dataTrackId[] = $track->id;
            }
            if (!in_array($track_id, $dataTrackId)) {
                $dataTrackId[] = $track_id;
            }
            $playlist->tracks()->sync($dataTrackId);

            return redirect()->route('playlist.show', [
                'id' => $playlist->id,
                'url' => $playlist->slug . '.html',
            ]);
        } else {
            return redirect()->route('home');
        }
    }

    public function removeTrackToPlaylist($playlist_id, $track_id)
    {
        $playlist = $this->_playlistRepository->find($playlist_id);
        $track = $this->_trackRepository->find($track_id);
        if ($playlist && $track) {
            $dataTrackId = [];
            $arrTracks = $playlist->tracks;
            foreach ($arrTracks as $track){
                $dataTrackId[] = $track->id;
            }
            if (in_array($track_id, $dataTrackId)) {
                $key = array_search($track_id, $dataTrackId);
                unset($dataTrackId[$key]);
            }
            $playlist->tracks()->sync($dataTrackId);

            return redirect()->route('playlist.show', [
                'id' => $playlist->id,
                'url' => $playlist->slug . '.html',
            ])->with('success', trans('home_playlist.deleted_track', [
                'track' => $track->name,
            ]));
        } else {
            return redirect()->route('home');
        }
    }
}
