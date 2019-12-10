@extends('layout.app')

@section('title')
- Información de Despacho
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
                  <li aria-current="page" class="breadcrumb-item active"> Información de Despacho</li>
                </ol>
              </nav>
            </div>
            <div id="checkout" class="col-lg-9">
              <div class="box">
                <form method="POST" action="{{ route('orders.store') }}">
                   @csrf
                   <input name="page" type="hidden" value="2"/>
                  <h1>Información de Despacho</h1>
                  <div class="nav flex-column flex-md-row nav-pills text-center"><a href="{{ route('orders.index') }}" class="nav-link flex-sm-fill text-sm-center active"> <i class="fa fa-map-marker"></i>Despacho</a><a href="#" class="nav-link flex-sm-fill text-sm-center disabled"> <i class="fa fa-truck"></i>Método Entrega</a><a href="#" class="nav-link flex-sm-fill text-sm-center disabled"> <i class="fa fa-money"></i>Método Pago</a><a href="#" class="nav-link flex-sm-fill text-sm-center disabled"> <i class="fa fa-eye"></i>Resumen Orden</a></div>
                  <div class="content py-3">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="firstname">Nombres</label>
                          <input id="firstname" type="text" class="form-control @error('names') is-invalid @enderror" value="{{ $name }}" name="names">
                            @error('names')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                      </div>
                    </div>
                    <!-- /.row-->
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="company">Compañia</label>
                          <input id="company" type="text" class="form-control" name="company">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="street">Dirección</label>
                          <input id="street" type="text" class="form-control  @error('address') is-invalid @enderror" name="address">
                            @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                      </div>
                    </div>
                    <!-- /.row-->
                    <div class="row">
                      <div class="col-md-6 col-lg-6">
                        <div class="form-group">
                          <label for="state">Departamento</label>
                          <input id="state" type="text" class="form-control @error('state') is-invalid @enderror" name="state">
                            @error('state')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                      </div>
                      <div class="col-md-6 col-lg-6">
                        <div class="form-group">
                          <label for="country">Ciudad</label>
                          <input id="country" type="text" class="form-control @error('country') is-invalid @enderror" name="country">
                            @error('country')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                      </div>
                      </div>
                      <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="phone">Teléfono</label>
                          <input id="phone" type="text" class="form-control @error('telephone') is-invalid @enderror" name="telephone">
                            @error('telephone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="email">Correo</label>
                          <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" value="{{ $email }}" name="email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                      </div>
                    </div>
                    <!-- /.row-->
                  </div>
                  <div class="box-footer d-flex justify-content-between"><a href="{{ route('shoppingcarts.index') }}" class="btn btn-outline-secondary"><i class="fa fa-chevron-left"></i>Regresar a los productos</a>
                    <button type="submit" class="btn btn-primary">Continuar Método Entrega<i class="fa fa-chevron-right"></i></button>
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
                          <td>Subtotal</td>
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
