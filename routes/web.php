<?php


use App\Http\Controllers\BasicControllers\{AuthController,SeriesController,ChapterController};
use App\Http\Controllers\AuthenticatedControllers\{BookMarkController, RateController,ApplyAuthorController};
use App\Http\Controllers\AdminControllers\{SeriesController as AdminSeries,RateController as AdminRate,ChapterController as AdminChapter,AccountController as AdminAccount};
use App\Http\Controllers\AuthorControllers\{SeriesController as AuthorSeries,HomeController as  AuthorHome};
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




Route::get("/",[SeriesController::class,"index"])->name('basic.home');
Route::get("series/detail/{id}",[SeriesController::class,"detail"])->name('series.detail');
Route::get("chapter/detail/{id}",[ChapterController::class,"detail"])->name('chapters.detail');
Route::get("about/",function(){
    return view("basic.about");
})->name("about");

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
    Route::post('author/add',[ApplyAuthorController::class,"create"])->name('author-create');
});

Route::group(['as'=>"admin.","prefix"=> "admin/"],function(){
    Route::get("series/",[AdminSeries::class,"index"])->name('series-index');
    Route::get("series/create",[AdminSeries::class,"create"])->name('series-create');
    Route::post("series/create",[AdminSeries::class,"create_process"])->name('series-create-process');
    Route::get("series/update/{id}",[AdminSeries::class,"update"])->name('series-update');
    Route::post("series/update/{id}",[AdminSeries::class,"update_process"])->name('series-update-process');
    Route::post("series/delete/{id}",[AdminSeries::class,"delete"])->name('series-delete');
    Route::get("chapter/",[AdminChapter::class,"index"])->name('chapters-index');
    Route::get("account/create",[AdminAccount::class,"create"])->name('account-create');
    Route::post("account/create",[AdminAccount::class,"create_process"])->name('account-create-process');
    Route::get("rate/",[AdminRate::class,"index"])->name('rate-index');
});

Route::group(['as'=>'author.','prefix'=>"author/"],function(){
    Route::get("series/create",[AuthorSeries::class,"create"])->name('series-create');
    Route::post("series/create",[AuthorSeries::class,"create_process"])->name('series-create-process');
    Route::get("series/update/{id}",[AuthorSeries::class,"update"])->name('series-update');
    Route::post("series/update/{id}",[AuthorSeries::class,"update_process"])->name('series-update-process');
    Route::post("series/delete/{id}",[AuthorSeries::class,"delete"])->name('series-delete');
    Route::get("/",[AuthorHome::class,"index"])->name('home');
});