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
            <h2>Agregar Valor al  Campo {{$field_product->name}}</h2>
          <form method="POST" action="{{ route('field_product.field_value.store', [ 'field_product' => $field_product->id ]) }}">
            @csrf
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="name">Valor: </label>
                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name')}}" >
                  </div>
                </div>
                <div class="col-md-12 text-center">
                  <button type="submit" class="btn btn-primary">
                    <i class="fa fa-plus-square-o"></i> Agregar
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