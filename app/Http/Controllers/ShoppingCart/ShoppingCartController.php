<?php

namespace App\Http\Controllers\ShoppingCart;

use App\ShoppingCart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\FieldProduct;

class ShoppingCartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shoppingCart = session()->has('shopping_cart.products') ? session('shopping_cart.products') : [];
        $quantity = session()->has('quantity') ? session()->get('quantity') : [];

         $field_products = FieldProduct::join('category_field_product as cfp', 'cfp.field_product_id', '=', 'field_products.id')
        ->join('field_values as fp', 'fp.field_product_id', '=', 'cfp.field_product_id')
        ->select('field_products.*', 'fp.*', 'cfp.category_id')
        ->get();

        $total = 0;
        if(count($shoppingCart) >0 ) {
            foreach ($shoppingCart as $product) {
                $total = isset($quantity['quantity_'.$product->id]) ?  $total += ($product->price * $quantity['quantity_'.$product->id]) : $total += ($product->price * 1);
            }
        }

        return view('shoppingcarts.index', compact('shoppingCart', 'total', 'quantity', 'field_products'));
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

        $field_products = FieldProduct::join('category_field_product as cfp', 'cfp.field_product_id', '=', 'field_products.id')
        ->join('field_values as fp', 'fp.field_product_id', '=', 'cfp.field_product_id')
        ->select('field_products.*', 'fp.*', 'cfp.category_id')
        ->get();

        $shoppingCart = session()->has('shopping_cart.products') ? session('shopping_cart.products') : null;
        $total = 0;

        if(isset($parameter['index'])) {
            session()->forget('shopping_cart.products');
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

        $shoppingCart = session()->has('shopping_cart.products') ? session('shopping_cart.products') : [];
        $quantity = session()->has('quantity') ? session()->get('quantity') : [] ;

        if(count($shoppingCart) >0 ) {
            foreach ($shoppingCart as $product) {
                $total = isset($quantity['quantity_'.$product->id]) ?  $total += ($product->price * $quantity['quantity_'.$product->id]) : $total += ($product->price * 1);
            }
        }

        return view('shoppingcarts.index', compact('shoppingCart', 'total', 'quantity', 'field_products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*
        $parameters = $request->input();
        session()->forget('quantity');
        session()->put('quantity', $parameters);
        $quantity = session()->get('quantity');

        $shoppingCart = session('shopping_cart.products');
        $total = 0;
        if(count($shoppingCart) >0 ) {
            foreach ($shoppingCart as $product) {
                $total += $product->price * 1;
            }
        }

        return view('shoppingcarts.index', compact('shoppingCart', 'total', 'quantity'));
        */
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


    public function updateQuantity() {
        $parameters = request()->input();
        session()->forget('quantity');
        session()->forget('field_values');
        session()->put('quantity', $parameters);
        session()->put('field_values', $parameters);

        $quantity = session()->has('quantity') ? session()->get('quantity') : [];

        $field_products = FieldProduct::join('category_field_product as cfp', 'cfp.field_product_id', '=', 'field_products.id')
        ->join('field_values as fp', 'fp.field_product_id', '=', 'cfp.field_product_id')
        ->select('field_products.*', 'fp.*', 'cfp.category_id')
        ->get();

        $shoppingCart = session()->has('shopping_cart.products') ? session('shopping_cart.products') : [];
        $total = 0;
        if(count($shoppingCart) >0 ) {
            foreach ($shoppingCart as $product) {
                $total = isset($quantity['quantity_'.$product->id]) ?  $total += ($product->price * $quantity['quantity_'.$product->id]) : $total += ($product->price * 1);
            }
        }

        return view('shoppingcarts.index', compact('shoppingCart', 'total', 'quantity', 'field_products'));
    }

}
