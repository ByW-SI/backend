<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UvaProducida extends Model
{
    //
    protected $table = "uvas_producidas";

    protected $fillable = [
        'id',
        'productor_uva_id',
        'uva_id',
        'hectareas',
        'ubicacion_plantio'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function productorUva()
    {
        return $this->belongsTo('App\ProductorUva');
    }

    public function uva()
    {
        return $this->belongsTo('App\Uva', 'uva_id');
    }
}
