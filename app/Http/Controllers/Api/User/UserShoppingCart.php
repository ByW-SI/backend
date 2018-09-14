<?php

namespace App\Http\Controllers\Api\User;

use App\ShoppingCart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
            return $next($this->user,$request);
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
        dd($this->user->shoppingCarts);
        // dd($request->user());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ShoppingCart  $shoppingCart
     * @return \Illuminate\Http\Response
     */
    public function show(ShoppingCart $shoppingCart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ShoppingCart  $shoppingCart
     * @return \Illuminate\Http\Response
     */
    public function edit(ShoppingCart $shoppingCart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ShoppingCart  $shoppingCart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ShoppingCart $shoppingCart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ShoppingCart  $shoppingCart
     * @return \Illuminate\Http\Response
     */
    public function destroy(ShoppingCart $shoppingCart)
    {
        //
    }
}
