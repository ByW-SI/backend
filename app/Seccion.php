<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seccion extends Model
{
    protected $table = "secciones";

    protected $fillable = ["nombre"];

    public function perfiles()
    {
        return $this->belongsToMany('App\Perfil');
    }
}
