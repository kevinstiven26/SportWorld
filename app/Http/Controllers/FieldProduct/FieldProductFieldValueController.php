<?php

namespace App\Http\Controllers\FieldProduct;

use App\FieldProduct;
use App\FieldValue;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FieldProductFieldValueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(FieldProduct $field_product)
    {
        $field_values = $field_product->field_values()->get();
        return view('fieldProduct.field_values', compact('field_values','field_product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(FieldProduct $field_product)
    {
        $field_values = FieldValue::all();
        return view('fieldProduct.create_field_value', compact('field_values','field_product'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, FieldProduct $field_product)
    {
        $data = $request->validate([
            'name' => 'required|max:50',
        ]);

        $data['field_product_id'] = $field_product->id;

        FieldValue::create($data);
        return redirect()->route('field_product.field_value.index', [ 'field_product' => $field_product->id ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(FieldProduct $field_product, FieldValue $field_value)
    {
        $field_value->delete();
        return redirect()->route('field_product.field_value.index',['field_product' => $field_product->id]);
    }
}
