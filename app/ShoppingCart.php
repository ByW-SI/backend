<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShoppingCart extends Model
{
    //
    protected $table="shopping_cart";

    protected $fillable=[
    	'status',
    	'total',
    	'envio',
    	'user_id',
    	'envio_id',
    	'fiscal_id'
    ];


    public static function findOrCreateMyShoppingCart($user_id){
        $shopping_cart = ShoppingCart::where([
            ['status','created'],
            ['user_id',$user_id]
        ])->first();
        if($shopping_cart){
            return $shopping_cart;
        }
        else{
            $shopping_cart = new ShoppingCart();
            $shopping_cart->user_id = $user_id;
            $shopping_cart->save();
            return $shopping_cart;
        }

    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function domFiscal()
    {
        return $this->belongsTo('App\DomFiscal');
    }

    public function envio()
    {
        return $this->belongsTo('App\DomEnvio');
    }

    public function inShoppingCart(){
        return $this->belongsToMany('App\Barrica','in_shopping_cart', 'shopping_cart_id','barrica_id')
        ->using('App\InShoppingCart')
        ->whitPivot('cantidad','precio_unit');  
    }




}
