<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PlaylistController extends Controller
{
    public function add(Request $request, $id)
    {
        $request->session()->push('playlists', $id); 

        return redirect('/playlist');
    }
}
