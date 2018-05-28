<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vinicola extends Model
{
    //

    protected $table="vinicola";

    protected $fillable=[
    	'id',
    	'nombre',
    	'distinciones',
    	'inicio',
    	'filosofia',
    	'locacion',
    	'enologo',
    	'wine_maker',
    	'vinas',
    	'contacto',
    	'puesto',
    	'correo',
    	'celular',
        'long',
        'lat',
    	'telefono',
    	'observacion',
        'fecha_observacion'
    ];

    protected $hidden=[
    	'created_at',
    	'updated_at'
    ];

    public function marcas(){
        return $this->hasMany('App\Marca', 'vinicola_id','id');
    }

    public function uvas(){
        return $this->hasMany('App\UvaVinicola','vinicola_id','id');
    }
    public function getMapLink(){
        return 'https://www.google.com.mx/maps?q=' . $this->lat . ',' . $this->long;
    }
}
