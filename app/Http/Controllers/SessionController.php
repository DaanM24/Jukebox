<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Http\Controllers\PlaylistController;

class SessionController extends Controller
{
    public function sessionPush($name, $id, $request)
    {
        $request->session()->push($name, $id); 

        return back();
    }

    public function sessionPut($name, $id, $request)
    {
        $request->session()->put($name, $id);

        return back();
    }

    public function sessionGetAll($name, $request)
    {
        $data = $request->session()->get($name);

        return $data;
    }

    public function sessionPull($name, $id, $request)
    {
        $request->session()->pull($name. ".". $id);

        return back();
    }
    
    public function sessionPullAll($name, $request)
    {
        $data = $request->session()->pull($name);

        return $data;
    }
}
