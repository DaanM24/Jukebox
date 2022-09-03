<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlaylistController;
use App\Http\Controllers\PermPlaylistController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\SongController;
use App\Http\Controllers\SessionController;
use App\Models\Genre;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/playlistname', function () {
    return view('playlistname');
});

Route::get('/playlistrename', function () {
    return view('playlistrename');
});

Route::get('/songlist', [SongController::class, 'getAllSongs']);

Route::get('/songdetails/{id}', [SongController::class, 'getSongDetails']);

Route::get('/genres', [GenreController::class, 'getGenres']);

Route::get('/genre/{id}', [GenreController::class, 'getGenreSongs']);

Route::get('/playlists', [PermPlaylistController::class, 'getAllPlaylists']);

Route::get('/myplaylists', [PermPlaylistController::class, 'getPersonalPlaylists']);

Route::get('/playlistselector', [PermPlaylistController::class, 'getPlaylistSelector']);

Route::get('/playlist', [PlaylistController::class, 'getPlaylistSongs']);   

Route::get('/playlistdetails/{id}', [PermPlaylistController::class, 'getPlaylistDetails']);

Route::get('/playlistdetails/{id}/addSong', [PermPlaylistController::class, 'addSong']);

Route::post('/playlistdetails/add', [PermPlaylistController::class, 'add']);

Route::get('/playlistdetails/{id}/remove', [PermPlaylistController::class, 'remove']);

Route::get('/playlistdetails/{id}/rename', [PermPlaylistController::class, 'storeName']);

Route::post('/playlistdetails/rename', [PermPlaylistController::class, 'changeName']);
 
Route::get('/playlist/{id}/add', [PlaylistController::class, 'add']);

Route::get('/playlist/{id}/remove', [PlaylistController::class, 'remove']);

Route::post('/playlist/create', [PlaylistController::class, 'create']);

require __DIR__.'/auth.php';
