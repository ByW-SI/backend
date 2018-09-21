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

    public function InShoppingCartCount(){
        $inCart= $this->myShoppingCart->inShoppingCart->count();
        $compras = $this->user->shoppingCarts()->comprados()->with(['inShoppingCart'])->count();
        // dd($inCart);
        return response()->json(['in_shopping_cart'=>$inCart,'compras'=>$compras],201);
    }

    public function addInShoppingCart(Request $request){
        
        $rules = [
            // 'shopping_cart'=>'required|numeric',
            'barrica'=>'required|numeric',
            'cantidad'=>'required|numeric'
        ];
        $this->validate($request,$rules);
        $barrica = Barrica::findOrFail($request['barrica']);

         // SI LA BARRICA EXISTE 
        if($barrica){

            // SI YA ESTA AGREGADA LA BARRICA EN EL CARRITO ACTUALIZAMOS EL PRECIO Y CANTIDAD
            if ($this->myShoppingCart->inShoppingCart()->where('barrica_id',$barrica->id)->exists()) {

                // sacamos el atributo
                $inShoppingCart = $this->myShoppingCart->inShoppingCart()->where('barrica_id',$barrica->id)->first();

                // Modificamos el pivote existente
                $this->myShoppingCart->inShoppingCart()->updateExistingPivot($barrica->id,['cantidad'=>$inShoppingCart->pivot->cantidad + $request->cantidad,'precio_unit'=>$barrica->precio_publico ? $barrica->precio_publico : $barrica->precio_venta]);
            }

            // DE LO CONTRARIO, LO AGREGAMOS AL CARRITO
            else{
                $this->myShoppingCart->inShoppingCart()->attach($barrica->id,['cantidad'=>$request->cantidad,'precio_unit'=>$barrica->precio_publico ? $barrica->precio_publico : $barrica->precio_venta]);
                
            }
            $this->setTotal($this->myShoppingCart);
            // $this->myShoppingCart->total = $this->myShoppingCart->total();
            // $this->myShoppingCart->save();
            // ENLISTAR LAS BARRICAS EN EL CARRITO
            foreach ($this->myShoppingCart->inShoppingCart as $inShoppingCart) {
                // No se por que diablos no puedo utilizar el with en myShoppingCart
                // la unica forma de enlistar los productos en mi carrito es esta
            }

            return response()->json(['myShoppingCart'=>$this->myShoppingCart],201);
        }
    }

    public function removeInShoppingCart(Request $request)
    {
        $rules = [
            // 'shopping_cart'=>'required|numeric',
            'barrica'=>'required|numeric',
        ];
        $this->validate($request,$rules);
        $barrica = Barrica::findOrFail($request['barrica']);

         // SI LA BARRICA EXISTE 
        if($barrica){
            $this->myShoppingCart->inShoppingCart()->detach($barrica->id);
            $this->setTotal($this->myShoppingCart);
        }
        foreach ($this->myShoppingCart->inShoppingCart as $inShoppingCart) {
            // No se por que diablos no puedo utilizar el with en myShoppingCart
            // la unica forma de enlistar los productos en mi carrito es esta
        }

        return response()->json(['myShoppingCart'=>$this->myShoppingCart],201);
    }

    public function setTotal($shoppingCart){
        $shoppingCart->total = $shoppingCart->total();
        $shoppingCart->save();
    }

}
