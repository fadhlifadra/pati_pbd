<?php

namespace App\Http\Controllers;
use mGis;

use Illuminate\Http\Request;

class GisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('carto');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = mGis::find($id);
        
        return view('data_marker._untukedit')->with(compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request , [
            'nama2' => 'required',
            'latitude2' => 'required',
            'longitude2' => 'required',
            ]);

            $t_approve = mGis::find($id);
           // dd($t_aprrove);
            $t_approve->update([
                'nama' => $request->nama2,
                'latitude' => $request->latitude2,
                'longitude' => $request->longitude2,
        ]);

        Session::flash("flash_notification",[
            "level" => "green",
            "message" => "Berhasil Melakukan Edit"
        ]);
        
        return redirect()->route('listdata');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = mGis::find($id);
        
        mGis::destroy($id);

        Session::flash("flash_notification",[
                "level" => "green",
                "message" => "Berhasil Menghapus "
        ]);

        return redirect()->route("data_marker.index");
    }
}
