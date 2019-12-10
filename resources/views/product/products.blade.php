@extends('layout.app')
@section('content')
<div id="all">
    <div id="content">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <!-- breadcrumb-->
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('product_list.index')}}">Inicio</a></li>
                <li aria-current="page" class="breadcrumb-item active">@if(request()->has('category')) {{ App\Category::where('id','=',request()->query()['category'])->first()->name }} @else  @endif</li>
              </ol>
            </nav>
          </div>
          <div class="col-lg-3">
            <!--
            *** MENUS AND FILTERS ***
            _________________________________________________________
            -->
            <div class="card sidebar-menu mb-4">
              <div class="card-header">
                <h3 class="h4 card-title">Categorias</h3>
              </div>
              <div class="card-body">
                <ul class="nav nav-pills flex-column category-menu">
                  @foreach ($categories as $category)
                    <li><a href="{{ route('product_list.index', ['category' => $category->id])}}" class="nav-link">{{$category->name}} </a>
                        <ul class="list-unstyled">
                            @foreach ($categories_son as $category_son)
                                @if($category_son->category == $category->id)
                                  <li><a href="{{ route('product_list.index', ['category' => $category_son->id])}}" class="nav-link">{{$category_son->name}}</a></li>
                                @endif
                            @endforeach
                        </ul>
                    </li>
                  @endforeach
                </ul>
              </div>
            </div>
            <div class="card sidebar-menu mb-4">
              <div class="card-header">
                <h3 class="h4 card-title">Marcas </h3>
              </div>
              <div class="card-body">
                <ul class="nav nav-pills flex-column category-menu">
                    <ul class="list-unstyled">
                        @foreach ($providers as $provider)
                          <li><a href="{{ route('product_list.index', ['provider' => $provider->id])}}" class="nav-link">{{$provider->name}}</a></li>
                        @endforeach
                    </ul>
                </ul>
              </div>
            </div>
            <!-- *** MENUS AND FILTERS END ***-->
          </div>
          <div class="col-lg-9">
            <div class="box info-bar">
              <div class="row">
                <div class="col-md-12 col-lg-4 products-showing">Mostrando <strong>{{$products->count()}}</strong> de <strong>{{$products->total()}}</strong> productos</div>
                <div class="col-md-12 col-lg-7 products-number-sort">
                  <form class="form-inline d-block d-lg-flex justify-content-between flex-column flex-md-row">
                    <div class="products-number"><strong>Mostrar</strong><a href="{{ route('product_list.index', ['perpage' => 12])}}" class="btn btn-sm @if($products->perPage()==12){{ 'btn-primary'}}@else {{ 'btn-outline-secondary'}} @endif">12</a><a href="{{ route('product_list.index', ['perpage' => 24])}}" class="btn btn-sm @if($products->perPage()==24){{ 'btn-primary'}}@else {{ 'btn-outline-secondary'}} @endif">24</a><a href="{{ route('product_list.index', ['perpage' => $products->total()])}}" class="btn btn-sm @if($products->perPage()==$products->total()){{ 'btn-primary'}}@else {{ 'btn-outline-secondary'}} @endif">Todos</a></div>
                    {{-- <div class="products-sort-by mt-2 mt-lg-0"><strong>Ordenar por</strong>
                      <select name="sort-by" class="form-control">
                        <option>Nombre</option>
                        <option>Precio</option>
                      </select>
                    </div> --}}
                  </form>
                </div>
              </div>
            </div>
            <div class="row products">
                @foreach ($products as $product )
                    <div class="col-lg-4 col-md-6">
                        <div class="product">
                        <div class="flip-container">
                            <div class="flipper">
                            <div class="front"><a href="{{ route('product_list.show', $product->id)}}"><img @if($product->image != '') src="{{$product->image}}" @else src="img/product1.jpg" @endif alt="" class="img-fluid"></a></div>
                            <div class="back"><a href="{{ route('product_list.show', $product->id)}}"><img @if($product->image != '') src="{{$product->image}}" @else src="img/product1.jpg" @endif alt="" class="img-fluid"></a></div>
                            </div>
                        </div><a href="detail.html" class="invisible"><img src="img/product1.jpg" alt="" class="img-fluid"></a>
                        <div class="text">
                            <h3><a href="detail.html">{{$product->name}} </a></h3>
                            <p class="price">
                            <del></del>$ {{number_format($product->price, 0)}}
                            </p>
                            <p class="buttons"><a href="{{ route('product_list.show', $product->id)}}" class="btn btn-outline-secondary">Ver Detalle</a><a href="{{ route('shoppingcarts.create', [ 'product' => $product->id]) }}" class="btn btn-primary"><i class="fa fa-shopping-cart"></i>Añadir al Carrito</a></p>
                        </div>
                        <!-- /.text-->
                        </div>
                        <!-- /.product            -->
                    </div>
              @endforeach
            {{--   {{ $products->links() }} --}}
              {{ $products->appends(['perpage'=>request()->perpage])->links()}}
            </div>
          </div>
          <!-- /.col-lg-9-->
        </div>
      </div>
    </div>
  </div>
@endsection
