<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class SessionController extends Controller
{
    public function show(Request $request, $id)
    {
        $request->session()->put($id, 'info');
        $value = $request->session()->get($id);

        echo $value;
    }
}
