<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barrica extends Model
{
    //
    protected $table="barrica";
    protected $fillable=[
    	'id',
    	'producido_type',
    	'producido_id',
    	'barrica_bodega_id',
    	'uva',
    	'fecha_inicio',
    	'fecha_embotellado',
    	'meses_barrica',
    	'meses_estabilizacion',
    	'precio_uva',
    	'precio_prod',
    	'precio_venta',
    	'fecha_envio'
    ];
    protected $hidden=[
    	'created_at',
    	'updated_at'
    ];


    public function producido(){
    	return $this->morphTo();
    }
    public function barrica_bodega(){
        return $this->belongsTo('App\BarricaBodega','barrica_bodega_id');
    }
}
