<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $table = "personas";
    protected $fillable = [
        "nombre",
        "apellido_paterno",
        "apellido_materno",
        "celular",
        "correo",
    ];
}
