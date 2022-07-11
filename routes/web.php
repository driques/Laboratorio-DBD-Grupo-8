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
use App\Http\Controllers\CountrySongRestrictionController;
use Illuminate\Support\Facades\Auth;


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


testingdebede@gmail.com 
testingdebede123


Stripe
TestDEBEDE123.
*/

Route::get('/users/create', function () {
    return view('user.create');
})->middleware('auth');

Route::get('/restrictions/create', function () {
    return view('restriction.create');
})->middleware('auth');

Route::get('/restrictions', function () {
    return view('restriction.index');
})->middleware('auth');

Route::get('/playlistGroups/create', function () {
    return view('playlistgroup.create');
})->middleware('auth');

Route::get('/playlistGroups', function () {
    return view('playlistgroup.index');
})->middleware('auth');

Route::get('/countries3/create', function () {
    return view('country/create');
})->middleware('auth');

Route::get('/countries3', function () {
    return view('country/index');
})->middleware('auth');

Route::get('/paymentHistories/create', function () {
    return view('payment/create');
})->middleware('auth');

Route::get('/songs2', function () {
    return view('song/index2');
})->middleware('auth');

Route::get('/like_songs/create', function () {
    return view('likesong.create');
})->middleware('auth');


Route::get('/createsubscription', function () {
    return view('subscription/create');
});



Route::get('/follow_users', function () {
    return view('followuser/index');
});

Route::get('/user/profile/songs',[SongController::class,'getSongsByUser']);


Route::get('/user/profile', function () {
    return view('user/profile');
});


Route::get('/follow_users/create', function () {
    return view('followuser/create');
});

Route::get('/home/ranking', function () {
    return view('home/ranking');
});
Route::get('/home/category', function () {
    return view('home/category');
});

Route::get('/genres/create', function () {
    return view('genre/create');
});
Route::get('/genres', 'GenreController@index');

Route::get('/edit/profile', function () {
    return view('user/editProfile');
})->middleware('auth');
Route::get('/edit/profile', [CountryController::class,'index2']);

Route::get('/crudmenu', function () {
    return view('crudmenu/index');
})->middleware('auth');
Route::get('/profile', function () {
    return view('user/myProfile');
});
Route::get('/', function () {
    return view('crudmenu/index');
});

Route::get('/playlists/create', function () {
    return view('playlist/create');
});

Route::get('/playlists', function () {
    return view('playlist/index');
});

Route::get('/playlist_group', function () {
    return view('playlistgroup/index');
});

Route::get('/users', function () {
    return view('user/index');
});

Route::get('user/myprofile', function () {
    return view('user/myprofile');
});
Route::get('/home/search',[SongController::class,'search']);
Route::get('/home/searchNavbar',[SongController::class,'searchNavbar']);


Route::get('/home/ranking',[SongController::class,'ranking']);


Route::get('/home/category',[SongController::class,'category']);


Route::get('/home/categorySearch',[SongController::class,'getSongsByGenre']);

Route::get('/home/orderlikes',[SongController::class,'getSongsByLikes']);
Route::get('/home/ordername',[SongController::class,'getSongsByName']);


Route::get('/albums/{id}/edit', function () {
    return view('album/edit');
});

Route::get('/songs/{id}/edit', function () {
    return view('song/edit');
});
Route::get('/songs/edit/{id}',[SongController::class,'edit']);


Route::get('/albums', function () {
    return view('album/indexAlbum');
});

Route::get('/albums/create', function () {
    return view('album/create');
});

Route::get('/home/register', function () {
    return view('home/register'); 
})->middleware('guest');
Route::get('/home/register', [CountryController::class,'index'])->middleware('guest');

Route::get('/', function () {
    return view('home/home');
});
Route::get('/home/login2', function () {
    return view('home/login2');
})->middleware('guest');

Route::get('/song/player', function () {
    return view('song/player');
})->middleware('auth');

Route::get('/admin', function () {
    return view('CrudMenu/index');
});


Route::get('/song/register', function () {
    return view('song/songRegister');
});

Route::get('/song/edit', [SongController::class,'index']);

Route::post('/logout', function(){
    Auth::logout();
    request()->session()->invalidate();
    return redirect('/');
});

//Login
//Route::get('/login',[LoginController::class,'show']); 
//Route::post('/login',[LoginController::class,'login']);
Route::post('/login2',[LoginController::class,'authenticate']); 
//Test




//Albums
Route::get('/albums',[AlbumController::class,'index']); 
Route::get('/albums/{id}',[AlbumController::class,'show']);
Route::post('/albums/store',[AlbumController::class,'store']);



Route::put('/albums/update/{id}',[AlbumController::class,'update']);


Route::get('/albums/edit/{id}',[AlbumController::class,'edit']);
Route::put('/albums/delete/{id}',[AlbumController::class,'delete']);
Route::delete('/albums/destroy/{id}',[AlbumController::class,'destroy']);

//Genres
Route::get('/genres',[GenreController::class,'index']);
Route::get('/genres/{id}',[GenreController::class,'show']);
Route::post('/genres/store',[GenreController::class,'store']);
Route::get('genres/create',[GenreController::class,'create']);
Route::put('/genres/update/{id}',[GenreController::class,'update']);
Route::put('/genres/delete/{id}',[GenreController::class,'delete']);
Route::delete('/genres/destroy/{id}',[GenreController::class,'destroy']);
Route::get('/genres/edit/{id}',[GenreController::class,'edit']);

//Country
Route::get('/countries',[CountryController::class,'index']);
Route::get('/countries3',[CountryController::class,'index3']);
Route::get('/countries/{id}',[CountryController::class,'show']);
Route::post('/countries/store',[CountryController::class,'store']);
Route::get('/countries3/edit/{id}',[CountryController::class,'edit']);
Route::put('/countries/update/{id}',[CountryController::class,'update']);
Route::put('/countries3/update3/{id}',[CountryController::class,'update3']);
Route::put('/countries/delete/{id}',[CountryController::class,'delete']);
Route::put('/countries3/delete/{id}',[CountryController::class,'delete2']);
Route::delete('/countries/destroy/{id}',[CountryController::class,'destroy']);

//Roles
Route::get('/roles',[RolController::class,'index']); 
Route::get('/roles/{id}',[RolController::class,'show']);
Route::post('/roles/store',[RolController::class,'store']);
Route::put('/roles/update/{id}',[RolController::class,'update']);
Route::put('/roles/delete/{id}',[RolController::class,'delete']);
Route::delete('/roles/destroy/{id}',[RolController::class,'destroy']);

//User
Route::get('/usersongsrest',[UserController::class,'indexSongs']);
Route::get('/users',[UserController::class,'index']);
Route::get('/users/edit/{id}',[UserController::class,'edit']);  
Route::get('/users/{id}',[UserController::class,'show']);

Route::get('/users/test',[UserController::class,'store']);

Route::post('/users/store',[UserController::class,'store']);
Route::post('/users/store2',[UserController::class,'store2']);


Route::post('/users/storeWithPay',[UserController::class,'storeWithPay']);

Route::put('/users/update/{id}',[UserController::class,'update']);
Route::put('/users/update2/{id}',[UserController::class,'update3']);
Route::get('/users/update/{id}', function () {
    return view('user/editProfile');
})->middleware('auth');
Route::put('/users/delete/{id}',[UserController::class,'delete']);
Route::delete('/users/destroy/{id}',[UserController::class,'destroy']);

//Follow_users
Route::get('/follow_users',[Follow_userController::class,'index']);
Route::get('/follow_users/{id}',[Follow_userController::class,'show']);
Route::post('/follow_users/store',[Follow_userController::class,'store']);
Route::post('/follow_users/create',[Follow_userController::class,'create']);
Route::get('follow_users/edit/{id}',[Follow_userController::class,'edit']);
Route::put('/follow_users/update/{id}',[Follow_userController::class,'update']);
Route::put('/follow_users/delete/{id}',[Follow_userController::class,'delete']);
Route::delete('/follow_users/destroy/{id}',[Follow_userController::class,'destroy']);

Route::get('/follow_user/searchFollowsUser',[Follow_userController::class,'searchFollowsUser']); 
Route::get('/follow_user/searchFollowerUser',[Follow_userController::class,'searchFollowerUser']); 



//paymentHistories
Route::get('/paymentHistories',[PaymentHistoryController::class,'index']); 
Route::get('/paymentHistories/{id}',[PaymentHistoryController::class,'show']);
Route::post('/paymentHistories/store',[PaymentHistoryController::class,'store']);
Route::put('/paymentHistories/update/{id}',[PaymentHistoryController::class,'update']);
Route::get('/paymentHistories/edit/{id}',[PaymentHistoryController::class,'edit']);
Route::put('/paymentHistories/delete/{id}',[PaymentHistoryController::class,'delete']);
Route::delete('/paymentHistories/destroy/{id}',[PaymentHistoryController::class,'destroy']);

//Like_song
Route::get('/like_songs',[Like_songController::class,'index']); 
Route::get('/like_songs/{id}',[Like_songController::class,'show']);
Route::post('/like_songs/store',[Like_songController::class,'store']);
Route::get('like_songs/edit/{id}',[Like_songController::class,'edit']);
Route::put('/like_songs/update/{id}',[Like_songController::class,'update']);
Route::put('/like_songs/delete/{id}',[Like_songController::class,'delete']);
Route::delete('/like_songs/destroy/{id}',[Like_songController::class,'destroy']);

//Playlist
Route::get('/playlists',[PlaylistController::class,'index']); 
Route::get('/playlists/{id}',[PlaylistController::class,'show']);
Route::post('/playlists/store',[PlaylistController::class,'store']);
Route::get('/playlists/edit/{id}',[PlaylistController::class,'edit']);
Route::put('/playlists/update/{id}',[PlaylistController::class,'update']);
Route::put('/playlists/delete/{id}',[PlaylistController::class,'delete']);
Route::delete('/playlists/destroy/{id}',[PlaylistController::class,'destroy']);

Route::get('/playlist/searchPlaylistByOwner',[PlaylistController::class,'searchPlaylistByOwner']);

//Playlist_group
Route::get('/playlistGroups',[Playlist_groupController::class,'index']); 
Route::get('/playlistGroups/edit/{id}',[Playlist_groupController::class,'edit']); 
Route::get('/playlistGroups/{id}',[Playlist_groupController::class,'show']);
Route::post('/playlistGroups/store',[Playlist_groupController::class,'store']);
Route::put('/playlistGroups/update/{id}',[Playlist_groupController::class,'update']);
Route::put('/playlistGroups/delete/{id}',[Playlist_groupController::class,'delete']);
Route::delete('/playlistGroups/destroy/{id}',[Playlist_groupController::class,'destroy']);

//Song
//Route::get('/songs',[SongController::class,'index']); 
Route::get('/songs/{nombre_cancion}',[SongController::class,'show']);
Route::post('/songs/store',[SongController::class,'store']);
Route::put('/songs/update/{id}',[SongController::class,'update']);
Route::put('/songs/delete/{id}',[SongController::class,'delete']);
Route::delete('/songs/destroy/{id}',[SongController::class,'destroy']);
Route::get('/songs2',[SongController::class,'index2']);


Route::put('/songs/playquantity/{id}',[SongController::class,'playQuantity']);

//Country_restrictions
Route::get('/restrictions/{nombre_cancion}',[CountrySongRestrictionController::class,'show']);
Route::post('/restrictions/store',[CountrySongRestrictionController::class,'store']);
Route::put('/restrictions/update/{id}',[CountrySongRestrictionController::class,'update']);
Route::get('/restrictions/edit/{id}',[CountrySongRestrictionController::class,'edit']);
Route::put('/restrictions/delete/{id}',[CountrySongRestrictionController::class,'delete']);
Route::delete('/restrictions/destroy/{id}',[CountrySongRestrictionController::class,'destroy']);
Route::get('/restrictions',[CountrySongRestrictionController::class,'index']);

//Auth::routes();