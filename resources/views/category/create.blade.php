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
            @if(isset($category))
              <h2>Editar Categoria</h2>
            @else
              <h2>Nueva Categoria</h2>
            @endif
          <form method="POST" @if(isset($category)) action="{{ route('categories.update', [ 'category' => $category->id ]) }}" @else action="{{ route('categories.store') }}" @endif>
            @csrf
            @if(isset($category)) 
              @method('PUT')
            @endif
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="name">Nombre</label>
                    <input id="name" type="text" class="form-control" name="name" @if(isset($category)) value="{{ $category->name }}" @else value="{{ old('name') }}" @endif>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="category">Categoria Padre</label>
                    <select id="category" name="category" class="form-control">
                        <option></option>
                        @foreach ($categories_select as  $category_select)
                          <option value="{{ $category_select->id}}"
                            @if (isset($category))
                              @if($category_select->id == $category->category)
                                selected='selected'
                              @endif  
                            @endif
                          >{{ $category_select->name }}</option>
                        @endforeach
                    </select> 
                  </div>
                </div>
                <div class="col-md-12 text-center">
                  <button type="submit" class="btn btn-primary">
                    <i class="fa fa-envelope-o"></i>
                    @if(isset($category))
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