@extends('layout.app')
@section('content')
<div id="content">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <!-- breadcrumb-->
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li aria-current="page" class="breadcrumb-item active">Contact</li>
            </ol>
          </nav>
        </div>
        <div class="col-lg-12">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
          <div id="contact" class="box">
            @if(isset($provider))
              <h2>Editar Proveedor</h2>
            @else
              <h2>Nuevo Proveedor</h2>
            @endif
          <form method="POST" @if(isset($provider)) action="{{ route('providers.update', [ 'provider' => $provider->id ]) }}" @else action="{{ route('providers.store') }}" @endif>
            @csrf
            @if(isset($provider)) 
              @method('PUT')
            @endif
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="nit">Nit</label>
                  <input id="nit" type="text" class="form-control" name="nit" @if(isset($provider)) value="{{ $provider->nit }}" @endif>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="name">Nombre</label>
                    <input id="name" type="text" class="form-control" name="name" @if(isset($provider)) value="{{ $provider->name }}" @endif>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="logo_image">Imagen Logo</label>
                    <input id="logo_image" type="text" class="form-control" name="logo_image" @if(isset($provider)) value="{{ $provider->logo_image }}" @endif>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="phone_number">Teléfono</label>
                    <input id="phone_number" type="number" class="form-control" name="phone_number" @if(isset($provider)) value="{{ $provider->phone_number }}" @endif>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="address">Dirección</label>
                    <input id="address" class="form-control" name="address" @if(isset($provider)) value="{{ $provider->address }}" @endif>
                  </div>
                </div>
                <div class="col-md-6 text-center">
                  <button type="submit" class="btn btn-primary">
                    <i class="fa fa-envelope-o"></i>
                    @if(isset($provider))
                      Editar
                    @else
                      Guardar
                    @endif
                  </button>
                </div>
              </div>
              <!-- /.row-->
            </form>
          </div>
        </div>
        <!-- /.col-md-9-->
      </div>
    </div>
  </div>
@endsection