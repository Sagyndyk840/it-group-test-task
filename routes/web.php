<?php

use Illuminate\Support\Facades\Route;

/*
 * Use home controller
 */

use App\Http\Controllers\Frontend\IndexController as HomeIndexController;

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

Route::get('/', HomeIndexController::class)->name('home');

/*
 * Backend routes.
 */
