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

        "anio_inicio_actividades",
        "semblanza_profesional"
    ];

    // =============
    // RELATIONSHIPS
    // =============

    public function direcciones()
    {
        return $this->belongsToMany('App\Direccion', 'direccion_persona', 'persona_id', 'direccion_id');
    }

    public function empresa()
    {
        return $this->hasOne('App\Empresa');
    }

    // ===============
    // 
    // ===============

    public function getNombreCompletoAttribute()
    {
        return $this->nombre . " " . $this->apellido_paterno . " " . $this->apellido_materno;
    }
}
