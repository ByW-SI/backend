<?php

namespace App\Services;

class StoreDistribuidorService
{

    protected $persona;
    protected $empresa;
    protected $direccion;

    public function __construct($persona, $empresa, $direccion)
    {
        $this->persona = $persona;
        $this->empresa = $empresa;
        $this->direccion = $direccion;
    }

    public function execute()
    {
        $this->persona->save();
        $this->direccion->save();
        $this->persona->direcciones()->attach($this->direccion->id);
        $this->empresa->persona_id = $this->persona->id;
        $this->empresa->save();
    }
}
