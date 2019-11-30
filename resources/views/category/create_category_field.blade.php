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
            <h2>Asociar Campo</h2>
          <form method="POST" action="{{ route('category.field_product.store', [ 'category' => $category->id ]) }}">
            @csrf
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="category">Campo:</label>
                    <select id="field_product" name="field_product" class="form-control">
                        <option></option>
                        @foreach ($field_products as  $field_product)
                          <option value="{{ $field_product->id}}">{{ $field_product->name }}</option>
                        @endforeach
                    </select> 
                  </div>
                </div>
                <div class="col-md-12 text-center">
                  <button type="submit" class="btn btn-primary">
                    <i class="fa fa-plus-square-o"></i> Asociar
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