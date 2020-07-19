<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $table = "empresas";
    protected $fillable = [
        "nombre",
        "telefono",
        "sitio_web",
        "inicio_operaciones",
        "persona_id",
    ];
}
