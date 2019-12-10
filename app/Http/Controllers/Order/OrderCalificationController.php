<?php

namespace App\Http\Controllers\Order;

use App\Calification;
use App\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderCalificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function index(Order $order)
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function create(Order $order)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Order $order)
    {
        $request->validate([
            'observations' => 'required'
        ],[
            'observations.required' => 'El campo observaciones es obligatorio.'
        ]);

        Calification::create([
            'calification' => $request->input('calification'),
            'observations' =>  $request->input('observations'),
            'order_id' => $order->id
        ]);

        return redirect()->route('customers.orders.show', ['customer' => $request->input('customerId'), 'order' => $order->id ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @param  \App\Calification  $calification
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order, Calification $calification)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @param  \App\Calification  $calification
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order, Calification $calification)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @param  \App\Calification  $calification
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order, Calification $calification)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @param  \App\Calification  $calification
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order, Calification $calification)
    {
        //
    }
}
