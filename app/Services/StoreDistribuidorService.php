<?php

namespace App\Services;

use App\Distribuidor;

class StoreDistribuidorService
{

    protected $persona;
    protected $empresa;
    protected $direccion;
    protected $distribuidor;

    public function __construct($persona, $empresa, $direccion)
    {
        $this->persona = $persona;
        $this->empresa = $empresa;
        $this->direccion = $direccion;
    }

    public function execute()
    {
        $this->persona->save();
        $this->distribuidor = Distribuidor::create([
            'persona_id' => $this->persona->id
        ]);
        $this->direccion->save();
        $this->persona->direcciones()->attach($this->direccion->id);
        $this->empresa->persona_id = $this->persona->id;
        $this->empresa->save();
    }
}
