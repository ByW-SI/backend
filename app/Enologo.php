<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enologo extends Model
{
	//

	protected $table = "enologo";

	protected $fillable = [
		'id',
		'nombre',
		'paterno',
		'materno',
		'tipo',
		'cv'
	];

	protected $hidden = [
		'created_at',
		'updated_at'
	];


	// ==========
	// ATTRIBUTES
	// ==========

	public function getNombreCompletoAttribute()
	{
		return $this->nombre . " " . $this->paterno . " " . $this->materno;
	}
}
