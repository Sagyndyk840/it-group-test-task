<?php

namespace App\Http\Controllers\Backend\Genre;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Genre\GenreRequest;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UpdateController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \App\Http\Requests\Backend\Genre\GenreRequest  $request
     * @param  \App\Models\Genre  $genre
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke (GenreRequest $request, $id): \Illuminate\Http\RedirectResponse
    {
        $genre = Genre::findOrFail($id);

        $genre->genre_name = $request[ 'genre_name' ];
        $genre->slug = Str::slug($request[ 'genre_name' ]);
        $genre->save();

        return redirect()->route('admin.genre.index');
    }
}
