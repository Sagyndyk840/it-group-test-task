<?php

namespace App\Http\Controllers\Backend\Movie;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Movie\MovieRequest;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class UpdateController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \App\Http\Requests\Backend\Movie\MovieRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke (MovieRequest $request, $id): \Illuminate\Http\RedirectResponse
    {
        $movie = Movie::findOrFail($id);

        $movie->movie_name = $request[ 'movie_name' ];
        $movie->slug = Str::slug($request[ 'movie_name' ]);
        $movie->save();

        if ($request->hasFile('avatar')) {
            $movie->clearMediaCollection('movies');
            $movie->addMediaFromRequest('avatar')->toMediaCollection('movies');
        }

        $movie->genres()->detach($request[ 'movie_genres' ]);
        $movie->genres()->attach($request[ 'movie_genres' ]);

        return redirect()->route('admin.movie.index');
    }
}
