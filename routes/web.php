<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\GenreController;
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
//Albums
Route::get('/albums',[AlbumController::class,'index']); 
Route::get('/albums/{id}',[AlbumController::class,'show']);
Route::post('/albums/store',[AlbumController::class,'store']);
Route::put('/albums/update/{id}',[AlbumController::class,'update']);
Route::put('/albums/delete/{id}',[AlbumController::class,'delete']);
Route::delete('/albums/destroy/{id}',[AlbumController::class,'destroy']);

//Genres
Route::get('/genres',[GenreController::class,'index']);
Route::get('/genres/{id}',[GenreController::class,'show']);
Route::post('/genres/store',[GenreController::class,'store']);
Route::put('/genres/update/{id}',[GenreController::class,'update']);
Route::put('/genres/delete/{id}',[GenreController::class,'delete']);
Route::delete('/genres/destroy/{id}',[GenreController::class,'destroy']);