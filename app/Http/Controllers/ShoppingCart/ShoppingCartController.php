<?php

namespace App\Http\Controllers\ShoppingCart;

use App\ShoppingCart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;

class ShoppingCartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('shoppingcart.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $parameter = request()->query();
        $productId = isset($parameter['product']) ? (int) $parameter['product'] : null;

        $shoppingCart = session()->has('shopping_cart.products') ? session('shopping_cart.products') : null;

        if(isset($parameter['index'])) {
            session()->flush();
            $num = \is_array($shoppingCart) ? count($shoppingCart) : 0;
            $index = (int) $parameter['index'];

            for( $i = 0; $i < $num; $i++) {
                if($i !== $index) {
                    session()->push('shopping_cart.products', $shoppingCart[$i]);
                }
            }

        } else {
            $product = Product::findOrFail($productId);
            session()->push('shopping_cart.products', $product);

        }

        $shoppingCart = session('shopping_cart.products');
        return view('shoppingcarts.index', compact('shoppingCart'));
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
