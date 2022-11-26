<?php

use Illuminate\Support\Facades\Route;

/*
 * Use home controller
 */

use App\Http\Controllers\Frontend\IndexController as HomeIndexController;

/*
 * Backend controllers.
 */

/*
 * Backend dashboard controller.
 */

use App\Http\Controllers\Backend\Dashboard\IndexController as BackendDashboardIndex;

/*
 * Backend genre controllers.
 */

use App\Http\Controllers\Backend\Genre\IndexController as GenreIndexController;
use App\Http\Controllers\Backend\Genre\CreateController as GenreCreateController;
use App\Http\Controllers\Backend\Genre\StoreController as GenreStoreController;
use App\Http\Controllers\Backend\Genre\ShowController as GenreShowController;
use App\Http\Controllers\Backend\Genre\EditController as GenreEditController;
use App\Http\Controllers\Backend\Genre\UpdateController as GenreUpdateController;
use App\Http\Controllers\Backend\Genre\DestroyController as GenreDestroyController;

/*
 * Backend movie controllers.
 */

use App\Http\Controllers\Backend\Movie\IndexController as MovieIndexController;
use App\Http\Controllers\Backend\Movie\CreateController as MovieCreateController;
use App\Http\Controllers\Backend\Movie\StoreController as MovieStoreController;
use App\Http\Controllers\Backend\Movie\ShowController as MovieShowController;
use App\Http\Controllers\Backend\Movie\EditController as MovieEditController;
use App\Http\Controllers\Backend\Movie\UpdateController as MovieUpdateController;
use App\Http\Controllers\Backend\Movie\DestroyController as MovieDestroyController;

use App\Http\Controllers\Backend\Movie\Actions\StatusController as MovieStatusController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
 * Frontend routes.
 */

/*
 * Home route.
 */

Route::get('/', HomeIndexController::class)->name('home');

/*
 * Backend routes.
 */

Route::group([
    'prefix' => 'admin',
    'as'     => 'admin.'
], function () {

    Route::get('/', BackendDashboardIndex::class)->name('dashboard');

    /*
     * Genre routes.
     */

    Route::group([
        'prefix' => 'genre',
        'as'     => 'genre.'
    ], function () {
        Route::get('/', GenreIndexController::class)->name('index');
        Route::get('/create', GenreCreateController::class)->name('create');
        Route::post('/store', GenreStoreController::class)->name('store');
        Route::get('/{id}/show', GenreShowController::class)->name('show');
        Route::get('/{id}/edit', GenreEditController::class)->name('edit');
        Route::put('/{id}/update', GenreUpdateController::class)->name('update');
        Route::delete('/{id}/delete', GenreDestroyController::class)->name('delete');
    });

    /*
     * Movie routes.
     */
    Route::group([
        'prefix' => 'movie',
        'as'     => 'movie.'
    ], function () {
        Route::get('/', MovieIndexController::class)->name('index');
        Route::get('/create', MovieCreateController::class)->name('create');
        Route::post('/store', MovieStoreController::class)->name('store');
        Route::get('/{id}/show', MovieShowController::class)->name('show');
        Route::get('/{id}/edit', MovieEditController::class)->name('edit');
        Route::put('/{id}/update', MovieUpdateController::class)->name('update');
        Route::delete('/{id}/delete', MovieDestroyController::class)->name('delete');

        Route::get('/{id}/status', MovieStatusController::class)->name('status');
    });

});
