<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    protected $table = "perfiles";
    protected $fillable = ['nombre'];

    public function secciones()
    {
        return $this->belongsToMany('App\Seccion');
    }

    public function users()
    {
        return $this->hasMany('App\User');
    }
}
