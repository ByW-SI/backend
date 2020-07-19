<?php

namespace App\Services;

use App\Enoturista;

class StoreEnoturistaService
{

    protected $persona;
    protected $direccion;
    protected $empresa;
    protected $enoturista;

    public function __construct($persona, $direccion, $empresa)
    {
        $this->persona = $persona;
        $this->direccion = $direccion;
        $this->empresa = $empresa;
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
    }
}
