<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proceso extends Model
{
    //

    protected $fillable=[
    	'proceso',
    	'descripcion',
    	'inicio_proceso',
    	'fin_proceso',
    	'imagen_proceso_path'
    ];

    protected $hidden=['created_at','updated_at'];

    public function barrica()
    {
    	return $this->belongsTo('App\Barrica');
    }
}
