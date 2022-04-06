<?php


use App\Http\Controllers\BasicControllers\{AuthController,SeriesController,ChapterController};
use App\Http\Controllers\AuthenticatedControllers\{BookMarkController, RateController};
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

Route::get('/', function () {
    return view('welcome');
});


Route::get("series/",[SeriesController::class,"index"])->name('series.index');
Route::get("series/detail/{id}",[SeriesController::class,"detail"])->name('series.detail');
Route::get("chapter/detail/{id}",[ChapterController::class,"detail"])->name('series.detail');


Route::group(['prefix'=> 'auth/','as'=> 'auth.'],function(){
    Route::get('login/',[AuthController::class,"login"])->name('login-form')->middleware('guest');
    Route::get('register/',[AuthController::class,"register"])->name('register-form')->middleware('guest');
    Route::post('login/',[AuthController::class,"login_process"])->name('login')->middleware('guest');
    Route::post('register/',[AuthController::class,"register_process"])->name('register')->middleware('guest');
    Route::post('SignOut/',[AuthController::class,"logout"])->name('signout')->middleware('auth');
});

Route::group(['as'=> 'loggedin.'],function(){
    Route::get('saved-series/',[BookMarkController::class,"index"])->name('saved-series');
    Route::get('saved-series/bookmark/{id}',[BookMarkController::class,"create"])->name('bookmark');
    Route::get('saved-series/unbookmark/{id}',[BookMarkController::class,"unbookmark"])->name('unbookmark');
    Route::get('rate/create/{id}/{rate}',[RateController::class,"rate"])->name('create-rate');
    Route::get('rate/create/{id}',[RateController::class,"unrate"])->name('delete-rate');
});