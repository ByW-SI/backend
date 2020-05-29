<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Oferta extends Model
{
    protected $table = "ofertas";
    protected $fillable = ['nombre_vino', 'uva_id', 'aniada', 'tipo_vino', 'precio', 'ruta_imagen'];

    public function uva()
    {
        return $this->belongsTo('App\Uva');
    }
}
