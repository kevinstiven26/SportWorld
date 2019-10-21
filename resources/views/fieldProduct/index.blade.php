@extends('layout.app');

@section('content')

<div id="content">
    <div id="customer-orders" class="col-lg-8 offset-2">
        <div class="box">
          <h1>Campos Productos</h1>
          <hr>
          <div class="table-responsive">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>Nombre</th>
                  <th>Tipo de Campo</th>
                  <th>Opciones</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($field_products as $field_product )
                    <tr>
                        <td>{{$field_product->name}}</td>
                        <td>{{$field_product->field_product_id}}</td>
                        <td>  
                          <a href="{{ route('field_products.edit', [ 'field_product' => $field_product->id ] )}}" class="btn btn-default btn-sm btn-primary"><i class="fa fa-pencil"></i></a>
                        <form style="display: inline;" action="{{ route('field_products.destroy' , [ 'field_product' => $field_product->id ]) }}" method="POST">
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