<?php

namespace App\Http\Controllers\Api\User;

use App\Barrica;
use App\Http\Controllers\Controller;
use App\ShoppingCart;
use Illuminate\Http\Request;

class UserShoppingCart extends Controller
{
    protected $user,$myShoppingCart;

    public function __construct(){
        // dd($request);
        $this->middleware(function ($request, $next) {
            // comprador
            $this->user= $request->user();
            // Buscar su carrito de compra o crear uno
            $this->myShoppingCart = ShoppingCart::findOrCreateMyShoppingCart($this->user->id);
            return $next($request);
        });
        // dd($this->user);
        // $this->user = $request->user();
        // $myShoppingCart = ShoppingCart::findOrCreateMyShoppingCart($this->user->id);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user = $this->user;
        $myShoppingCart = $this->myShoppingCart;
        foreach ($myShoppingCart->inShoppingCart as $inShoppingCart) {
            // No se por que diablos no puedo utilizar el with en myShoppingCart
            // la unica forma de enlistar los productos en mi carrito es esta
        }
        // dd($myShoppingCar->toJson());
        $compras = $this->user->shoppingCarts()->comprados()->with(['inShoppingCart'])->get();
        return response()->json(['user'=>$user,'myShoppingCart'=>$myShoppingCart,'compras'=>$compras],201);
        // dd($request->user());
    }
    public function addInShoppingCart(Request $request){
        
        $rules = [
            // 'shopping_cart'=>'required|numeric',
            'barrica'=>'required|numeric',
            'cantidad'=>'required|numeric'
        ];
        $this->validate($request,$rules);
        $barrica = Barrica::findOrFail($request['barrica']); 
        if($barrica){
            $this->myShoppingCart;
        }
    }

}
