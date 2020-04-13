<?php

namespace App\Http\Controllers\Monitoring;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\DataTables\Laporan\UserDataTable;
use Session;

class UserController extends Controller
{
    public function index(UserDataTable $dataTable)
    {
        return $dataTable->render('user.index');
    }

    public function create()
    {
        $id = 0 ;
        $editdata = User::find($id);
        return view('user.create',compact('data','editdata'));
    }

    public function store(Request $request)
    {
        $this->validate($request , [
            'email' => 'required|email|unique:users',
            'nama' => 'required',
            'password' => 'required',
            'role_id' => 'required'
        ]);

        $user = User::create([
            'email' => $request->email,
            'nama' => $request->nama,
            'password' => bcrypt($request->password),
            'role_id' => $request->role_id,
        ]);

        Session::flash("flash_notification",[
            "level" => "green",
            "message" => "Berhasil Menyimpan Data User $user->nama"
        ]);

        return redirect()->route('user.index');
    }

    public function edit($id)
    {
      
        $editdata = User::find($id);
        $user = User::with('useremail','role')->find($id);

        return view('user.edit')->with(compact('user','data','editdata'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request , [
            'email' => 'required',
            'nama' => 'required',
            'password' => 'required',
            'role_id' => 'required'
        ]);
        
        $user = User::with('useremail','role')->find($id);

        $user->update([
            'email' => $request->email,
            'nama' => $request->nama,
            'password' => bcrypt($request->password),
            'role_id' => $request->role_id
        ]);

        Session::flash("flash_notification",[
            "level" => "green",
            "message" => "Berhasil Merubah Data User $user->nama"
        ]);
        
        return redirect()->route('user.index');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        
        User::destroy($id);

        Session::flash("flash_notification",[
                "level" => "green",
                "message" => "Berhasil Menghapus Data User = $user->email"
        ]);

        return redirect()->route("user.index");
    }

    public function getdropdown(Request $request){
        $id = $request->id;
        $data = mBagUnit::where('obj_audit_id',$id)->get();
        echo json_encode($data);
       
       
    }
    
}
