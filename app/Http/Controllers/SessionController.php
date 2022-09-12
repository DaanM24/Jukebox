<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Http\Controllers\PlaylistController;

//manages all session data
class SessionController extends Controller
{
    //stores item in session
    public function sessionPush($name, $id, $request)
    {
        $request->session()->push($name, $id); 

        return back();
    }

    //replaces item in session
    public function sessionPut($name, $id, $request)
    {
        $request->session()->put($name, $id);

        return back();
    }

    //retrieves all data from a specific session
    public function sessionGetAll($name, $request)
    {
        $data = $request->session()->get($name);

        return $data;
    }

    //deletes specific item from session
    public function sessionPull($name, $id, $request)
    {
        $request->session()->pull($name. ".". $id);

        return back();
    }
    
    //retrieves all items from session then deletes it from session
    public function sessionPullAll($name, $request)
    {
        $data = $request->session()->pull($name);

        return $data;
    }
}
