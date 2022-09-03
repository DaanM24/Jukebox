<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Playlist;
use App\Models\Saved_Song;
use App\Models\Song;
use Illuminate\Support\Facades\Auth;

class PermPlaylistController extends Controller
{
    public function getAllPlaylists()
    {
        $playlist = Playlist::all();

        return view('/playlists')->with('playlist', $playlist);
    }

    public function getPersonalPlaylists()
    {
        $playlist = Playlist::where('userid', Auth::user()->id)->get();

        return view('/playlists')->with('playlist', $playlist);
    }

    public function getPlaylistDetails($id)
    {
    //     $name = DB::table('playlists')
    //             ->where('id', '=', $id)
    //             ->get();
        $name = Playlist::where('id', $id)->get();

        // $select = DB::table('saved_songs')
        //         ->where('listid', '=', $id)
        //         ->get();
        $select = Saved_Song::where('listid', $id)->get();
    
        // $song = DB::table('songs')->get();
        $song = Song::all();

        return view('playlistdetails')->with(['name' => $name, 'select' => $select, 'song' => $song]);
    }

    public function getPlaylistSelector()
    {
        $playlist = Playlist::all();

        return view('/playlistselector')->with('playlist', $playlist);
    }

    public function addSong(Request $request, $id)
    {
        app('App\Http\Controllers\SessionController')->sessionPut('song', $id, $request);

        return redirect('/playlistselector');
    }

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

    public function remove($id)
    {
        Saved_Song::where('id', $id)->delete();

        return back();
    }

    public function storeName(Request $request, $id)
    {
        app('App\Http\Controllers\SessionController')->sessionPut('name', $id, $request);

        return redirect('/playlistrename');
    }

    public function changeName(Request $request)
    {
        $name = $songid = app('App\Http\Controllers\SessionController')->sessionGetAll('name', $request);
        //$request->name;
        //$request->session()->get('name');
        Playlist::where('id', $name)
                ->update(['title' => $request->name]);

        return redirect('/playlists');
    }
}
