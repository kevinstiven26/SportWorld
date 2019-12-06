<?php

namespace App\Http\Controllers\Customer;

use App\Order;
use App\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class CustomerOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function index(Customer $customer)
    {
        $orders = Order::join('order_products as op', 'orders.id', '=', 'op.order_id')
            ->join('products as p', 'op.product_id', '=', 'p.id')
            ->select('orders.id', 'orders.date', DB::raw('SUM(p.price * op.quantity) as total'))
            ->groupBy('orders.id', 'orders.date')
            ->where('orders.customer_id', '=', $customer->id)
            ->get();

        return view('order.my_orders', compact('orders', 'customer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function create(Customer $customer)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Customer $customer)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Customer  $customer
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer, Order $order)
    {
        $products = Order::join('order_products as op', 'orders.id', '=', 'op.order_id')
            ->join('products as p', 'op.product_id', '=', 'p.id')
            ->select('p.*', 'op.quantity')
            ->where('orders.id', '=', $order->id)
            ->get();

        $total = 0;
        foreach ($products as $p) {
            $total += ($p->price * $p->quantity);
        }


        return view('order.detail', compact('customer', 'products', 'order', 'total'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Customer  $customer
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer, Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Customer  $customer
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Customer  $customer
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer, Order $order)
    {
        //
    }
}
