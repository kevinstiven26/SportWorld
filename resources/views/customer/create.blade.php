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
            @if(isset($customer))
              <h2>Editar Cliente</h2>
            @else
              <h2>Nuevo Cliente</h2>
            @endif
          <form method="POST" @if(isset($customer)) action="{{ route('customers.update', [ 'customer' => $customer->id ]) }}" @else action="{{ route('customers.store') }}" @endif>
            @csrf
            @if(isset($customer)) 
              @method('PUT')
            @endif
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="identification">Identificación </label>
                  <input id="identification" type="text" class="form-control" name="identification" @if(isset($customer)) value="{{ $customer->identification }}" @endif>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="name">Nombre</label>
                    <input id="name" type="text" class="form-control" name="name" @if(isset($customer)) value="{{ $customer->name }}" @endif>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="phone_number">Teléfono</label>
                    <input id="phone_number" type="number" class="form-control" name="phone_number" @if(isset($customer)) value="{{ $customer->phone_number }}" @endif>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="address">Dirección</label>
                    <input id="address" class="form-control" name="address" @if(isset($customer)) value="{{ $customer->address }}" @endif>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" class="form-control" name="email" @if(isset($customer)) value="{{ $customer->email }}" @endif>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="user_id">Usuario</label>
                    <select id="user_id" name="user_id" class="form_control">
                        <option></option>
                        @foreach ($users as  $user)
                          <option value="{{ $user->id}}"
                            @if (isset($customer))
                              @if ($user->id == $customer->user_id)
                              selected='selected'
                              @endif
                            @endif
                          >{{ $user->name }}</option>
                        @endforeach
                    </select> 
                  </div>
                </div>
                <div class="col-md-12 text-center">
                  <button type="submit" class="btn btn-primary">
                    <i class="fa fa-envelope-o"></i>
                    @if(isset($customer))
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