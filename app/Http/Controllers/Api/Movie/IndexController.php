<?php

namespace App\Http\Controllers\Api\Movie;

use App\Http\Controllers\Controller;
use App\Http\Resources\MovieRecource;
use App\Models\Movie;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function __invoke (Request $request): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {

        $movies = Movie::with('genres')
            ->orderBy('id', 'desc')
            ->paginate(10);

        return MovieRecource::collection($movies);
    }
}
