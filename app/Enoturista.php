<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enoturista extends Model
{
    protected $table = "enoturistas";
    protected $fillable = [
        "persona_id"
    ];

    // =========
    // 
    // =========

    public function persona(){
        return $this->belongsTo('App\Persona');
    }

}
