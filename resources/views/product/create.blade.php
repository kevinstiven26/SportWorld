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
            @if(isset($product))
              <h2>Editar Producto</h2>
            @else
              <h2>Nuevo Producto</h2>
            @endif
          <form method="POST" @if(isset($product)) action="{{ route('products.update', [ 'product' => $product->id ]) }}" @else action="{{ route('products.store') }}" @endif>
            @csrf
            @if(isset($product)) 
              @method('PUT')
            @endif
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="name">Nombre</label>
                    <input id="name" type="text" class="form-control" name="name" @if(isset($product)) value="{{ $product->name }}" @endif>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="description">Descripción</label>
                  <input id="description" type="text" class="form-control" name="description" @if(isset($product)) value="{{ $product->nit }}" @endif>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="price">Precio</label>
                    <input id="price" type="number" class="form-control" name="price" @if(isset($product)) value="{{ $product->price }}" @endif>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="image">Imagen</label>
                    <input id="image" type="text" class="form-control" name="image" @if(isset($product)) value="{{ $product->image }}" @endif>
                  </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                      <label for="provider_id">Proveedor</label>
                      <select id="provider_id" name="provider_id" class="form-control">
                          <option></option>
                          @foreach ($providers as  $provider)
                            <option value="{{ $provider->id}}">{{ $provider->name }}</option>
                          @endforeach
                      </select> 
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                      <label for="category_id">Categoria</label>
                      <select id="category_id" name="category_id" class="form-control">
                          <option></option>
                          @foreach  ($categories as  $category)
                            <option value="{{ $category->id}}">{{ $category->name }}</option>
                          @endforeach
                      </select> 
                    </div>
                </div>
                <div class="col-md-12 text-center">
                  <button type="submit" class="btn btn-primary">
                    <i class="fa fa-envelope-o"></i>
                    @if(isset($product))
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