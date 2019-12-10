@section('title') - My Account @endsection
@extends('layout.app')
@section('content')
<div id="content">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <!-- breadcrumb-->
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{ route('inicio') }}">Inicio</a></li>
                  <li aria-current="page" class="breadcrumb-item active">Mi cuenta</li>
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
                  <ul class="nav nav-pills flex-column"><a href="{{ route('customers.orders.index', $customer->id) }}" class="nav-link"><i class="fa fa-list"></i> Mis Ordenes</a><!--<a href="customer-wishlist.html" class="nav-link"><i class="fa fa-heart"></i> My wishlist</a>--><a href="{{ route('customers.show', $customer->id) }}" class="nav-link active"><i class="fa fa-user"></i> Mi cuenta</a><a href="#" class="nav-link"><i class="fa fa-sign-out"></i> Cerrar Sesión</a></ul>
                </div>
              </div>
              <!-- /.col-lg-3-->
              <!-- *** CUSTOMER MENU END ***-->
            </div>
            <div class="col-lg-9">
              <div class="box">
                <h1>Mi cuenta</h1>
                <p class="lead">Modifica tu información personal o contraseña.</p>
                <h3>Cambiar Contraseña</h3>
                <form>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="password_old">Contraseña actual</label>
                        <input id="password_old" type="password" class="form-control">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="password_1">Nueva contraseña</label>
                        <input id="password_1" type="password" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="password_2">Confirma nueva contraseña</label>
                        <input id="password_2" type="password" class="form-control">
                      </div>
                    </div>
                  </div>
                  <!-- /.row-->
                  <div class="col-md-12 text-center">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Guardar</button>
                  </div>
                </form>
                <h3 class="mt-5">Información Personal</h3>
                <form>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="firstname">Identificación</label>
                        <input id="identification" type="number" class="form-control" value="{{ $customer->identification }}">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="firstname">Nombres</label>
                        <input id="name" type="text" class="form-control" value="{{ $customer->name }}">
                      </div>
                    </div>
                  </div>
                  <!-- /.row-->
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="street">Dirección</label>
                        <input id="street" type="text" class="form-control" value="{{ $customer->address }}">
                      </div>
                    </div>
                  </div>
                  <!-- /.row-->
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="phone">Teléfono</label>
                        <input id="phone" type="text" class="form-control" value="{{ $customer->phone }}">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="email">Email</label>
                        <input id="email" type="text" class="form-control" value="{{ $customer->email }}">
                      </div>
                    </div>
                    <div class="col-md-12 text-center">
                      <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Guardar</button>
                    </div>
                 </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection
