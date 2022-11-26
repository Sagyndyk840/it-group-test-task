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
     * @param $slug
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke ($slug): \Illuminate\Http\JsonResponse
    {
        $movie = Movie::with(['genres','media'])
            ->where('slug', $slug)
            ->firstOrFail();

        return response()->json($movie);
    }
}
