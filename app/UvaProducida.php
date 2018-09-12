<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UvaProducida extends Model
{
    //
    protected $table="uva_producida";

    protected $fillable=[
    	'id',
    	'nombre',
    	'hectarea',
    	'producidas_type',
    	'producidas_id',
        'costo'
    ];

    protected $hidden=[
    	'created_at',
    	'updated_at'
    ];

    public function producidas()
    {
        return $this->morphTo();
    }
    public function uva()
    {
    	return $this->belongsTo('App\Uva','uva_id');
    }
}
