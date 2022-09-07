<?php

use App\Http\Controllers\Main\MainController;
use App\Http\Controllers\Albums\AlbumsController;
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

Route::get('/', [MainController::class,'index'])->name('main.index');


//Route::group(['namespace' => 'Album','prefix'=>'albums'], function() {
//    Route::get('/', [AlbumsController::class,'index'])->name('album.index');
////    Route::get('/{album}', [AlbumsController::class,'show'])->name('album.show');
//    Route::get('/add_album', [AlbumsController::class,'create'])->name('album.create');
//});


Route::resource('albums',AlbumsController::class);

//Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route::get('/', function () {
//    return view('welcome');
//});
