<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paquete extends Model
{
    protected $table = "paquetes";
    protected $fillable = ["precio"];

    public function ofertas()
    {
        return $this->belongsToMany('App\Oferta');
    }

    // ==========
    // ATTRIBUTES
    // ==========

    public function getPrecioOriginalAttribute(){
        return $this->ofertas->pluck('precio_publico_botella')->flatten()->sum();
    }
}
