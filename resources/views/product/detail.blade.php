@extends('layout.app')
@section('content')
<div class="col-lg-9 order-1 order-lg-2 offset-2">
    <div id="productMain" class="row">
        <div class="col-md-6">
            <div data-slider-id="1" class="owl-carousel shop-detail-carousel">
                <div class="item"> <img src="../img/detailbig1.jpg" alt="" class="img-fluid"></div>
                <div class="item"> <img src="../img/detailbig2.jpg" alt="" class="img-fluid"></div>
                <div class="item"> <img src="../img/detailbig3.jpg" alt="" class="img-fluid"></div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="box">
                <h1 class="text-center">{{$product->name}}</h1>
                <p class="goToDescription"><a href="#details" class="scroll-to">Scroll to product details, material &amp; care and sizing</a></p>
                <p class="price">$ {{number_format($product->price,0)}}</p>
                <p class="text-center buttons"><a href="basket.html" class="btn btn-primary"><i class="fa fa-shopping-cart"></i> Agregar al Carrito</a></p>
            </div>
            <div data-slider-id="1" class="owl-thumbs">
                <button class="owl-thumb-item"><img src="../img/detailsquare.jpg" alt="" class="img-fluid"></button>
                <button class="owl-thumb-item"><img src="../img/detailsquare2.jpg" alt="" class="img-fluid"></button>
                <button class="owl-thumb-item"><img src="../img/detailsquare3.jpg" alt="" class="img-fluid"></button>
            </div>
        </div>
    </div>
    <div id="details" class="box">
        <p></p>
        <h4>Detalle:</h4>
        <p>{{$product->description}}</p>
        <h4>Proveedor:</h4>
        <p>{{$product->provider->name}}</p>
        <h4>Categoria:</h4>
        <p>{{$product->category->name}}</p>

    </div>
</div>
@endsection