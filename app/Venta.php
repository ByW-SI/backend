<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    protected $table = "ventas";
    protected $fillable = ["user_id", "status"];

    // =============
    // RELATIONSHIPS
    // =============

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
