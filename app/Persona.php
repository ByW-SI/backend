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

    // =============
    // RELATIONSHIPS
    // =============

    public function direcciones()
    {
        return $this->belongsToMany('App\Direccion', 'direccion_persona', 'persona_id', 'direccion_id');
    }
}
