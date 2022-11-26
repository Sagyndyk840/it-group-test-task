<?php

namespace App\Http\Controllers\Backend\Movie;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use Illuminate\Http\Request;

class DestroyController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke ($id): \Illuminate\Http\RedirectResponse
    {
        Movie::findOrFail($id)->delete();

        return redirect()->route('admin.movie.index');
    }
}
