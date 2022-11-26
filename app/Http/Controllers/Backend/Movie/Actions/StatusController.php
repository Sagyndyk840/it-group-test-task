<?php

namespace App\Http\Controllers\Backend\Movie\Actions;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke ($id): \Illuminate\Http\RedirectResponse
    {
        $get_status = Movie::select('movie_status')->where('id', $id)->first();

        if ($get_status->movie_status == 1) {
            $movie_status = 0;
        } else {
            $movie_status = 1;
        }

        Movie::where('id', $id)->update([
            'movie_status' => $movie_status
        ]);

        return redirect()->back();
    }
}
