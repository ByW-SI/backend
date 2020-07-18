<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Direccion extends Model
{
    protected $table = "direcciones";
    protected $fillable = [
        "calle",
        "num_exterior",
        "num_interior",
        "localidad",
        "ciudad",
        "municipio",
        "estado",
        "codigo_postal",
    ];
}
