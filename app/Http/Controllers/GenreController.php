<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genre;

//manages everything for genres
class GenreController extends Controller
{
    //get all songs of a specific genre
    public function getGenreSongs($id)
    {
        $songs = Genre::find($id)->songs;

        return view('/genre')->with('genre', $songs);
    }

    //retrieve the data of all genres
    public function getGenres()
    {
        $genre = Genre::all();

        return view('/genres')->with('genre', $genre);
    }
}
