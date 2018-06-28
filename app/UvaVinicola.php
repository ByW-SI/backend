<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UvaVinicola extends Model
{
    //
    protected $table="uvas_vinicola";

    protected $fillable=[
    	'id',
    	'uva_id',
    	'hectarea',
    	'vinicola_id'
    ];

    protected $hidden=[
    	'created_at',
    	'updated_at'
    ];

    public function vinicola()
    {
    	return $this->belongsTo('App\Vinicola','vinicola_id');
    }
    public function uva()
    {
    	return $this->belongsTo('App\Uva','uva_id');
    }
}
