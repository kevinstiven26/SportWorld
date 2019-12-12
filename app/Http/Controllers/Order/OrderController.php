<?php

namespace App\Http\Controllers\Order;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Customer;
use App\Order;
use App\OrderProduct;
use App\AdditionalField;
use App\FieldValue;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $user = Auth::user();
        $name = $user->name;
        $email = $user->email;
        $page = request()->has('page') ? request()->query('page') : null;

        $shoppingCart = session()->has('shopping_cart.products') ? session('shopping_cart.products') : [];
        $total = 0;
        if(count($shoppingCart) >0 ) {
            foreach ($shoppingCart as $product) {
                $total = isset($quantity['quantity_'.$product->id]) ?  $total += ($product->price * $quantity['quantity_'.$product->id]) : $total += ($product->price * 1);
            }
        }

        $view = is_null($page) ? 'order.index' : "order.index$page";

        return view($view, compact('total', 'name', 'email'));
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
        $page = request()->has('page') ? request()->input('page') : null;

        $shoppingCart = session()->has('shopping_cart.products') ? session('shopping_cart.products') : [];
        $quantity = session()->has('quantity') ? session()->get('quantity') : [] ;
        $total = 0;

        if(count($shoppingCart) >0 ) {
            foreach ($shoppingCart as $product) {
                $total = isset($quantity['quantity_'.$product->id]) ?  $total += ($product->price * $quantity['quantity_'.$product->id]) : $total += ($product->price * 1);
            }
        }

        $view = is_null($page) ? 'order.index' : "order.index$page";

        switch($page) {
            case '2':

                $request->validate([
                    'names' => 'required',
                    'address' => 'required',
                    'state' => 'required',
                    'country' => 'required',
                    'telephone' => 'required',
                    'email' => 'required'
                ]);

                $names = $request->input('names');
                $company = $request->input('company');
                $address = $request->input('address');
                $state = $request->input('state');
                $country = $request->input('country');
                $telephone = $request->input('telephone');
                $email = $request->input('email');

                $array_address = [ 'names' => $names,
                                    'company' => $company,
                                    'address' => $address,
                                    'state' => $state,
                                    'country' => $country,
                                    'telephone' => $telephone,
                                    'email' => $email];

                session()->put('address', $array_address);
            break;
            case '3':
                $delivery = $request->input('delivery');
                session()->put('delivery', $delivery);
            case '4':
                $payment = $request->input('payment');
                session()->put('payment', $payment);
            break;
            case '5':

                $user = Auth::user();

                $customer = Customer::where('user_id', '=', $user->id)->first();
                $customerId = $customer->id;

                \extract(session()->get('address'));
                $order = Order::create([
                    'date' => \date('Y-m-d'),
                    'city' => $country,
                    'address' => $address,
                    'state' => $state,
                    'deliver_date' => \date('Y-m-d'),
                    'observations' => 'null',
                    'guide_number' => 0,
                    'customer_id' => $customerId,
                ]);

                $shoppingCart = session()->has('shopping_cart.products') ? session('shopping_cart.products') : [];
                $quantity = session()->has('quantity') ? session()->get('quantity') : [] ;

                if(count($shoppingCart) >0 ) {
                    foreach ($shoppingCart as $product) {

                        $cantity = isset($quantity['quantity_'.$product->id]) ? $quantity['quantity_'.$product->id] : 1;
                        OrderProduct::create([
                            'product_id' => $product->id,
                            'order_id' => $order->id,
                            'quantity' => $cantity
                        ]);

                        if(isset($quantity['field_value_'.$product->id])) {

                            $field_value = FieldValue::where('name', '=', $quantity['field_value_'.$product->id])->first();
                            $value = $quantity['field_value_'.$product->id];
                            AdditionalField::create([
                                'value' => $value,
                                'product_id' => $product->id,
                                'field_product_id' => $field_value->field_product_id,
                                'order_id' => $order->id

                            ]);
                        }

                    }
                }

                $orders = Order::where('customer_id', '=', $customerId)->get();
                //session()->flush();
                session()->forget('shopping_cart.products');
                session()->forget('quantity');
                return redirect()->route('customers.orders.index', $customerId);
            break;

        }

        return view($view, compact('total', 'quantity', 'shoppingCart'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($shoppingcart)
    {
        $shoppingCart = session()->has('shopping_cart.products') ? session('shopping_cart.products') : [];
        $total = 0;
        if(count($shoppingCart) >0 ) {
            foreach ($shoppingCart as $product) {
                $total = isset($quantity['quantity_'.$product->id]) ?  $total += ($product->price * $quantity['quantity_'.$product->id]) : $total += ($product->price * 1);
            }
        }

        $view = is_null($shoppingcart) ? 'order.index' : "order.index$shoppingcart";

        return view($view, compact('total'));
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
