<?php

namespace App\Http\Controllers\Api\Genre;

use App\Http\Controllers\Controller;
use App\Models\Genre;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke (Request $request): \Illuminate\Http\JsonResponse
    {
        $genres = Genre::with('movies')
            ->orderBy('id', 'desc')
            ->paginate(5);

        return response()->json($genres);
    }
}
