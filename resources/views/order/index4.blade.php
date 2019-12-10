@extends('layout.app')

@section('title')
- Resumen Orden
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
                  <li aria-current="page" class="breadcrumb-item active">Resumen Orden</li>
                </ol>
              </nav>
            </div>
            <div id="checkout" class="col-lg-9">
              <div class="box">
                <form method="POST" action="{{ route('orders.store') }}">
                  @csrf
                  <input name="page" value="5" type="hidden" />
                  <h1>Resumen Orden</h1>
                  <div class="nav flex-column flex-sm-row nav-pills"><a href="{{ route('orders.index') }}" class="nav-link flex-sm-fill text-sm-center"> <i class="fa fa-map-marker"></i>Despacho</a><a href="{{ route('orders.show', 2) }}" class="nav-link flex-sm-fill text-sm-center"> <i class="fa fa-truck"></i>Método Entrega</a><a href="{{ route('orders.show', 3) }}" class="nav-link flex-sm-fill text-sm-center"> <i class="fa fa-money"></i>Método Pago</a><a href="#" class="nav-link flex-sm-fill text-sm-center active"> <i class="fa fa-eye"></i>Resumen Orden</a></div>
                  <div class="content">
                    <div class="table-responsive">
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
                        @foreach( $shoppingCart as $p)
                        <tr>
                          <td><a href="#"><img src="https://via.placeholder.com/50x50" alt="Black Blouse Armani"></a></td>
                          <td><a href="#">{{ $p->name }}</a></td>
                          <td>@if(isset($quantity['field_value_'.$p->id])){{ $quantity["field_products_name_".$p->id].' '.$quantity["field_value_".$p->id] }}@endif</td>
                          <td>
                            @if(isset($quantity) && isset($quantity['quantity_'.$p->id])){{ $quantity['quantity_'.$p->id] }}@else{{ 1 }}@endif
                          </td>
                          <td>$ {{ number_format($p->price, 0, ',', '.') }}</td>
                          <td>$ @if(isset($quantity) && isset($quantity['quantity_'.$p->id])){{ number_format($p->price * $quantity['quantity_'.$p->id], 0, ',', '.') }}@else{{ number_format($p->price, 0, ',', '.') }}@endif</td>
                        </tr>
                        @endforeach
                      </tbody>
                      <tfoot>
                        <tr>
                          <th colspan="5">Total</th>
                          <th colspan="2">$ {{ number_format($total, 0, ',', '.') }}</th>
                        </tr>
                      </tfoot>
                      </table>
                    </div>
                    <!-- /.table-responsive-->
                  </div>
                  <!-- /.content-->
                  <div class="box-footer d-flex justify-content-between"><a href="{{ route('orders.show', 3) }}" class="btn btn-outline-secondary"><i class="fa fa-chevron-left"></i>Regresar Método Pago</a>
                    <button type="submit" class="btn btn-primary">Guardar y Enviar Orden<i class="fa fa-chevron-right"></i></button>
                  </div>
                </form>
              </div>
              <!-- /.box-->
            </div>
            <!-- /.col-lg-9-->
            <div class="col-lg-3">
              <div id="order-summary" class="card">
                <div class="card-header">
                  <h3 class="mt-4 mb-4">Resumen Orden</h3>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <tbody>
                        <tr>
                          <td>Subtotal Orden</td>
                          <th>${{ number_format($total, 0, ',', '.') }}</th>
                        </tr>
                        <tr class="total">
                          <td>Total</td>
                          <th>${{ number_format($total, 0, ',', '.') }}</th>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.col-lg-3-->
          </div>
        </div>
      </div>
@endsection
