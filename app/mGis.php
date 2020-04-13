<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mGis extends Model
{
    protected $table = 'gis';

    protected $fillable = [
        'nama','longitude','latitude', 'flag',
        //foreign
        'user_id'
        
    ];

    public function user(){
        return $this->belongsTo('App\User','user_id','id');
    }
}
