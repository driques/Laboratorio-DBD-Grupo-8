<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\Follow_userController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PaymentHistoryController;

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

//Country
Route::get('/countries',[CountryController::class,'index']); 
Route::get('/countries/{id}',[CountryController::class,'show']);
Route::post('/countries/store',[CountryController::class,'store']);
Route::put('/countries/update/{id}',[CountryController::class,'update']);
Route::put('/countries/delete/{id}',[CountryController::class,'delete']);
Route::delete('/countries/destroy/{id}',[CountryController::class,'destroy']);

//Roles
Route::get('/roles',[RolController::class,'index']); 
Route::get('/roles/{id}',[RolController::class,'show']);
Route::post('/roles/store',[RolController::class,'store']);
Route::put('/roles/update/{id}',[RolController::class,'update']);
Route::put('/roles/delete/{id}',[RolController::class,'delete']);
Route::delete('/roles/destroy/{id}',[RolController::class,'destroy']);

//Users
Route::get('/users',[UserController::class,'index']); 
Route::get('/users/{id}',[UserController::class,'show']);
Route::post('/users/store',[UserController::class,'store']);
Route::put('/users/update/{id}',[UserController::class,'update']);
Route::put('/users/delete/{id}',[UserController::class,'delete']);
Route::delete('/users/destroy/{id}',[UserController::class,'destroy']);

//Follow_users
Route::get('/follow_users',[Follow_userController::class,'index']); 
Route::get('/follow_users/{id}',[Follow_userController::class,'show']);
Route::post('/follow_users/store',[Follow_userController::class,'store']);
Route::put('/follow_users/update/{id}',[Follow_userController::class,'update']);
Route::put('/follow_users/delete/{id}',[Follow_userController::class,'delete']);
Route::delete('/follow_users/destroy/{id}',[Follow_userController::class,'destroy']);

//paymentHistories
Route::get('/paymentHistories',[PaymentHistoryController::class,'index']); 
Route::get('/paymentHistories/{id}',[PaymentHistoryController::class,'show']);
Route::post('/paymentHistories/store',[PaymentHistoryController::class,'store']);
//Route::put('/paymentHistories/update/{id}',[PaymentHistoryController::class,'update']);
Route::put('/paymentHistories/delete/{id}',[PaymentHistoryController::class,'delete']);
Route::delete('/paymentHistories/destroy/{id}',[PaymentHistoryController::class,'destroy']);
