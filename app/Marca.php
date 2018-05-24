<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Marca extends Model
{
	use softDeletes;
    //
    protected $table = "marcas_vinicola";

    protected $fillable =[
    	'id',
    	'vinicola_id',
    	'nombre',
    	'descripcion',
    ];

    protected $hidden=[
    	'created_at',
    	'updated_at',
    	'deleted_at',
    ];

    public function vinicola()
    {
    	# code...
    	return $this->belongsTo('App\Vinicola','vinicola_id');
    }


}
