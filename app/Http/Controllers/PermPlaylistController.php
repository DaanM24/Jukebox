<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Playlist;
use App\Models\Saved_Song;
use App\Models\Song;
use Illuminate\Support\Facades\Auth;

class PermPlaylistController extends Controller
{
    //retrieves all playlists from database
    public function getAllPlaylists()
    {
        $playlist = Playlist::all();

        return view('/playlists')->with('playlist', $playlist);
    }

    //retrieves all playlist tied to a user
    public function getPersonalPlaylists()
    {
        $playlist = Playlist::where('userid', Auth::user()->id)->get();

        return view('/playlists')->with('playlist', $playlist);
    }

    //retrieves all songs from a playlist from database
    public function getPlaylistDetails($id)
    {
        $name = Playlist::where('id', $id)->get();

        $select = Saved_Song::where('listid', $id)->get();
    
        $song = Song::all();

        return view('playlistdetails')->with(['name' => $name, 'select' => $select, 'song' => $song]);
    }

    //retrieves all playlists to put into selector dropdown
    public function getPlaylistSelector()
    {
        $playlist = Playlist::all();

        return view('/playlistselector')->with('playlist', $playlist);
    }

    //stores name to add to permanent playlist
    public function addSong(Request $request, $id)
    {
        app('App\Http\Controllers\SessionController')->sessionPut('song', $id, $request);

        return redirect('/playlistselector');
    }

    //adds song to specific permanent playlist
    public function add(Request $request)
    {
        $list = Playlist::where('title', $request->playlist)->get();

        $songid = app('App\Http\Controllers\SessionController')->sessionGetAll('song', $request);

        $savedSong = new Saved_Song;

        $savedSong->listid = $list[0]->id;

        $savedSong->songid = $songid;

        $savedSong->save();

        return redirect('/playlists');
    }

    //removes a specific song from a permanent playlist
    public function remove($id)
    {
        Saved_Song::where('id', $id)->delete();

        return back();
    }

    //stores playlist id for playlist name change
    public function storeName(Request $request, $id)
    {
        app('App\Http\Controllers\SessionController')->sessionPut('name', $id, $request);

        return redirect('/playlistrename');
    }

    //changes name of specific playlist
    public function changeName(Request $request)
    {
        $name = $songid = app('App\Http\Controllers\SessionController')->sessionGetAll('name', $request);

        Playlist::where('id', $name)
                ->update(['title' => $request->name]);

        return redirect('/playlists');
    }
}
