<?php

namespace App\Http\Controllers\Api\Genre;

use App\Http\Controllers\Controller;
use App\Models\Genre;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param $slug
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke($slug): \Illuminate\Http\JsonResponse
    {
        $genre = Genre::with('movies')
            ->where('slug', $slug)
            ->firstOrFail();

        return response()->json($genre);
    }
}
