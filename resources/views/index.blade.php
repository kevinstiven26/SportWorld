@extends('layout.app')

@section('content')
 
<div id="content">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div id="main-slider" class="owl-carousel owl-theme">
                <div class="item"><img src="img/main-slider1.jpg" alt="" class="img-fluid"></div>
                <div class="item"><img src="img/main-slider2.jpg" alt="" class="img-fluid"></div>
                <div class="item"><img src="img/main-slider3.jpg" alt="" class="img-fluid"></div>
                <div class="item"><img src="img/main-slider4.jpg" alt="" class="img-fluid"></div>
              </div>
              <!-- /#main-slider-->
            </div>
          </div>
        </div>
        <!--
        *** ADVANTAGES HOMEPAGE ***
        _________________________________________________________
        -->
        <div id="advantages">
          <div class="container">
            <div class="row mb-4">
              <div class="col-md-4">
                <div class="box clickable d-flex flex-column justify-content-center mb-0 h-100">
                  <div class="icon"><i class="fa fa-heart"></i></div>
                  <h3><a href="#">La prioridad son nuestros clientes</a></h3>
                  <p class="mb-0">Nos identifica brindar el mejor servicio posible.</p>
                </div>
              </div>
              <div class="col-md-4">
                <div class="box clickable d-flex flex-column justify-content-center mb-0 h-100">
                  <div class="icon"><i class="fa fa-tags"></i></div>
                  <h3><a href="#">Mejores Precios</a></h3>
                  <p class="mb-0">En nuestra tienda encontraras gran variedad de ofertas en diferentes productos.</p>
                </div>
              </div>
              <div class="col-md-4">
                <div class="box clickable d-flex flex-column justify-content-center mb-0 h-100">
                  <div class="icon"><i class="fa fa-thumbs-up"></i></div>
                  <h3><a href="#">100% de garantía</a></h3>
                  <p class="mb-0">Productos de alta calidad.</p>
                </div>
              </div>
            </div>
            <!-- /.row-->
          </div>
          <!-- /.container-->
        </div>
        <!-- /#advantages-->
        <!-- *** ADVANTAGES END ***-->
        <!--
        *** HOT PRODUCT SLIDESHOW ***
        _________________________________________________________
        -->
        <div id="hot">
          <div class="box py-4">
            <div class="container">
              <div class="row">
                <div class="col-md-12">
                  <h2 class="mb-0">Productos Nuevos</h2>
                </div>
              </div>
            </div>
          </div>
          <div class="container">
            <div class="product-slider owl-carousel owl-theme">
              @foreach ($products as $product)
                <div class="item">
                    <div class="product">
                      <div class="flip-container">
                        <div class="flipper">
                          <div class="front"><a href="{{ route('product_list.show', $product->id)}}"><img @if($product->image != '') src="{{$product->image}}" @else src="img/product1.jpg" @endif alt="" class="img-fluid"></a></div>
                          <div class="back"><a href="{{ route('product_list.show', $product->id)}}"><img @if($product->image != '') src="{{$product->image}}" @else src="img/product1.jpg" @endif alt="" class="img-fluid"></a></div>
                        </div>
                      </div><a href="detail.html" class="invisible"><img src="img/product1.jpg" alt="" class="img-fluid"></a>
                      <div class="text">
                        <h3><a href="detail.html">{{$product->name}}</a></h3>
                        <p class="price"> 
                          <del></del>$ {{ number_format($product->price, 0)}}
                        </p>
                      </div>
                      <div class="ribbon new">
                        <div class="theribbon">Nuevo</div>
                        <div class="ribbon-background"></div>
                      </div>
                    </div>
                    <!-- /.product-->
                </div>    
              @endforeach 
              <!-- /.product-slider-->
            </div>
            <!-- /.container-->
          </div>
          <!-- /#hot-->
          <!-- *** HOT END ***-->
        </div>
        <!--
        *** GET INSPIRED ***
        _________________________________________________________
        -->
        <div class="container">
          <div class="col-md-12">
            <div class="box slideshow">
              <h3>INSPÍRATE</h3>
              <p class="lead">Obtenga la inspiración de nuestros productos en diferentes estilos disponibles para ti.</p>
              <div id="get-inspired" class="owl-carousel owl-theme">
                <div class="item"><a href="#"><img src="img/getinspired1.jpg" alt="Get inspired" class="img-fluid"></a></div>
                <div class="item"><a href="#"><img src="img/getinspired2.jpg" alt="Get inspired" class="img-fluid"></a></div>
                <div class="item"><a href="#"><img src="img/getinspired3.jpg" alt="Get inspired" class="img-fluid"></a></div>
              </div>
            </div>
          </div>
        </div>
        <!-- *** GET INSPIRED END ***-->
        <!--
        *** BLOG HOMEPAGE ***
        _________________________________________________________
        -->
        <div class="box text-center">
          <div class="container">
            <div class="col-md-12">
              <h3 class="text-uppercase"></h3>
              <p class="lead mb-0"></p>
            </div>
          </div>
        </div>
       
        <!-- /.container-->
      </div>
@endsection