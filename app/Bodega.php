<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bodega extends Model
{
    //
    protected $table="bodega";

    protected $fillable=[
    	'id',
    	'nombre',
    	'marcas',
    	'logo',
    	'vista',
        'descripcion',
        'costo_prod',
    	'locacion',
    	'long',
    	'lat',
    	'enologo_id',
    	'wine_maker_id',
    	'contacto',
    	'puesto',
    	'correo',
    	'celular',
    	'telefono',
    	'productora',
        'comentarios'
    ];
    protected $hidden=[
    	'created_at',
    	'updated_at'
    ];

    public function enologo()
    {
    	return $this->belongsTo('App\Enologo', 'enologo_id');
    }
    public function wine_maker()
    {
    	return $this->belongsTo('App\Enologo','wine_maker_id');
    }
    public function uvasBod(){
        return $this->morphMany('App\UvaProducida','producidas');
    }

    public function barricas()
    {
    	return $this->hasMany('App\BarricaBodega','bodega_id','id');
    }
    public function productores()
    {
    	return $this->hasMany('App\Productor','bodega_id','id');
    }
    public function barricas_producidas(){
    	return $this->morphMany('App\Barrica','producido');
    }

    public function getMapLink(){
        return 'https://www.google.com.mx/maps?q=' . $this->lat . ',' . $this->long;
    }
}
