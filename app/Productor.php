<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Productor extends Model
{
	//
	protected $table = "productores";
	protected $fillable = [
		'id',
		'nombre',
		'apellido_paterno',
		'apellido_materno',

		'estado',
		'ciudad',
		'municipio',
		'codigo_postal',
		'calle',
		'num_exterior',
		'num_interior',
		'localidad',
		'lat',
		'long',

		'nombre_empresa',
		'telefono_empresa',
		'sitio_web_empresa',

		'tipo_productor',
		'anio_inicio_actividades',
		'semblanza_profesional',

		'premios_y_reconocimientos',
		'etiquetas_producidas',
	];
	protected $hidden = [
		'created_at',
		'updated_at'
	];
	public function bodega()
	{
		return $this->belongsTo('App\Bodega', 'bodega_id');
	}
	public function vinicola()
	{
		return $this->belongsTo('App\Vinicola', 'vinicola_id');
	}
	public function barricas_producidas()
	{
		return $this->morphMany('App\Barricas', 'producido');
	}

	/**
	 * ============
	 * 
	 * ============
	 */

	public function getMapLink()
	{
		return 'https://www.google.com.mx/maps?q=' . $this->lat . ',' . $this->long;
	}

	/**
	 * ==========
	 * ATTRIBUTES
	 * ==========
	 */

	public function getNombreCompletoAttribute()
	{
		return $this->nombre . " " . $this->apellido_paterno . " " . $this->apellido_materno;
	}
}
