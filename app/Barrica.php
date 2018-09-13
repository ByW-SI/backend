<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barrica extends Model
{
    //
    protected $table="barrica";
    protected $fillable=[
    	'id',
    	// 'producido',
        'enologo_id',
        'tipo_bar',
        'tostado',
        'uva',
        'bodega_id',
        'vinicola_id',
        'fecha_inicio',
        'fecha_embotellado',
        'meses_barrica',
        'meses_estabilizacion',
        'costo_uva',
        'costo_barrica',
        'costo_prod',
        'precio_venta',
        'fecha_envio',
        'anada',
        'utilidad',
        'precio_publico'
    ];
    protected $hidden=[
    	'created_at',
    	'updated_at'
    ];
    public function bodega()
    {
        return $this->belongsTo('App\Bodega','bodega_id');
    }

    public function enologo()
    {
        return $this->belongsTo('App\Enologo','enologo_id');
    }


    public function vinicola()
    {
        return $this->belongsTo('App\Vinicola','vinicola_id');
    }
    public function producido(){
    	return $this->morphTo();
    }
    public function barrica_bodega(){
        return $this->belongsTo('App\BarricaBodega','barrica_bodega_id');
    }
}
