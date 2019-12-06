@extends('layout.app')

@section('title')
- Mis Ordenes de Compra
@endsection

@section('content')
<div id="content">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <!-- breadcrumb-->
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li aria-current="page" class="breadcrumb-item"><a href="#">My orders</a></li>
                  <li aria-current="page" class="breadcrumb-item active">Order # 1735</li>
                </ol>
              </nav>
            </div>
            <div class="col-lg-3">
              <!--
              *** CUSTOMER MENU ***
              _________________________________________________________
              -->
              <div class="card sidebar-menu">
                <div class="card-header">
                  <h3 class="h4 card-title">Customer section</h3>
                </div>
                <div class="card-body">
                  <ul class="nav nav-pills flex-column"><a href="{{ route('customers.orders.index', $customer->id) }}" class="nav-link active"><i class="fa fa-list"></i> My orders</a><a href="customer-wishlist.html" class="nav-link"><i class="fa fa-heart"></i> My wishlist</a><a href="customer-account.html" class="nav-link"><i class="fa fa-user"></i> My account</a><a href="index.html" class="nav-link"><i class="fa fa-sign-out"></i> Logout</a></ul>
                </div>
              </div>
              <!-- /.col-lg-3-->
              <!-- *** CUSTOMER MENU END ***-->
            </div>
            <div id="customer-order" class="col-lg-9">
              <div class="box">
                <h1>Order #{{ $order->id }}</h1>
                <p class="lead">Order #{{ $order->id }} was placed on <strong>{{ $order->date }}</strong> and is currently <strong>Being prepared</strong>.</p>
                <p class="text-muted">If you have any questions, please feel free to <a href="contact.html">contact us</a>, our customer service center is working for you 24/7.</p>
                <hr>
                <div class="table-responsive mb-4">
                  <table class="table">
                    <thead>
                      <tr>
                        <th colspan="2">Product</th>
                        <th>Quantity</th>
                        <th>Unit price</th>
                        <th>Total</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach( $products as $product)
                      <tr>
                        <td><a href="#"><img src="https://via.placeholder.com/50x50" alt="{{ $product->name }}"></a></td>
                        <td><a href="#">{{ $product->name }}</a></td>
                        <td>{{ $product->quantity }}</td>
                        <td>${{ number_format($product->price, 0, '.', ',') }}</td>
                        <td>{{ number_format($product->price * $product->quantity, 0, '.', ',') }}</td>
                      </tr>
                      @endforeach
                    </tbody>
                    <tfoot>
                      <tr>
                        <th colspan="5" class="text-right">Order subtotal</th>
                        <th>${{ number_format($total, 0, '.', ',') }}</th>
                      </tr>
                      <tr>
                        <th colspan="5" class="text-right">Shipping and handling</th>
                        <th>$0.00</th>
                      </tr>
                      <tr>
                        <th colspan="5" class="text-right">Tax</th>
                        <th>$0.00</th>
                      </tr>
                      <tr>
                        <th colspan="5" class="text-right">Total</th>
                        <th>${{ number_format($total, 0, '.', ',') }}</th>
                      </tr>
                    </tfoot>
                  </table>
                </div>
                <!-- /.table-responsive-->
                <div class="row addresses">
                  <div class="col-lg-6">
                    <h2>Invoice address</h2>
                    <p>John Brown<br>13/25 New Avenue<br>New Heaven<br>45Y 73J<br>England<br>Great Britain</p>
                  </div>
                  <div class="col-lg-6">
                    <h2>Shipping address</h2>
                    <p>John Brown<br>13/25 New Avenue<br>New Heaven<br>45Y 73J<br>England<br>Great Britain</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection