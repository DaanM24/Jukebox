<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Playlist;
use App\Models\Saved_Song;

class PlaylistController extends Controller
{
    public function add(Request $request, $id)
    {
        $request->session()->push('playlists', $id); 

        return redirect('/playlist');
    }

    public function remove(Request $request, $id)
    {
        $request->session()->pull('playlists.'. $id);

        return redirect('/playlist');
    }

    public function create(Request $request)
    {
        $playlist = new Playlist;

        $playlist->title = $request->name;

        $playlist->userid = 1;

        $playlist->save();

        $name = Playlist::where('title', $request->name)->get();

        $songs = $request->session()->pull('playlists');

        foreach ($songs as $song => $count){
            $savedSong = new Saved_Song;

            $savedSong->listid = $name[0]->id;

            $savedSong->songid = $songs[$song];

            $savedSong->save();
        }

        return redirect('/dashboard');
    }
}
