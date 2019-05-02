<?php

namespace App\Http\Controllers\Home;

use App\Repositories\Genre\GenreEloquentRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GenreController extends Controller
{
    protected $_genreRepository;

    public function __construct(GenreEloquentRepository $_genreRepository)
    {
        $this->_genreRepository = $_genreRepository;
    }

    public function index()
    {
        $data['title_page']  = trans('home_genre.title_page');
        $data['genres'] = $this->_genreRepository->getAll();

        return view('home.genre', $data);
    }
}
