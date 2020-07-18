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
}
