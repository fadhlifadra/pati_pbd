<?php

namespace App\DataTables\Laporan;

use App\User;
use App\mGis;
use Auth;
use Carbon;
use Yajra\DataTables\Services\DataTable;

class DataMarkerDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables($query)


        ->addColumn('approve', function($request){
            if(Auth::user()->role_id == 1 && $request->flag == 0 ){
                return view ('datatable._kirim',[
                    'model'    => $request,
                    'kirim_url' => route('data_marker.edit', [$request->id]),
                ]);
            }else{
                return NULL;
            }             
        })

        ->addColumn('edit', function($request){
            if(Auth::user()->role_id == 1 && $request->flag != 0 || Auth::user()->role_id == 2 && $request->user_id == Auth::user()->id ){
            return view ('datatable._edit',[
                'model'    => $request,
                'edit_url' => route('listdata.edit2', [$request->id])
            ]);
            }else{
                return NULL;
            }                           
        })


        ->addColumn('delete', function($request){    
            return view ('datatable._delete',[
                'model'    => $request,
                'delete_url' => route('data_marker.destroy', $request->id),
                'confirm_message' => 'Yakin ingin menghapus Data  ?'
            ]);                 
        })


        ->editColumn('flag', function($request){
            if(Auth::user()->role_id == 1){
                if($request->flag==0){
                       return "Belum Ada Tindak Lanjut";
                }elseif($request->flag == 1) {
                   return "Approved";
                }else{
                   return "Denied";
                }
            }else{
                if($request->flag==0){
                    return "Menunggu Tindak Lanjut";
                }elseif($request->flag == 1) {
                    return "Approved";
                }else{
                    return "Denied";
             }
            }
        })      


        

        ->rawColumns(['approve']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(User $model)
    {
        Auth::user();
        $id_user = Auth::user()->id;

        if(Auth::user()->role_id == 1){
            $query = mGis::with('user')
            //->where('flag',1) //
            ->select('gis.*');
        }else{
            $query = mGis::with('user')
            ->where('user_id', $id_user) //
            ->select('gis.*');
        }            


        return $this->applyScopes($query);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->columns($this->getColumns())
                    ->parameters([
                        'buttons' => ['excel', 'reset', 'reload'],
                        'dom' => '<"row"<"col-sm-4"l><"col-sm-5"B><"col-sm-3"f>><"row"<"col-sm-12"tr>><"row"<"col-sm-5"i><"col-sm-7"p>>',  
                    ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        if(Auth::user()->role_id = 1){
        return [
            (['data'=> 'user.email' ,'name' => 'user.email' , 'title' => 'Pengirim','orderable' => false]),
            (['data'=> 'id' ,'name' => 'id' , 'title' => 'ID','visible' => false]),
            (['data'=> 'nama' ,'name' => 'nama' , 'title' => 'Nama Lokasi','visible' => true]),
            (['data'=> 'latitude' ,'name' => 'latitude' , 'title' => 'Latitude','visible' => true]),
            (['data'=> 'longitude' ,'name' => 'longitude' , 'title' => 'Longitude','Longitude' => true]),
            (['data'=> 'flag' ,'name' => 'flag' , 'title' => 'Status','orderable' => false]),
            (['data'=> 'edit' ,'name' => 'edit' , 'title' => '' ,'orderable' => false,'searchable' => false, 'exportable' => false, 'printable'  => false, 'width' => '25px']),
            (['data'=> 'delete' ,'name' => 'delete' , 'title' => '' ,'orderable' => false,'searchable' => false, 'exportable' => false, 'printable'  => false, 'width' => '25px']),
            (['data'=> 'approve' ,'name' => 'approve' , 'title' => '' ,'orderable' => false,'searchable' => false, 'exportable' => false, 'printable'  => false, 'width' => '25px']),
        ];
        }else{
            return [
            (['data'=> 'nama' ,'name' => 'nama' , 'title' => 'Nama Lokasi','visible' => true]),
            (['data'=> 'latitude' ,'name' => 'latitude' , 'title' => 'Latitude','visible' => true]),
            (['data'=> 'longitude' ,'name' => 'longitude' , 'title' => 'Longitude','Longitude' => true]),
            ];
        }
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Laporan/ResumeAudit_' . date('YmdHis');
    }
}
