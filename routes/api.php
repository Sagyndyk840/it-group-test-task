<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
 * Use genre controllers.
 */

use App\Http\Controllers\Api\Genre\IndexController as GenreApiIndexController;
use App\Http\Controllers\Api\Genre\ShowController as GenreApiShowController;

/*
 * Use movie controllers.
 */

use App\Http\Controllers\Api\Movie\IndexController as MovieApiIndexController;
use App\Http\Controllers\Api\Movie\ShowController as MovieApiShowController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

/*
 * Api routes.
 */

Route::group([
    'middleware' => 'api'
], function () {

    /*
     * Genre routes.
     */

    Route::get('genres', GenreApiIndexController::class);
    Route::get('genre/{slug}', GenreApiShowController::class);

    /*
     * Movie routes.
     */

    Route::get('movies', MovieApiIndexController::class);
    Route::get('movie/{slug}', MovieApiShowController::class);
});
