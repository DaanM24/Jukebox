<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Playlist;
use App\Models\Saved_Song;

class PermPlaylistController extends Controller
{
    public function addSong(Request $request, $id)
    {
        $request->session()->put('song', $id);

        return redirect('/playlistselector');
    }

    public function add(Request $request)
    {
        $list = Playlist::where('title', $request->playlist)->get();

        $songid = $request->session()->get('song');

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
        $request->session()->put('name', $id);

        return redirect('/playlistrename');
    }

    public function changeName(Request $request)
    {
        //$request->name;
        //$request->session()->get('name');
        Playlist::where('id', $request->session()->get('name'))
                ->update(['title' => $request->name]);

        return redirect('/playlists');
    }
}
