<?php

namespace App\Http\Controllers\Api\Movie;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke($slug): \Illuminate\Http\JsonResponse
    {
        $movie = Movie::with('genres')->where('slug', $slug)->firstOrFail();

        return response()->json($movie);
    }
}
