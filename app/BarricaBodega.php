<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BarricaBodega extends Model
{
    //
    protected $table="barrica_bodega";
    protected $fillable=[
    	'id',
    	'bodega_id',
    	'tipo',
    	'subtipo',
    	'tostado',
    	'cantidad'
    ];
    protected $hidden=[
    	'created_at',
    	'updated_at'
    ];

    public function bodega()
    {
    	return $this->belongsTo('App\Bodega','bodega_id');
    }
}
