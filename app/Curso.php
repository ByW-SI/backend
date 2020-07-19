<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    protected $table = "cursos";
    protected $fillable = [
        "persona_id",
    ];

    public function persona(){
        return $this->belongsTo('App\Persona');
    }
}
