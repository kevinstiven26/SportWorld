<?php

namespace App\Http\Controllers\Category;

use App\FieldProduct;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryFieldProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function index(Category $category)
    {
        $field_products = $category->field_products()->get();
        return view('category.category_field', compact('field_products','category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function create(Category $category)
    {
        $field_products = FieldProduct::all();
        return view('category.create_category_field', compact('field_products','category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Category $category)
    {
        /* $data = $request->validate([
            'field_product_id' => 'required',
        ]); */

        $category->field_products()->syncWithoutDetaching([$request->field_product]);
        return redirect()->route('category.field_product.index', $category->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @param  \App\FieldProduct  $fieldProduct
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category, FieldProduct $field_product)
    {
        $category->field_products()->detach($field_product->id);
        return redirect()->route('category.field_product.index',$category->id);
    }
}
