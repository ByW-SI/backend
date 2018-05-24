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
    	'telefono',
    	'calificacion'
    ];

    protected $hidden=[
    	'created_at',
    	'updated_at'
    ];

    public function marcas(){
        return $this->hasMany('App\Marcas', 'vinicola_id','id');
    }

    public function uvas(){
        return $this->hasMany('App\UvaVinicola','vinicola_id','id');
    }

}
