<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Oferta extends Model
{
    protected $table = "ofertas";
    protected $fillable = [
        'nombre_vino',
        'aniada',
        'tipo_vino',
        'ruta_imagen',
        'costo_botella',
        'porcentaje_transporte',
        'porcentaje_utilidad',
        'comentario',
        'productor_id',
        'region_id'
    ];

    protected $appends = [
        'costo_caja',
        'subtotal_venta',
        'costo_transporte',
        'precio_publico_caja',
        'precio_publico_botella',
    ];

    public function uvas()
    {
        return $this->belongsToMany('App\Uva')->withPivot('porcentaje');
    }

    public function region(){
        return $this->belongsTo('App\Region');
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

    public function getPrecioPublicoCajaAttribute()
    {
        return $this->subtotal_venta + $this->costo_transporte;
    }

    public function getPrecioPublicoBotellaAttribute()
    {
        return $this->precio_publico_caja / 12;
    }
}
