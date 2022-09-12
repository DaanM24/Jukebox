<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Playlist;
use App\Models\Saved_Song;
use App\Models\Song;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\SessionController;

//manages everything for temporary playlists
class PlaylistController extends Controller
{
    //retrieve all songs from a specific playlist
    public function getPlaylistSongs(Request $request)
    {
        $song = Song::all();
        $value = app('App\Http\Controllers\SessionController')->sessionGetAll('playlists', $request);

        return view('/playlist')->with(['value' => $value, 'song' => $song]);
    }

    //adds a song to the temporary playlist
    public function add(Request $request, $id)
    {
        app('App\Http\Controllers\SessionController')->sessionPush('playlists', $id, $request);

        return redirect('/playlist');
    }

    //deletes a song from the temporary playlist
    public function remove(Request $request, $id)
    {
        app('App\Http\Controllers\SessionController')->sessionPull('playlists', $id, $request);

        return redirect('/playlist');
    }

    //makes a temporary playlist into a permanent one
    public function create(Request $request)
    {
        $playlist = new Playlist;

        $playlist->title = $request->name;

        $playlist->userid = Auth::user()->id;

        $playlist->save();

        $name = Playlist::where('title', $request->name)->get();

        $songs = app('App\Http\Controllers\SessionController')->sessionPullAll('playlists', $request);

        foreach ($songs as $song => $count){
            $savedSong = new Saved_Song;

            $savedSong->listid = $name[0]->id;

            $savedSong->songid = $songs[$song];

            $savedSong->save();
        }

        return redirect('/dashboard');
    }
}
