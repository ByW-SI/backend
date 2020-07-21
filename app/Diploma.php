<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diploma extends Model
{
    protected $table = "diplomas";
    protected $fillable = [
        "imagen",
        "curso_id"
    ];
}
