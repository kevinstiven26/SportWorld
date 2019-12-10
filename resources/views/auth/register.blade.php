@extends('layout.app')
@section('content')
<div id="content">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- breadcrumb-->
                <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('inicio')}}">Inicio</a></li>
                    <li aria-current="page" class="breadcrumb-item active">Nueva Cuenta / Registro</li>
                </ol>
                </nav>
            </div>
            <div class="col-lg-12">
                <div class="box">
                <h1>Nueva cuenta</h1>
                <p class="lead">Aún no eres un cliente registrado?</p>
                <p>Regístrate ahora mismo! Todo el proceso de registro no toma mas de 10 minutos!</p>
                <hr>
               <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="form-group">
                        <label for="name">{{ __('Nombres') }}</label>
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">{{ __('Correo') }}</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password">{{ __('Contraseña') }}</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password">{{ __('Confirma Contraseña') }}</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    </div>
                    <div class="text-center">
                    <button type="submit" class="btn btn-primary">{{ __('Registrar') }}</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
