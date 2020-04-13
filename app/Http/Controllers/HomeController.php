<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\mGis;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
    public function json()
    {

        $mark = mGis::with('user')
                ->where('user_id', Auth::user()->id)
                ->where('flag',1) 
                ->get()->toArray();

        echo json_encode($mark);
        
    }
    

    public function json2()
    {

        $mark2 = mGis::with('user')
                ->where('user_id', '!=', Auth::user()->id)
                ->where('flag',1)
                ->get()->toArray();

        echo json_encode($mark2);
        
    }


}
