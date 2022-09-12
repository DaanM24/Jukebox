<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Song;

//manages everything for songs
class SongController extends Controller
{
    //retrieves all songs from the database
    public function getAllSongs()
    {
        $song = Song::all();

        return view('/songlist')->with('song', $song);
    }

    //retrieves the data of a specific song
    public function getSongDetails($id)
    {
        $song = Song::where('id', $id)->get();

        return view('/songdetails')->with('song', $song);
    }
}
