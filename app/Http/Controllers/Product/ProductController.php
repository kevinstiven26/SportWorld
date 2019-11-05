<?php

namespace App\Http\Controllers\Product;

use App\Category;
use App\Product;
use App\Provider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $providers = Provider::all();
        $categories = Category::all();
        return view('product.create', compact('providers','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:75',
            'description' => 'required',
            'price' => 'required|numeric',
            'image' => 'required',
            'provider_id' => 'required',
            'category_id' => 'required'
        ]);
        
        Product::create($validated);
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $providers = Provider::all();
        $categories = Category::all();
        return view('product.create',compact('product','providers','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => 'required|max:75',
            'description' => 'required',
            'price' => 'required|numeric',
            'image' => 'required',
            'provider_id' => 'required',
            'category_id' => 'required'
        ]);

        if($request->has('name')) {
            $product->name = $request->name;
        }

        if($request->has('description')) {
            $product->description = $request->description;
        }
        
        if($request->has('price')) {
            $product->price = $request->price;
        }
        
        if($request->has('image')) {
            $product->image = $request->image;
        }

        if($request->has('provider_id')) {
            $product->provider_id = $request->provider_id;
        }

        if($request->has('category_id')) {
            $product->category_id = $request->category_id;
        }
        
        if(!$product->isDirty()) {
            return $this->errorResponse('Por favor cambie al menos uno de los campos.',422);
        }

        $product->save();

        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index');
    }
}
