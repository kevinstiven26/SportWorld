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
                  <li aria-current="page" class="breadcrumb-item"><a href="#">Ordenes</a></li>
                  <li aria-current="page" class="breadcrumb-item active">Orden # {{ $order->id }}</li>
                </ol>
              </nav>
            </div>
            <div id="customer-order" class="col-lg-12">
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
                <div class="row">
                    <div class="col-lg-9">
                        @if( $califications->count() == 0 )
                        <h1>Calificar Orden</h1>
                        <p class="lead">Calfica la Orden de 1 a 5, siendo 5 el valor mas alto.</p>
                        <form method="POST" action="{{ route('orders.califications.store', $order->id) }}">
                          @csrf
                        <div class="row">
                            <input name="customerId" type="hidden" value="{{ $customer->id }}" />
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="password_old">Calificación</label>
                                    <select name="calification" class="form-control">
                                        <option value="1"> 1</option>
                                        <option value="2"> 2</option>
                                        <option value="3"> 3</option>
                                        <option value="4"> 4</option>
                                        <option value="5"> 5</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-10">
                                <div class="form-group">
                                    <label for="password_old">Observaciones</label>
                                    <textarea rows="4" cols="50" name="observations" class="form-control @error('observations') is-invalid @enderror"></textarea>
                                    @error('observations')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <!-- /.row-->
                        <div class="col-md-5 text-center">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Guardar</button>
                        </div>
                        </form>
                        @else
                            <h1>Calificaciones</h1>
                            <div class="table-responsive mb-4">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Calificación</th>
                                        <th>Observaciones</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach( $califications as $c)
                                    <tr>
                                        <td>{{ $c->calification }}</td>
                                        <td><p>{{ $c->observations }}</p></td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot></tfoot>
                                </table>
                            </div>
                        @endif
                    </div>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
@endsection
