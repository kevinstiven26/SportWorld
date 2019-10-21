<?php

namespace App\Http\Controllers\FieldProduct;

use App\FieldProduct;
use App\FieldType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FieldProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $field_products = FieldProduct::all();
        return view('fieldProduct.index', compact('field_products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $field_types_select = FieldType::all();
        return view('fieldProduct.create', compact('field_types_select'));
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
            'field_type_id' => 'required|integer',
        ]);

        FieldProduct::create($validated);
        return redirect()->route('field_products.index');
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
    public function edit(FieldProduct $field_product)
    {
        return view('fieldProduct.create',compact('field_product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FieldProduct $field_product)
    {
        $validated = $request->validate([
            'name' => 'max:75',
            'field_type_id' => 'integer'
        ]);

        if($request->has('name')) {
            $field_product->name = $request->name;
        }

        if($request->has('field_type_id')) {
            $field_product->field_type_id = $request->field_type_id;
        }
        
        if(!$field_product->isDirty()) {
            return $this->errorResponse('Por favor cambie al menos uno de los campos.',422);
        }

        $field_product->save();

        return redirect()->route('field_products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(FieldProduct $field_product)
    {
        $field_product->delete();
        return redirect()->route('field_products.index');
    }
}
