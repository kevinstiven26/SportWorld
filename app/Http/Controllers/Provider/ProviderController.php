<?php

namespace App\Http\Controllers\Provider;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Provider;

class ProviderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $providers = Provider::all();
        return view('provider.index', compact('providers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        return view('provider.create');
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
            'nit' => 'required',
            'name' => 'required',
            'logo_image' => 'required',
            'phone_number' => 'required',
            'address' => 'required'
        ]);
        
        Provider::create($validated);
        return redirect()->route('providers.index');
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
    public function edit(Provider $provider)
    {
        return view('provider.create',compact('provider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Provider $provider)
    {
        $validated = $request->validate([
            'nit' => 'max:15',
            'name' => 'max:75',
            'logo_image' => 'max:150',
            'phone_number' => 'max:45',
            'address' => 'max:75'
        ]);

        if($request->has('nit')) {
            $provider->nit = $request->nit;
        }

        if($request->has('name')) {
            $provider->name = $request->name;
        }

        if($request->has('logo_image')) {
            $provider->logo_image = $request->logo_image;
        }
        
        if($request->has('phone_number')) {
            $provider->phone_number = $request->phone_number;
        }
        
        if($request->has('address')) {
            $provider->address = $request->address;
        }
        
        if(!$provider->isDirty()) {
            return $this->errorResponse('Por favor cambie al menos uno de los campos.',422);
        }

        $provider->save();

        return redirect()->route('providers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Provider $provider)
    {
        $provider->delete();

        return redirect()->route('providers.index');
    }
}
