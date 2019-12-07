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
            @if(isset($field_type))
              <h2>Editar Tipo de Campo</h2>
            @else
              <h2>Nuevo Tipo de Campo</h2>
            @endif
          <form method="POST" @if(isset($field_type)) action="{{ route('field_types.update', [ 'field_type' => $field_type->id ]) }}" @else action="{{ route('field_types.store') }}" @endif>
            @csrf
            @if(isset($field_type)) 
              @method('PUT')
            @endif
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="name">Nombre</label>
                    <input id="name" type="text" class="form-control" name="name" @if(isset($field_type)) value="{{ $field_type->name }}" @else value="{{ old('name') }}" @endif>
                  </div>
                </div>
                <div class="col-md-12 text-center">
                  <button type="submit" class="btn btn-primary">
                    <i class="fa fa-envelope-o"></i>
                    @if(isset($field_type))
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