<?php

namespace App\Http\Controllers\Monitoring;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\DataTables\Laporan\DataMarkerDataTable;
use App\mGis;
use Session;
use Auth;


class DataMarkerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('data_marker.index');
    }

    public function indexDataMarker(DataMarkerDataTable $dataTable)
    {
        return $dataTable->render('list_data_marker.index');
    }
    



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    










    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$id = 0 ;
        $data = mGis::all();
        //$editdata = tDataMarker::find($id);
        return view('data_marker.index',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request , [
            'nama' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',

        ]);
        if(Auth::user()->role_id == 1 ){
        $t_laporan = mGis::create([
            'user_id' => Auth::user()->id,
            'nama' => $request->nama,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'flag' => 1

        ]);}

        if(Auth::user()->role_id == 2 ){
            $t_laporan = mGis::create([
                'user_id' => Auth::user()->id,
                'nama' => $request->nama,
                'latitude' => $request->latitude,
                'longitude' => $request->longitude,
                'flag' => 0
    
            ]);}
        
        if(Auth::user()->role_id == 1 ){
        Session::flash("flash_notification",[
            "level" => "green",
            "message" => "Berhasil Disimpan "
        ]);}

        if(Auth::user()->role_id == 2 ){
            Session::flash("flash_notification",[
                "level" => "yellow",
                "message" => "Data Terekam, Silakan Tunggu Aprofisasi "
            ]);}

        return redirect()->route('data_marker.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

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
        
        return view('data_marker.edit')->with(compact('data'));
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
 
            ]);

            $t_approve = mGis::find($id);
           // dd($t_aprrove);
            $t_approve->update([
            'flag' => $request->status
        ]);

        Session::flash("flash_notification",[
            "level" => "green",
            "message" => "Berhasil Melakukan Action"
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

        return redirect()->route("listdata");
    }

    public function getdropdown(Request $request){
        $id = $request->id;
        $data = mBagUnit::where('obj_audit_id',$id)->get();
        echo json_encode($data);
    }





    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit2($id)
    {
        $data2 = mGis::find($id);
        
        return view('data_marker._untukedit')->with(compact('data2'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update2(Request $request, $id)
    {
        $this->validate($request , [
 
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

    public function indexCarto()
    {

        return view('carto');
    }

}
        