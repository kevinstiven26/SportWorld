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
                  <li aria-current="page" class="breadcrumb-item active">Mis Ordenes</li>
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
                  <ul class="nav nav-pills flex-column"><a href="{{ route('customers.orders.index', $customer->id) }}" class="nav-link active"><i class="fa fa-list"></i> Mis Ordenes</a><!-- <a href="#" class="nav-link"><i class="fa fa-heart"></i> My wishlist</a> --><a href="{{ route('customers.show', $customer->id) }}" class="nav-link"><i class="fa fa-user"></i> Mi Cuenta</a><a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"class="nav-link"><i class="fa fa-sign-out"></i> Cerrar Sesión</a> <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form></ul>
                </div>
              </div>
              <!-- /.col-lg-3-->
              <!-- *** CUSTOMER MENU END ***-->
            </div>
            <div id="customer-orders" class="col-lg-9">
              <div class="box">
                <h1>Mis Ordenes</h1>
                <p class="lead">Todas tus ordenes en un solo lugar.</p>
                <hr>
                <div class="table-responsive">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>Orden</th>
                        <th>Fecha</th>
                        <th>Total</th>
                        <th>Estado</th>
                        <th>Opciones</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach( $orders as $order )
                        <tr>
                            <th># {{ $order->id }}</th>
                            <td>{{ $order->date }}</td>
                            <td>$ {{ number_format($order->total, 0, ',', '.') }}</td>
                            <td><span class="badge badge-info">En Entrega</span></td>
                            <td><a href="{{ route('customers.orders.show', ['customer' => $customer->id, 'order' => $order->id ]) }}" class="btn btn-primary btn-sm">Ver Detalle</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection
