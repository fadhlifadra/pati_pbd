<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\mGis;

class home extends Controller
{
    public function index(UserDataTable $dataTable)
    {
        $mark = mGis::all();
        return view('home')->with(compact('mark'));
    }
}
