<?php

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\SongController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::view('/home', 'home')->middleware(['auth', 'verified']);
Route::view('/profile/user-profile', 'profile.user-profile')->middleware('auth')->name('user-profile');
Route::view('/profile/edit', 'profile.edit')->middleware('auth');
Route::view('/profile/password', 'profile.password')->middleware('auth');

Route::controller(AlbumController::class)->group(function(){
    Route::get('/albums/album-view', 'index')->name('AlbumView');
    Route::get('/albums/create-album', 'createAlbum')->name('createAlbum');
    Route::post('/albums/store-album', 'storeAlbum')->name('storeAlbum');
    Route::get('/albums/edit-album/{id}', 'editAlbum')->name('editAlbum');
    Route::post('/albums/update-album/{id}', 'updateAlbum')->name('updateAlbum');
    Route::post('/albums/delete-album/{id}', 'deleteAlbum')->name('deleteAlbum');
});

Route::controller(SongController::class)->group(function(){
    Route::get('/songs/song-list/{id}', 'index')->name('songList');
    Route::get('/songs/add-song/{id}', 'addSong')->name('addSong');
    Route::post('/songs/store-song', 'storeSong')->name('storeSong');
    Route::get('/songs/edit-song/{id}', 'editSong')->name('editSong');
    Route::post('/songs/update-song/{id}', 'updateSong')->name('updateSong');
    Route::post('/songs/delete-song/{id}', 'deleteSong')->name('deleteSong');
});
