@extends('layout.app');

@section('content')

<div id="content">
    <div id="customer-orders" class="col-lg-12 ">
        <div class="box">
          <h1>Listado de Clientes</h1>
          <hr>
          <a href="{{route('customers.create')}}" class="btn btn-primary navbar-btn"><i class="fa fa-plus"></i><span>Agregar Cliente</span></a>
          <hr>
          <div class="table-responsive">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>Identificación</th>
                  <th>Nombre</th>
                  <th>Teléfono</th>
                  <th>Dirección</th>
                  <th>Email</th>
                  <th>Usuario</th>
                  <th>Opciones</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($customers as $customer )
                    <tr>
                        <td>{{$customer->identification}}</td>
                        <td>{{$customer->name}}</td>
                        <td>{{$customer->phone_number}}</td>
                        <td>{{$customer->address}}</td>
                        <td>{{$customer->email}}</td>
                        <td>{{$customer->user->name}}</td>
                        <td>  
                          <a href="{{ route('customers.edit', [ 'customer' => $customer->id ] )}}" class="btn btn-default btn-sm btn-primary"><i class="fa fa-pencil"></i></a>
                        <form style="display: inline;" action="{{ route('customers.destroy' , [ 'customer' => $customer->id ]) }}" method="POST">
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