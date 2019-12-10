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
                  <li class="breadcrumb-item"><a href="{{ route('inicio') }}">Inicio</a></li>
                  <li aria-current="page" class="breadcrumb-item"><a href="#">Mis Ordenes</a></li>
                  <li aria-current="page" class="breadcrumb-item active">Orden # {{ $order->id }}</li>
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
                  <h3 class="h4 card-title">Sección Cliente</h3>
                </div>
                <div class="card-body">
                  <ul class="nav nav-pills flex-column"><a href="{{ route('customers.orders.index', $customer->id) }}" class="nav-link active"><i class="fa fa-list"></i> Mis Ordenes</a><!-- <a href="customer-wishlist.html" class="nav-link"><i class="fa fa-heart"></i> My wishlist</a> --><a href="{{ route('customers.show', $customer->id ) }}" class="nav-link"><i class="fa fa-user"></i> Mi cuenta</a><a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"class="nav-link"><i class="fa fa-sign-out"></i> Cerrar Sesión</a> <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form></ul>
                </div>
              </div>
              <!-- /.col-lg-3-->
              <!-- *** CUSTOMER MENU END ***-->
            </div>
            <div id="customer-order" class="col-lg-9">
              <div class="box">
                <h1>Orden #{{ $order->id }}</h1>
                <p class="lead">Orden #{{ $order->id }} fue creada <strong>{{ $order->date }}</strong> y está actualmente <strong>En Entrega</strong>.</p>
                <hr>
                <div class="table-responsive mb-4">
                  <table class="table">
                    <thead>
                      <tr>
                        <th colspan="2">Producto</th>
                        <th></th>
                        <th>Cantidad</th>
                        <th>Precio Unidad</th>
                        <th>Total</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach( $products as $product)
                      <tr>
                        <td><a href="#"><img src="https://via.placeholder.com/50x50" alt="{{ $product->name }}"></a></td>
                        <td><a href="#">{{ $product->name }}</a></td>
                        <td>@if($product->field_product && $product->value){{ $product->field_product .' '. $product->value }}@else{{ '-' }}@endif</td>
                        <td>{{ $product->quantity }}</td>
                        <td>${{ number_format($product->price, 0, '.', ',') }}</td>
                        <td>{{ number_format($product->price * $product->quantity, 0, '.', ',') }}</td>
                      </tr>
                      @endforeach
                    </tbody>
                    <tfoot>
                      <tr>
                        <th colspan="5" class="text-right">Subtotal Orden</th>
                        <th>${{ number_format($total, 0, '.', ',') }}</th>
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
                  <div class="col-lg-9 offset-3 ">
                    <h2>Dirección de Envío</h2>
                    <p>{{ $order->address }}<br>{{ $order->state }}<br>{{ $order->city }}<br></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection
