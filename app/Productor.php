<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Productor extends Model
{
    //
    protected $table= "productor";
    protected $fillable=[
    	'id',
    	'nombre',
    	'locacion',
    	'lat',
    	'long',
    	'contacto',
    	'puesto',
    	'correo',
    	'celular',
    	'telefono',
    	'comentarios',
    	'bodega_id',
    	'vinicola_id',
    	'uvas',
    	'marcas'
    ];
    protected $hidden=[
    	'created_at',
    	'updated_at'
    ];
    public function bodega()
    {
    	return $this->belongsTo('App\Bodega','bodega_id');
    }
    public function vinicola()
    {
    	return $this->belongsTo('App\Vinicola','vinicola_id');
    }
    public function barricas_producidas(){
    	return $this->morphMany('App\Barricas','producido');
    }
}