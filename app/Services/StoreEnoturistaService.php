<?php

namespace App\Services;

use App\Enoturista;
use Illuminate\Support\Facades\Storage;

class StoreEnoturistaService
{

    protected $persona;
    protected $direccion;
    protected $empresa;
    protected $enoturista;
    protected $viaje;
    protected $direccionViaje;
    protected $direccionInicioViaje;
    protected $direccionTerminoViaje;
    protected $foto;

    public function __construct($persona, $direccion, $empresa, $viaje, $direccionViaje, $direccionInicioViaje, $direccionTerminoViaje, $foto)
    {
        $this->persona = $persona;
        $this->direccion = $direccion;
        $this->empresa = $empresa;
        $this->viaje = $viaje;
        $this->direccionViaje = $direccionViaje;
        $this->direccionInicioViaje = $direccionInicioViaje;
        $this->direccionTerminoViaje = $direccionTerminoViaje;
        $this->foto = $foto;
    }

    public function execute()
    {
        $this->persona->save();
        $this->enoturista = Enoturista::create([
            'persona_id' => $this->persona->id
        ]);
        // dd( $this->direccion );
        $this->direccion->save();
        $this->persona->direcciones()->attach($this->direccion->id);
        $this->empresa->persona_id = $this->persona->id;
        $this->empresa->save();

        $this->guardarFotoViaje();
        $this->viaje->enoturista_id = $this->enoturista->id;
        $this->direccionViaje->save();
        $this->direccionInicioViaje->save();
        $this->direccionTerminoViaje->save();
        $this->viaje->direccion_id = $this->direccionViaje->id;
        $this->viaje->direccion_inicio_id = $this->direccionInicioViaje->id;
        $this->viaje->direccion_termino_id = $this->direccionTerminoViaje->id;
        $this->viaje->save();

    }

    public function guardarFotoViaje(){
        if ($this->foto) {
            $extensionImagen = $this->foto->getClientOriginalExtension();
            $imagenStored = Storage::disk('public')->putFileAs('enoturismos/viajes/' . $this->enoturista->id, $this->foto, $this->enoturista->id . '.' . $extensionImagen);

            $this->viaje->foto = Storage::url($imagenStored);
        }
    }
}
