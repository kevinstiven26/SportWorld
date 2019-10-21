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
          <div id="contact" class="box">
            @if(isset($field_product))
              <h2>Editar Campo Producto</h2>
            @else
              <h2>Nuevo Campo Producto</h2>
            @endif
          <form method="POST" @if(isset($field_product)) action="{{ route('field_products.update', [ 'field_product' => $field_product->id ]) }}" @else action="{{ route('field_products.store') }}" @endif>
            @csrf
            @if(isset($field_product)) 
              @method('PUT')
            @endif
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="name">Nombre</label>
                    <input id="name" type="text" class="form-control" name="name" @if(isset($field_product)) value="{{ $field_product->name }}" @endif>
                  </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                      <label for="field_type">Tipo de Campo</label>
                      <select id="field_type" name="field_type_id" class="form-control">
                          <option></option>
                          @foreach ($field_types_select as  $field_type_select)
                            <option value="{{ $field_type_select->id}}">{{ $field_type_select->name }}</option>
                          @endforeach
                      </select> 
                    </div>
                  </div>
                <div class="col-md-12 text-center">
                  <button type="submit" class="btn btn-primary">
                    <i class="fa fa-envelope-o"></i>
                    @if(isset($field_product))
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