@extends('layout.app');

@section('content')

<div id="content">
    <div id="customer-orders" class="col-lg-8 offset-2">
        <div class="box">
          <h1>Listado de Productos</h1>
          <hr>
          <div class="table-responsive">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>Imagen</th>
                  <th>Nombre</th>
                  <th>Descripción</th>
                  <th>Precio</th>
                  <th>Proveedor</th>
                  <th>Categoria</th>
                  <th>Opciones</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($products as $product )
                    <tr>
                        <th></th>
                        <td>{{$product->name}}</td>
                        <td>{{$product->description}}</td>
                        <td>{{$product->price}}</td>
                        <td>{{$product->provider_id}}</td>
                        <td>{{$product->category_id}}</td>
                        <td>  
                          <a href="{{ route('products.edit', [ 'product' => $product->id ] )}}" class="btn btn-default btn-sm btn-primary"><i class="fa fa-pencil"></i></a>
                        <form style="display: inline;" action="{{ route('products.destroy' , [ 'product' => $product->id ]) }}" method="POST">
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