<?php

namespace App\Services;

use App\ProductorUva;

class StoreProductorUvaService
{

    protected $persona;
    protected $productorUva;
    protected $direccion;
    protected $empresa;
    protected $uvasProducidas;

    public function __construct($persona, $direccion, $empresa, $uvasProducidas)
    {
        $this->persona = $persona;
        $this->direccion = $direccion;
        $this->empresa = $empresa;
        $this->uvasProducidas = $uvasProducidas;
    }

    public function execute()
    {
        $this->persona->save();
        $this->productorUva = ProductorUva::create([
            'persona_id' => $this->persona->id
        ]);
        // $this->productorUva->persona_id = $this->persona->id;
        // $this->productorUva->save();
        $this->direccion->persona_id = $this->persona->id;
        $this->direccion->save();
        $this->empresa->persona_id = $this->persona->id;
        $this->empresa->save();

        foreach ($this->uvasProducidas as $uvaProducida) {
            $uvaProducida->productor_uva_id = $this->productorUva->id;
            $uvaProducida->save();
        }
    }
}
