<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vinicola extends Model
{
    //
    protected $table="vinicola";

    protected $fillable=[
    	'id',
    	'tipo',
    	'nombre',
    	'distinciones',
    	'inicio',
    	'filosofia',
    	'locacion',
    	'lat',
    	'long',
    	'contacto',
    	'puesto',
    	'correo',
    	'celular',
    	'telefono',
    	'comentarios',
    	'hectareas',
    	'uvas'
    ];
    
    protected $hidden=[
    	'created_at',
    	'updated_at'
    ];
    public function productores()
    {
    	return $this->hasMany('App\Productor','vinicola_id','id');
    }
}
