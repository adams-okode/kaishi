<?php
use Illuminate\Support\Facades\Route;

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

$routes = function () {
    Route::get('/', [App\Http\Controllers\Website\HomeController::class, 'index'])->name('site.front.home');

};

Route::group(['domain' => 'www' . env('APP_DOMAIN')], $routes);
Route::group(['domain' => env('APP_DOMAIN')], $routes);
