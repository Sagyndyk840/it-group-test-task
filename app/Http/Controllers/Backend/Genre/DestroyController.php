<?php

namespace App\Http\Controllers\Backend\Genre;

use App\Http\Controllers\Controller;
use App\Models\Genre;
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
        Genre::findOrFail($id)->delete();

        return redirect()->route('admin.genre.index');
    }
}
