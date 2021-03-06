<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Distribuidor extends Model
{
    protected $table = "distribuidores";
    protected $fillable = [
        "persona_id"
    ];

    // ===============
    // 
    // ===============

    public function persona()
    {
        return $this->belongsTo('App\Persona');
    }
}
