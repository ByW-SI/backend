<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductorUva extends Model
{
    protected $table = "productores_uvas";
    protected $fillable = [
        "persona_id"
    ];
}
