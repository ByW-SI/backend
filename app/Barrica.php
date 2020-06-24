<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barrica extends Model
{
    //
    protected $table = "barrica";
    protected $fillable = [
        'id',
        // 'producido',
        'enologo_id',
        'tipo_bar',
        'tostado',
        'uva',
        'bodega_id',
        'vinicola_id',
        'fecha_inicio',
        'fecha_embotellado',
        'meses_barrica',
        'meses_estabilizacion',
        'costo_uva',
        'costo_barrica',
        'fecha_envio',
        'anada',

        'costo_levadura',
        'costo_botella',
        'costo_corcho',
        'costo_etiqueta',
        'costo_servicios_enologicos',
        'porcentaje_administracion',
        'porcentaje_utilidad',
        'porcentaje_transporte',
    ];
    protected $hidden = [
        'created_at',
        'updated_at'
    ];
    public function bodega()
    {
        return $this->belongsTo('App\Bodega', 'bodega_id');
    }

    public function enologo()
    {
        return $this->belongsTo('App\Enologo', 'enologo_id');
    }


    public function vinicola()
    {
        return $this->belongsTo('App\Vinicola', 'vinicola_id');
    }
    public function producido()
    {
        return $this->morphTo();
    }
    public function barrica_bodega()
    {
        return $this->belongsTo('App\BarricaBodega', 'barrica_bodega_id');
    }

    public function procesos()
    {
        return $this->hasMany('App\Proceso');
    }

    // ==========
    // SUBTOTALES
    // ==========

    public function getSubtotalVinoAttribute()
    {
        return
            $this->costo_uva +
            $this->costo_barrica +
            $this->costo_levadura +
            $this->costo_botella +
            $this->costo_corcho +
            $this->costo_etiqueta +
            $this->costo_servicios_enologicos;
    }

    public function getIepsAttribute()
    {
        return $this->subtotal_vino * 0.24;
    }

    public function getIvaAttribute()
    {
        return $this->subtotal_vino * 0.16;
    }

    public function getImpuestosAttribute()
    {
        return $this->ieps + $this->iva;
    }

    public function getCostoAdministracionAttribute()
    {
        return ($this->subtotal_vino + $this->impuestos) * $this->porcentaje_administracion / 100;
    }

    public function getUtilidadAttribute()
    {
        return ($this->subtotal_vino +  $this->impuestos + $this->costo_administracion) * $this->porcentaje_utilidad / 100;
    }

    public function getCostoTransporteAttribute()
    {
        return ($this->subtotal_vino + $this->impuestos + $this->costo_administracion + $this->utilidad) * $this->porcentaje_transporte / 100;
    }

    public function getPrecioVentaBarricaAttribute()
    {
        return
            $this->subtotal_vino +
            $this->impuestos +
            $this->costo_administracion +
            $this->costo_transporte +
            $this->utilidad;
    }

    public function getPrecioVentaBotellaAttribute()
    {
        return
            $this->precio_venta_barrica / 260;
    }

    public function getPrecioVentaCajaAttribute()
    {
        return $this->precio_venta_botella * 12;
    }
}
