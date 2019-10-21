<?php

namespace App\Http\Controllers\Customer;

use App\User;
use App\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::all();
        return view('customer.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        return view('customer.create', compact('users'));
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
            'identification' => 'required|max:10',
            'name' => 'required|max:100',
            'phone_number' => 'required|max:45',
            'address' => 'required|max:75',
            'email' => 'required|max:50',
            'user_id' => 'required|integer'
        ]);
        
        Customer::create($validated);
        return redirect()->route('customers.index');
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
    public function edit(Customer $customer)
    {
        return view('customer.create',compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        $validated = $request->validate([
            'identification' => 'max:10',
            'name' => 'max:100',
            'phone_number' => 'max:45',
            'address' => 'max:75',
            'email' => 'max:50',
            'user_id' => 'integer'
        ]);

        if($request->has('identification')) {
            $customer->identification = $request->identification;
        }

        if($request->has('name')) {
            $customer->name = $request->name;
        }
        
        if($request->has('phone_number')) {
            $customer->phone_number = $request->phone_number;
        }
        
        if($request->has('address')) {
            $customer->address = $request->address;
        }
        
        if($request->has('email')) {
            $customer->email = $request->email;
        }
        
        if($request->has('user_id')) {
            $customer->user_id = $request->user_id;
        }
        
        if(!$customer->isDirty()) {
            return $this->errorResponse('Por favor cambie al menos uno de los campos.',422);
        }

        $customer->save();

        return redirect()->route('customers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();
        return redirect()->route('customers.index');
    }
}
