<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="{{ asset('css/bootstrap/bootstrap.min.css') }}">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="{{ asset('css/font-awesome/font-awesome.min.css') }}">
    <!-- Google fonts - Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700">
    <!-- owl carousel-->
    <link rel="stylesheet" href="{{ asset('css/owl.carousel/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel/owl.theme.default.css') }}">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="{{ asset('css/style.default.css') }}" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    @yield('styles')
    <title>Sport World @yield('title')</title>
</head>
<body>
    <!-- navbar-->
    {{-- {{ $categories }} --}}
    <header class="header mb-5">
        <!-- *** TOPBAR *** -->
        <div id="top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 offer mb-3 mb-lg-0"></div>
                    <div class="col-lg-6 text-center text-lg-right">
                        <ul class="menu list-inline mb-0">
                            @guest
                                <li class="list-inline-item"><a href="#" data-toggle="modal" data-target="#login-modal">Iniciar sesión</a></li>
                                <li class="list-inline-item"><a href="{{ route('register') }}">Registrarse</a></li>
                            @else
                                <li class="list-inline-item">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item nav-link" href=" {{  route('customers.show', App\Customer::where('user_id', '=', Auth::user()->id)->first()->id) }}">
                                            <i class="fa fa-user"></i> Mi Cuenta
                                        </a>
                                        <a class="dropdown-item nav-link" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();">
                                            <i class="fa fa-sign-out"></i> {{ __('Cerrar Sesión') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                                {{-- <li class="list-inline-item"><a href="">Contact</a></li> --}}
                                {{-- <li class="list-inline-item"><a href="#">Recently viewed</a></li> --}}
                        </ul>
                    </div>
                </div>
            </div>
            <div id="login-modal" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true" class="modal fade">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Inicio de Sesión</h5>
                            <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group">
                                    <input id="email" type="email" placeholder="correo" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input id="password" type="password" placeholder="contraseña" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                </div>
                                <p class="text-center">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-sign-in"></i>{{ __('Login') }}</button>
                                </p>
                            </form>
                            <p class="text-center text-muted">No estas registrado Todavía?</p>
                            <p class="text-center text-muted"><a href="{{ route('register') }}"><strong>Regístrese ahora</strong></a>! Es fácil y se realiza en 1 minuto y le da acceso a descuentos especiales y mucho más.!</p>
                        </div>
                    </div>
                </div>
            </div>
              <!-- *** TOP BAR END ***-->
        </div>
        <nav class="navbar navbar-expand-lg">
            <div class="container"><a href="index.html" class="navbar-brand home"><img src="img/logosport.jpg" height="50px" width="90px" class="d-none d-md-inline-block"><img src="img/logo-small.png" alt="Obaju logo" class="d-inline-block d-md-none"><span class="sr-only">Obaju - go to homepage</span></a>
            <div class="navbar-buttons">
                <button type="button" data-toggle="collapse" data-target="#navigation" class="btn btn-outline-secondary navbar-toggler"><span class="sr-only">Toggle navigation</span><i class="fa fa-align-justify"></i></button>
                <button type="button" data-toggle="collapse" data-target="#search" class="btn btn-outline-secondary navbar-toggler"><span class="sr-only">Toggle search</span><i class="fa fa-search"></i></button><a href="basket.html" class="btn btn-outline-secondary navbar-toggler"><i class="fa fa-shopping-cart"></i></a>
            </div>
            <div id="navigation" class="collapse navbar-collapse">
                <ul class="navbar-nav mr-auto">
                <li class="nav-item"><a href="{{ route('product_list.index')}}" class="nav-link active">Inicio</a></li>
                @foreach (session()->get('menu.padres') as $padre )
                <li class="nav-item dropdown menu-large"><a href="#" data-toggle="dropdown" data-hover="dropdown" data-delay="200" class="dropdown-toggle nav-link">{{ $padre->name }}<b class="caret"></b></a>
                    <ul class="dropdown-menu megamenu">
                        <li>
                            <div class="row">
                                <div class="col-md-6 col-lg-3">
                                    <h5>{{ $padre->name }}</h5>
                                    <ul class="list-unstyled mb-3">
                                        @foreach (session()->get('menu2.hijos') as $hijo )
                                            @if($hijo->category == $padre->id)
                                                <li class="nav-item"><a href="{{ route('product_list.index', ['category' => $hijo->id])}}" class="nav-link">{{$hijo->name}}</a></li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
                @endforeach
                @if(Auth::check() && Auth::user()->email ==  'administrador@gmail.com')
                    <li class="nav-item dropdown menu-large">
                        <a href="#" data-toggle="dropdown" data-hover="dropdown" data-delay="200" class="dropdown-toggle nav-link">Administración<b class="caret"></b></a>
                        <ul class="dropdown-menu megamenu">
                            <li>
                                <div class="row">
                                    <div class="col-md-6 col-lg-3">
                                        <h5>Metadatos</h5>
                                        <ul class="list-unstyled mb-3">
                                        <li class="nav-item"><a href="{{ route('customers.index')}}" class="nav-link">Clientes</a></li>
                                        <li class="nav-item"><a href="{{ route('providers.index')}}" class="nav-link">Proveedores</a></li>
                                        <li class="nav-item"><a href="{{ route('categories.index')}}" class="nav-link">Categorias</a></li>
                                        <li class="nav-item"><a href="{{ route('products.index')}}" class="nav-link">Productos</a></li>
                                        <li class="nav-item"><a href="{{ route('field_types.index')}}" class="nav-link">Tipo de Campos</a></li>
                                        <li class="nav-item"><a href="{{ route('field_products.index')}}" class="nav-link">Campos Productos</a></li>
                                        <li class="nav-item"><a href="{{ route('orders2.index') }}" class="nav-link">Ordenes de Compra</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </li>
                @endif
                </ul>
                <div class="navbar-buttons d-flex justify-content-end">
                <!-- /.nav-collapse-->
                <div id="search-not-mobile" class="navbar-collapse collapse"></div><a data-toggle="collapse" href="#search" class="btn navbar-btn btn-primary d-none d-lg-inline-block"><span class="sr-only">Toggle search</span><i class="fa fa-search"></i></a>
                <div id="basket-overview" class="navbar-collapse collapse d-none d-lg-block"><a href="{{ route('shoppingcarts.index') }}" class="btn btn-primary navbar-btn"><i class="fa fa-shopping-cart"></i><span>@if(session()->has('shopping_cart.products')){{ count(session()->get('shopping_cart.products'))}}@else{{ 0 }}@endif items in cart</span></a></div>
                </div>
            </div>
            </div>
        </nav>
        <div id="search" class="collapse" method="POST" action="{{ route('product_list.index')}}">
            <div class="container">
            <form role="search" class="ml-auto">
                <div class="input-group">
                <input type="text" placeholder="Buscar" name="palabra" id="palabra" class="form-control">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                </div>
                </div>
            </form>
            </div>
        </div>
    </header>
    <div id="all">
        @yield('content')
    </div>

    <!--
    *** FOOTER ***
    _________________________________________________________
    -->
    <div id="footer">
        <div class="container">
            <div class="row">
            <div class="col-lg-4 col-md-6">
                <h4 class="mb-3">Usuario</h4>
                <ul class="list-unstyled">
                @if(Auth::check())
                <li>{{Auth::user()->email}}</li>
                @else
                    <li><a href="#" data-toggle="modal" data-target="#login-modal">Iniciar sesión</a></li>
                    <li><a href="{{ route('register') }}">Registrarse</a></li>
                @endif
                </ul>
            </div>
            <!-- /.col-lg-3-->
            <div class="col-lg-4 col-md-6">
                <h4 class="mb-3">Categorías</h4>
                @if(session()->has('menu.padres'))
                @foreach (session()->get('menu.padres') as $padre )
                <h5>{{ $padre->name }}</h5>
                    <ul class="list-unstyled">
                        @foreach (session()->get('menu2.hijos') as $hijo )
                            @if($hijo->category == $padre->id)
                                <li><a href="{{ route('product_list.index', ['category' => $hijo->id])}}">{{$hijo->name}}</a></li>
                            @endif
                        @endforeach
                    </ul>
                </li>
                @endforeach
                @endif
            </div>
            <!-- /.col-lg-3-->
            <div class="col-lg-4 col-md-6">
                <h4 class="mb-3">Donde encontrarnos</h4>
                <p><strong>Sports World.</strong><br>Cra 63b #34-25<br>Medellín - Antioquia<br><strong>Colombia</strong></p>
                <hr class="d-block d-md-none">
            </div>
            </div>
            <!-- /.row-->
        </div>
        <!-- /.container-->
        </div>
        <!-- /#footer-->
        <!-- *** FOOTER END ***-->


    <!-- *** COPYRIGHT *** -->
    <div id="copyright">
        <div class="container">
            <div class="row">
            <div class="col-lg-6 mb-2 mb-lg-0">
                <p class="text-center text-lg-left">©2019 Your name goes here.</p>
            </div>
            <div class="col-lg-6">
                <p class="text-center text-lg-right">Template design by <a href="https://bootstrapious.com/p/big-bootstrap-tutorial">Bootstrapious</a>
                <!-- If you want to remove this backlink, pls purchase an Attribution-free License @ https://bootstrapious.com/p/obaju-e-commerce-template. Big thanks!-->
                </p>
            </div>
            </div>
        </div>
    </div>
    <!-- *** COPYRIGHT END ***-->

<!-- JavaScript files-->
<script src="{{ asset('js/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('js/bootstrap/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('js/jquery.cookie/jquery.cookie.js') }}"> </script>
<script src="{{ asset('js/owl.carousel/owl.carousel.min.js') }}"></script>
<script src="{{ asset('js/owl.carousel2.thumbs/owl.carousel2.thumbs.js') }}"></script>
<script src="{{ asset('js/front.js') }}"></script>
@yield('scripts')
</body>
</html>
