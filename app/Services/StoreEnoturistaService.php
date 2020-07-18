<?php

namespace App\Services;

class StoreEnoturistaService
{

    protected $persona;
    protected $direccion;
    protected $empresa;

    public function __construct($persona, $direccion, $empresa)
    {
        $this->persona = $persona;
        $this->direccion = $direccion;
        $this->empresa = $empresa;
    }

    public function execute()
    {
        $this->persona->save();
        $this->direccion->save();
        $this->persona->direccion()->attach($this->direccion->id);
        $this->empresa->persona_id = $this->persona->id;
        $this->empresa->save();
    }
}
