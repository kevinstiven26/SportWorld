<?php

namespace App\Http\Controllers\FieldType;

use App\FieldType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FieldTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $field_types = FieldType::all();
        return view('fieldType.index', compact('field_types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('fieldType.create');
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
        ]);
        
        FieldType::create($validated);
        return redirect()->route('field_types.index');
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
    public function edit(FieldType $field_type)
    {
        return view('fieldType.create',compact('field_type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FieldType $field_type)
    {
        $validated = $request->validate([
            'name' => 'max:75',
        ]);

        if($request->has('name')) {
            $field_type->name = $request->name;
        }

        if(!$field_type->isDirty()) {
            return $this->errorResponse('Por favor cambie al menos uno de los campos.',422);
        }

        $field_type->save();

        return redirect()->route('field_types.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(FieldType $field_type)
    {
        $field_type->delete();
        return redirect()->route('field_types.index');
    }
}
