<?php

use Illuminate\Support\Facades\Route;
<<<<<<< Updated upstream
use App\Http\Controllers\AlbumController;

=======
use App\Http\Controllers\GenreController;
>>>>>>> Stashed changes
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

<<<<<<< Updated upstream
Route::get('/albums',[AlbumController::class,'index']); 
Route::post('/albums/create',[AlbumController::class,'store']);
=======
Route::get('/genres',[GenreController::class,'index']);
Route::post('/genres/store',[GenreController::class,'store']);
>>>>>>> Stashed changes
