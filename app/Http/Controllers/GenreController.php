<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genre;

class GenreController extends Controller
{
    public function getGenreSongs($id)
    {
        $songs = Genre::find($id)->songs;

        return view('/genre')->with('genre', $songs);
    }

    public function getGenres()
    {
        $genre = Genre::all();

        return view('/genres')->with('genre', $genre);
    }
}
