<?php

namespace App\Http\Controllers\Order;

use App\Order;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Order2Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::join('order_products as op', 'orders.id', '=', 'op.order_id')
            ->join('products as p', 'op.product_id', '=', 'p.id')
            ->join('customers', 'customers.id','=', 'orders.customer_id')
            ->select('orders.id', 'orders.date', DB::raw('SUM(p.price * op.quantity) as total'), 'customers.name as customer_name')
            ->groupBy('orders.id', 'orders.date', 'customer_name')
            ->get();

        return view('order.orders', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::findOrFail($id);
        $products = Order::join('order_products as op', 'orders.id', '=', 'op.order_id')
            ->join('products as p', 'op.product_id', '=', 'p.id')
            ->leftJoin('additional_fields as af', function ($join) {
                $join->on('af.product_id', '=', 'op.product_id')
                ->on('af.order_id', '=', 'orders.id');
            })
            ->leftJoin('field_products as fp', 'fp.id', '=', 'af.field_product_id')
            ->select('p.*', 'op.quantity', 'af.value', 'fp.name as field_product')
            ->where('orders.id', '=', $id)
            ->get();

        $califications = Order::join('califications as c', 'orders.id', '=', 'c.order_id')
        ->where('orders.id', '=', $id)
        ->select('c.*')
        ->get();

        $total = 0;
        foreach ($products as $p) {
            $total += ($p->price * $p->quantity);
        }

        return view('order.detail2', compact('products', 'order', 'total', 'califications'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
