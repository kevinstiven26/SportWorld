@extends('layout.app');

@section('content')

<div id="content">
    <div id="customer-orders" class="col-lg-8 offset-2">
        <div class="box">
          <h1>Categorias</h1>
          <hr>
          <div class="table-responsive">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>Nombre</th>
                  <th>Categoria Padre</th>
                  <th>Opciones</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($categories as $category )
                    <tr>
                        <td>{{$category->name}}</td>
                        <td>{{$category->category}}</td>
                        <td>  
                          <a href="{{ route('categories.edit', [ 'category' => $category->id ] )}}" class="btn btn-default btn-sm btn-primary"><i class="fa fa-pencil"></i></a>
                        <form style="display: inline;" action="{{ route('categories.destroy' , [ 'category' => $category->id ]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-default btn-sm btn-danger">
                                <i class="fa fa-trash"></i>
                            </button>
                          </form>  
                        </td>
                    </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection