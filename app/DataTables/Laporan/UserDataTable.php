<?php

namespace App\DataTables\Laporan;

use App\User;
use Yajra\DataTables\Services\DataTable;
use App\Role;

class UserDataTable extends DataTable
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
        ->addColumn('edit', function($request){
            return view ('datatable._edit',[
                'model'    => $request,
                'edit_url' => route('user.edit', $request->id)
            ]);                       
        })

        ->addColumn('delete', function($request){    
            return view ('datatable._delete',[
                'model'    => $request,
                'delete_url' => route('user.destroy', $request->id),
                'confirm_message' => 'Yakin ingin menghapus User ' . $request->email . '?'
            ]);                 
        })

        ->rawColumns(['edit','delete']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(User $model)
    {
        $query = User::with('useremail','role')->select('users.*');

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
        return [
            (['data'=> 'id' ,'name' => 'id' , 'title' => 'ID',]),
            (['data'=> 'nama' ,'name' => 'nama' , 'title' => 'Nama',]),
            (['data'=> 'email' ,'name' => 'email' , 'title' => 'Email']),
            (['data'=> 'role.display_name' ,'name' => 'role.display_name' , 'title' => 'User Role']),
           // (['data'=> 'objek_audit.name_obj_audit' ,'name' => 'objek_audit.name_obj_audit' , 'title' => 'Objek Audit']),
           // (['data'=> 'bagian_unit.name_bag_unit' ,'name' => 'bagian_unit.name_bag_unit' , 'title' => 'Nama Bagian / Unit']),
            (['data'=> 'edit' ,'name' => 'edit' , 'title' => '' ,'orderable' => false,'searchable' => false, 'exportable' => false, 'printable'  => false, 'width' => '25px']),
            (['data'=> 'delete' ,'name' => 'delete' , 'title' => '' ,'orderable' => false,'searchable' => false, 'exportable' => false, 'printable'  => false, 'width' => '25px'])
        ];
    }


    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Laporan/User_' . date('YmdHis');
    }
}
