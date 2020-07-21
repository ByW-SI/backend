<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Viaje extends Model
{
    protected $table = "viajes";
    protected $fillable = [
        "lugar",
        "puntos_interes",
        "direccion_id",
        "direccion_inicio_id",
        "direccion_termino_id",
        "duracion",
        "foto",
    ];

    // 
    // 
    // 

    public function direccion(){
        return $this->belongsTo('App\Direccion');
    }

    public function direccionInicio(){
        return $this->belongsTo('App\Direccion','direccion_inicio_id');
    }

    public function direccionTermino(){
        return $this->belongsTo('App\Direccion','direccion_termino_id');
    }
}
