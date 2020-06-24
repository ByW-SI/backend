<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Oferta extends Model
{
    protected $table = "ofertas";
    protected $fillable = [
        'nombre_vino',
        'uva_id',
        'aniada',
        'tipo_vino',
        'ruta_imagen',
        'costo_botella',
        'porcentaje_transporte',
        'porcentaje_utilidad'
    ];

    public function uva()
    {
        return $this->belongsTo('App\Uva');
    }

    // ==========
    // ATTRIBUTES
    // ==========

    public function getCostoCajaAttribute()
    {
        return $this->costo_botella * 12;
    }

    public function getSubtotalVentaAttribute()
    {
        return  $this->costo_caja * $this->porcentaje_utilidad / 100;
    }

    public function getCostoTransporteAttribute()
    {
        return $this->costo_caja * $this->porcentaje_transporte / 100;
    }

    public function getPrecioPublicoAttribute()
    {
        return $this->subtotal_venta + $this->costo_transporte;
    }
}
