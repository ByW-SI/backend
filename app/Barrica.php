<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Barrica extends Model
{
    //
    use SoftDeletes;
    protected $table="barrica";

    protected $fillable =[
    	'id',
    	'tipo_bar',
    	'uva_vinicola_id',
    	'vinicola_id',
    	'precio_barrica',
    	'precio_publico',
    ];

    protected $hidden =[
    	'created_at',
    	'updated_at',
    ];

    public function vinicola(){
    	return $this->belongsTo('App\Vinicola', 'vinicola_id');
    }

    public function uvaVin(){
    	return $this->belongsTo('App\UvaVinicola', 'uva_vinicola_id');
    }

}
