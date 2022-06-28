<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\Follow_userController;
use App\Http\Controllers\SongController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PaymentHistoryController;
use App\Http\Controllers\PlaylistController;
use App\Http\Controllers\Playlist_groupController;
use App\Http\Controllers\Like_songController;
use App\Http\Controllers\LoginController;

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
Route::get('/', function () {
    return view('welcome');
});
*/



Route::get('/album', function () {
    return view('album/indexAlbum');
});

Route::get('/home/register', function () {
    return view('home/register');
});

Route::get('/', function () {
    return view('home/home');
});
Route::get('/home/login2', function () {
    return view('home/login2');
});
Route::get('/song/player', function () {
    return view('song/player');
});
Route::get('/song/song', function () {
    return view('song/song');
});
Route::get('/song/admin', function () {
    return view('admin');
});

//Login
Route::get('/login',[LoginController::class,'show']); 
Route::post('/login',[LoginController::class,'login']); 



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
Route::put('/paymentHistories/update/{id}',[PaymentHistoryController::class,'update']);
Route::put('/paymentHistories/delete/{id}',[PaymentHistoryController::class,'delete']);
Route::delete('/paymentHistories/destroy/{id}',[PaymentHistoryController::class,'destroy']);

//Like_song
Route::get('/like_song',[Like_songController::class,'index']); 
Route::get('/like_song/{id}',[Like_songController::class,'show']);
Route::post('/like_song/store',[Like_songController::class,'store']);
Route::put('/like_song/update/{id}',[Like_songController::class,'update']);
Route::put('/like_song/delete/{id}',[Like_songController::class,'delete']);
Route::delete('/like_song/destroy/{id}',[Like_songController::class,'destroy']);

//Playlist
Route::get('/playlist',[PlaylistController::class,'index']); 
Route::get('/playlist/{id}',[PlaylistController::class,'show']);
Route::post('/playlist/store',[PlaylistController::class,'store']);
Route::put('/playlist/update/{id}',[PlaylistController::class,'update']);
Route::put('/playlist/delete/{id}',[PlaylistController::class,'delete']);
Route::delete('/playlist/destroy/{id}',[PlaylistController::class,'destroy']);

//Playlist_group
Route::get('/playlist_group',[Playlist_groupController::class,'index']); 
Route::get('/playlist_group/{id}',[Playlist_groupController::class,'show']);
Route::post('/playlist_group/store',[Playlist_groupController::class,'store']);
Route::put('/playlist_group/update/{id}',[Playlist_groupController::class,'update']);
Route::put('/playlist_group/delete/{id}',[Playlist_groupController::class,'delete']);
Route::delete('/playlist_group/destroy/{id}',[Playlist_groupController::class,'destroy']);

//Song
//Route::get('/songs',[SongController::class,'index']); 
Route::get('/songs/{nombre_cancion}',[SongController::class,'show']);
Route::post('/songs/store',[SongController::class,'store']);
Route::put('/songs/update/{id}',[SongController::class,'update']);
Route::put('/songs/delete/{id}',[SongController::class,'delete']);
Route::delete('/songs/destroy/{id}',[SongController::class,'destroy']);
Route::get('/songs/search',[SongController::class,'search']);

//Auth::routes();