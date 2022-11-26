<?php

namespace App\Http\Controllers\Backend\Movie;

use App\Http\Controllers\Controller;
use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Http\Request;

class EditController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function __invoke ($id): \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    {
        $movie = Movie::with('genres')->findOrFail($id);
        $genres = Genre::all();
        return view('backend.movie.edit', [
            'movie'  => $movie,
            'genres' => $genres
        ]);
    }
}
