<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    protected $table = "regiones";
    protected $fillable = ["pais_id", "nombre"];

    public function pais()
    {
        return $this->belongsTo('App\Pais');
    }
}
