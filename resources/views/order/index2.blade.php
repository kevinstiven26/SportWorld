@extends('layout.app')

@section('title')
- Método de Pago
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
                  <li aria-current="page" class="breadcrumb-item active">Método de Pago</li>
                </ol>
              </nav>
            </div>
            <div id="checkout" class="col-lg-9">{}
              <div class="box">
                <form method="POST" action="{{ route('orders.store') }}">
                   @csrf
                   <input name="page" type="hidden" value="3"/>
                  <h1>Método de Pago</h1>
                  <div class="nav flex-column flex-sm-row nav-pills"><a href="{{ route('orders.index') }}" class="nav-link flex-sm-fill text-sm-center"> <i class="fa fa-map-marker"></i>Despacho</a><a href="{{ route('orders.show', 2) }}" class="nav-link flex-sm-fill text-sm-center active"> <i class="fa fa-truck"></i>Método Entrega</a><a href="#" class="nav-link flex-sm-fill text-sm-center disabled"> <i class="fa fa-money"></i>Método Pago</a><a href="#" class="nav-link flex-sm-fill text-sm-center disabled"> <i class="fa fa-eye"></i>Resumen Orden</a></div>
                  <div class="content py-3">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="box shipping-method">
                          <h4>USPS 15 Días</h4>
                          <p>Tiempo Estimado de Entrega - 15 Días.</p>
                          <div class="box-footer text-center">
                            <input type="radio" name="delivery" value="next-day1">
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="box-footer d-flex justify-content-between"><a href="{{ route('orders.index') }}" class="btn btn-outline-secondary"><i class="fa fa-chevron-left"></i>Regresar a Despacho</a>
                    <button type="submit" class="btn btn-primary">Continuar Método Pago<i class="fa fa-chevron-right"></i></button>
                  </div>
                </form>
              </div>
              <!-- /.box-->
            </div>
            <!-- /.col-md-9-->
            <div class="col-md-3">
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
            <!-- /.col-md-3-->
          </div>
        </div>
      </div>
@endsection
