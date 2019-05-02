<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\StoreTrack;
use App\Http\Requests\UpdateTrack;
use App\Repositories\Artist\ArtistEloquentRepository;
use App\Repositories\Track\TrackEloquentRepository;
use App\Repositories\Genre\GenreEloquentRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class TrackController extends Controller
{
    protected $_trackRepository, $_genreRepository, $_artistRepository;

    public function __construct ()
    {
        $artistRepository = new ArtistEloquentRepository();
        $genreRepository = new GenreEloquentRepository();
        $trackRepository = new TrackEloquentRepository();
        $this->setArtistRepository($artistRepository);
        $this->setGenreRepository($genreRepository);
        $this->setTrackRepository($trackRepository);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title_page'] = trans('backend_track.index_title');
        $data['tracks'] = $this->_trackRepository->getAll();

        return view('backend.tracks.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title_page'] = trans('backend_track.create_title');
        $data['genres'] = $this->_genreRepository->getAll();
        $data['artists'] = $this->_artistRepository->orderBy('name');

        return view('backend.tracks.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTrack $request)
    {
        $dataInsert = [
            'name' => $request->input('name'),
            'slug' => Str::slug($request->input('name')),
            'author' => $request->input('author'),
            'artist_id' => $request->input('artist_id'),
            'path' => $request->input('path'),
            'source' => $request->input('source'),
            'lyric' => $request->input('lyric'),
        ];
        $track = $this->_trackRepository->create($dataInsert);
        $genres_id = $request->input('genres');
        $track->genres()->sync($genres_id);

        return redirect()->route('backend.tracks.index')->with('success', trans('backend_track.created', [
            'name' => $track->name,
        ]));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $track = $this->_trackRepository->find($id);
        if ($track) {
            $data['title_page'] = trans('backend_track.update_title', [
                'name' => $track->name,
            ]);
            $data['track'] = $track;
            $data['genres'] = $this->_genreRepository->getAll();
            $data['artists'] = $this->_artistRepository->orderBy('name');

            return view('backend.tracks.edit', $data);
        } else {
            return redirect()->route('backend.tracks.index')->with('error', trans('backend_track.error'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTrack $request, $id)
    {
        $track = $this->_trackRepository->find($id);
        if ($track) {
            $dataUpdate = [
                'name' => $request->input('name'),
                'slug' => Str::slug($request->input('name')),
                'author' => $request->input('author'),
                'artist_id' => $request->input('artist_id'),
                'path' => $request->input('path'),
                'source' => $request->input('source'),
                'lyric' => $request->input('lyric'),
            ];
            $this->_trackRepository->update($id, $dataUpdate);
            $genres_id = $request->input('genres');
            $track->genres()->sync($genres_id);

            return redirect()->route('backend.tracks.index')->with('success', trans('backend_track.updated', [
                'name' => $dataUpdate['name'],
            ]));
        } else {
            return redirect()->route('backend.tracks.index')->with('error', trans('backend_track.error'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $track = $this->_trackRepository->find($id);
        if ($track) {
            $this->_trackRepository->delete($id);

            return redirect()->route('backend.tracks.index')->with('success', trans('backend_track.deleted', [
                'name' => $track->name,
            ]));
        } else {
            return redirect()->route('backend.tracks.index')->with('error', trans('backend_track.error'));
        }
    }

    public function setGenreRepository(GenreEloquentRepository $_genreRepository)
    {
        $this->_genreRepository = $_genreRepository;
    }

    public function setArtistRepository(ArtistEloquentRepository $_artistRepository)
    {
        $this->_artistRepository = $_artistRepository;
    }

    public function setTrackRepository(TrackEloquentRepository $_trackRepository)
    {
        $this->_trackRepository = $_trackRepository;
    }
}