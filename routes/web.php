<?php

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/songlist', function () {
    $song = DB::table('songs')->get();
    return view('songlist', ['song' => $song]);
});

Route::get('/genres', function () {
    $genre = DB::table('genres')->get();
    return view('genres', ['genre' => $genre]);
});

Route::get('/playlists', function () {
    $playlist = DB::table('playlists')->get();
    return view('playlists', ['playlist' => $playlist]);
});

require __DIR__.'/auth.php';
