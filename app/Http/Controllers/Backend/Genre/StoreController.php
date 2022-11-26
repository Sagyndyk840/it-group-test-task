<?php

namespace App\Http\Controllers\Backend\Genre;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Genre\GenreRequest;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class StoreController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \App\Http\Requests\Backend\Genre\GenreRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke (GenreRequest $request): \Illuminate\Http\RedirectResponse
    {
        Genre::create([
            'genre_name' => $request[ 'genre_name' ],
            'slug'       => Str::slug($request[ 'genre_name' ]),
        ]);

        return redirect()->route('admin.genre.index');
    }
}
