<?php

namespace App\Http\Controllers\Home;

use App\Repositories\Album\AlbumEloquentRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AlbumController extends Controller
{
    //
    protected $_albumRepository;

    public function __construct(AlbumEloquentRepository $_albumRepository)
    {
        $this->_albumRepository = $_albumRepository;
    }

    public function index($url)
    {
        $data['title_page'] = trans('home_album.title_page');
        $data['featured_albums'] = $this->_albumRepository->getFeaturedAlbums();
        $data['trending_albums'] = $this->_albumRepository->getTrendingAlbums();
        $data['top_15_albums'] = $this->_albumRepository->getTop15Albums();
        $data['release_albums'] = $this->_albumRepository->getRelateAlbums();

        return view('home.album', $data);
    }

    public function detail($id)
    {
        $album = $this->_albumRepository->find($id);
        if ($album) {
            $data['title_page'] = $album->title;
            $data['album'] = $album;

            return view('home.album_detail', $data);
        } else {
            return redirect()->route('home');
        }
    }
}
