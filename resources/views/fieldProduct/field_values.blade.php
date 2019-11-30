@extends('layout.app');

@section('content')

<div id="content">
    <div id="customer-orders" class="col-lg-8 offset-2">
        <div class="box">
          <h3>Valores del Campo {{$field_product->name}}</h3>
          <hr>
          <a href="{{route('field_product.field_value.create',$field_product->id)}}" class="btn btn-primary navbar-btn"><i class="fa fa-plus"></i><span>Agregar Valor</span></a>
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
                @foreach ($field_values as $field_value )
                    <tr>
                        <td>{{$field_value->name}}</td>
                        <td>  
                            <form style="display: inline;" action="{{ route('field_product.field_value.destroy' , ['field_product' => $field_product->id,'field_value' => $field_value->id]) }}" method="POST">
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