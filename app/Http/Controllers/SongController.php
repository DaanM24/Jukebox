<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Song;

class SongController extends Controller
{
    public function getAllSongs()
    {
        $song = Song::all();

        return view('/songlist')->with('song', $song);
    }

    public function getSongDetails($id)
    {
        $song = Song::where('id', $id)->get();

        return view('/songdetails')->with('song', $song);
    }
}
