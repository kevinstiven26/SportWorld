@extends('layout.app');

@section('content')

<div id="content">
    <div id="customer-orders" class="col-lg-8 offset-2">
        <div class="box">
          <h1>Tipo de Campos</h1>
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
                @foreach ($field_types as $field_type )
                    <tr>
                        <td>{{$field_type->name}}</td>
                        <td>  
                          <a href="{{ route('field_types.edit', [ 'field_type' => $field_type->id ] )}}" class="btn btn-default btn-sm btn-primary"><i class="fa fa-pencil"></i></a>
                        <form style="display: inline;" action="{{ route('field_types.destroy' , [ 'field_type' => $field_type->id ]) }}" method="POST">
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