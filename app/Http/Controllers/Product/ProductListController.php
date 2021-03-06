<?php

namespace App\Http\Controllers\Product;

use App\Product;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Provider;

class ProductListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $param = request()->query();

        $perPage=6;
        if(request()->has('perpage')){
            $perPage=$param['perpage'];
        }

        if(request()->has('category')) {
            $products = Product::join('categories','categories.id','=','products.category_id')
                            ->select('products.*')
                            ->where('category_id','=',$param['category'])
                            ->orWhere('categories.category','=',$param['category'])
                            ->paginate($perPage);
        } else if(request()->has('provider')) { 
            $products = Product::join('providers','providers.id','=','products.provider_id')
                                    ->select('products.*')
                                    ->where('provider_id','=',$param['provider'])
                                    ->paginate($perPage);
        } else if(request()->has('palabra')) {
            $products = Product::where('name','LIKE','%'.$param['palabra'].'%')->paginate($perPage);
        } else {
            $products = Product::paginate($perPage);
        }
        
        $categories = Category::whereNull('category')->get();
        $categories_son = Category::orderBy('category')->orderBy('name')->get();
        $providers = Provider::orderBy('name')->get();
        return view('product.products', compact('products','categories','categories_son','providers'));
    }

    public function show($product_id) {
        $product = Product::where('id','=',$product_id)->first();
        return view('product.detail', compact('product'));
    }
}
