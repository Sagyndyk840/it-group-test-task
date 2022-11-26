<?php

namespace App\Http\Controllers\Api\Movie;

use App\Http\Controllers\Controller;
use App\Http\Resources\MovieRecource;
use App\Models\Movie;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param $slug
     * @return \App\Http\Resources\MovieRecource
     */
    public function __invoke ($slug): MovieRecource
    {
        $movie = Movie::with(['genres'])
            ->where('slug', $slug)
            ->firstOrFail();

        return new MovieRecource($movie);
    }
}
