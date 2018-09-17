<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class InShoppingCart extends Pivot
{
    //
    protected $table= "in_shopping_cart";

    protected $fillable=[
    	'shopping_cart_id',
    	'barrica_id',
    	'cantidad',
    	'precio_unit'
    ];

}
