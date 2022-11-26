<?php

namespace App\Http\Controllers\Backend\Movie;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Movie\MovieRequest;
use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;
use function GuzzleHttp\Promise\all;

class StoreController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \App\Http\Requests\Backend\Movie\MovieRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke (MovieRequest $request): \Illuminate\Http\RedirectResponse
    {

        $movie = Movie::create([
            'movie_name' => $request[ 'movie_name' ],
            'slug'       => Str::slug($request[ 'movie_name' ]),
        ]);

        if ($request->hasFile('avatar') && $request->file('avatar')->isValid()) {
            $movie->addMediaFromRequest('avatar')->toMediaCollection('movies');
        }

        $movie->genres()->attach($request[ 'movie_genres' ]);

        return redirect()->route('admin.movie.index');
    }
}
