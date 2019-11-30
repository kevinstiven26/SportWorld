@extends('layout.app');

@section('content')

<div id="content">
    <div id="customer-orders" class="col-lg-8 offset-2">
        <div class="box">
          <h3>Campos asociados a la categoria {{$category->name}}</h3>
          <hr>
          <a href="{{route('category.field_product.create',$category->id)}}" class="btn btn-primary navbar-btn"><i class="fa fa-plus"></i><span>Asociar Campo</span></a>
          <hr>
          <div class="table-responsive">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>Nombre</th>
                  <th>Opciones</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($field_products as $field_product )
                    <tr>
                        <td>{{$field_product->name}}</td>
                        <td>  
                            <form style="display: inline;" action="{{ route('category.field_product.destroy' , ['category' => $category->id , 'field_product' => $field_product->id]) }}" method="POST">
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