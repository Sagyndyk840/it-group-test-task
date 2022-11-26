<?php

namespace App\Http\Controllers\Backend\Movie;

use App\Http\Controllers\Controller;
use App\Models\Genre;
use Illuminate\Http\Request;

class CreateController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function __invoke (): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $genres = Genre::all();
        return view('backend.movie.create', [
            'genres' => $genres
        ]);
    }
}
