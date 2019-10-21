@extends('layout.app');

@section('content')

<div id="content">
    <div id="customer-orders" class="col-lg-8 offset-2">
        <div class="box">
          <h1>Listado de Proveedores</h1>
          <hr>
          <div class="table-responsive">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>Imagen</th>
                  <th>NIT</th>
                  <th>Nombre</th>
                  <th>Teléfono</th>
                  <th>Dirección</th>
                  <th>Opciones</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($providers as $provider )
                    <tr>
                        <th></th>
                        <td>{{$provider->nit}}</td>
                        <td>{{$provider->name}}</td>
                        <td>{{$provider->phone_number}}</td>
                        <td>{{$provider->address}}</td>
                        <td>  
                          <a href="{{ route('providers.edit', [ 'provider' => $provider->id ] )}}" class="btn btn-default btn-sm btn-primary"><i class="fa fa-pencil"></i></a>
                        <form style="display: inline;" action="{{ route('providers.destroy' , [ 'provider' => $provider->id ]) }}" method="POST">
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