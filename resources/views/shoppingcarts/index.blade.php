@extends('layout.app')

@section('title')
- Carrito de Compras
@endsection

@section('content')
<div id="content">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <!-- breadcrumb-->
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{ route('inicio') }}">Inicio</a></li>
                  <li aria-current="page" class="breadcrumb-item active">Carrito de compras</li>
                </ol>
              </nav>
            </div>
            @isset($shoppingCart)
            <div id="basket" class="col-lg-9">
              <div class="box">
                <form method="POST" action="{{ route('quantity') }}">
                @csrf
                  <h1>Carrito de Compras</h1>
                  <p class="text-muted">Actualmente tienes {{ count($shoppingCart) }} producto(s) en tu carrito.</p>
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th colspan="2">Producto</th>
                          <th></th>
                          <th>Cantidad</th>
                          <th>Precio unidad</th>
                          <th colspan="2">Total</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach( $shoppingCart as $p)
                        <tr>
                          <td><a href="#"><img src="https://via.placeholder.com/50x50" alt="Black Blouse Armani"></a></td>
                          <td><a href="#">{{ $p->name }}</a></td>
                          <td>
                            @if($field_products->where('category_id', $p->category_id)->count() > 0)
                                <b>{{ $field_products[0]['field_products_name']}}</b>
                                <input name="field_products_name_{{ $p->id }}" type="hidden" value="{{ $field_products[0]['field_products_name'] }}"/>
                                <select name="field_value_{{ $p->id }}">
                                    @foreach($field_products as $fp)
                                        @if($fp->category_id == $p->category_id)
                                            <option value="{{ $fp->name }}" @if(isset($quantity["field_value_".$p->id]) && $quantity["field_value_".$p->id] == $fp->name){{ 'selected' }}@endif>{{ $fp->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            @endif
                          </td>
                          <td>
                            <input type="number" name="quantity_{{ $p->id }}" value="@if(isset($quantity) && isset($quantity['quantity_'.$p->id])){{ $quantity['quantity_'.$p->id] }}@else{{ 1 }}@endif" class="form-control" min="1">
                          </td>
                          <td>$ {{ number_format($p->price, 0, ',', '.') }}</td>
                          <td>$ @if(isset($quantity) && isset($quantity['quantity_'.$p->id])){{ number_format($p->price * $quantity['quantity_'.$p->id], 0, ',', '.') }}@else{{ number_format($p->price, 0, ',', '.') }}@endif</td>
                          <td><a href="{{ route('shoppingcarts.create', [ 'index' => $loop->index]) }}"><i class="fa fa-trash-o"></i></a></td>
                        </tr>
                        @endforeach
                      </tbody>
                      <tfoot>
                        <tr>
                          <th colspan="5">Total</th>
                          <th colspan="2">${{ number_format($total, 0, ',', '.') }}</th>
                        </tr>
                      </tfoot>
                    </table>
                  </div>
                  <!-- /.table-responsive-->
                  <div class="box-footer d-flex justify-content-between flex-column flex-lg-row">
                    <div class="left"><a href="{{ route('product_list.index') }}" class="btn btn-outline-secondary"><i class="fa fa-chevron-left"></i> Continuar comprando</a></div>
                    <div class="right">
                    @if(isset($shoppingCart) && count($shoppingCart) > 0)
                        <button type="submit" class="btn btn-outline-secondary"><i class="fa fa-refresh"></i> Actualizar carrito</button>
                        <a href="{{ route('orders.index') }} " class="btn btn-primary"> Proceder al pago <i class="fa fa-chevron-right"></i></a>
                      @endif
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.box-->
              <div class="row same-height-row">
                <div class="col-lg-3 col-md-6">
                  <div class="box same-height">
                    <h3>Te podrían interesar estos productos</h3>
                  </div>
                </div>
                <div class="col-md-3 col-sm-6">
                  <div class="product same-height">
                    <div class="flip-container">
                      <div class="flipper">
                        <div class="front"><a href="detail.html"><img src="img/product2.jpg" alt="" class="img-fluid"></a></div>
                        <div class="back"><a href="detail.html"><img src="img/product2_2.jpg" alt="" class="img-fluid"></a></div>
                      </div>
                    </div><a href="detail.html" class="invisible"><img src="img/product2.jpg" alt="" class="img-fluid"></a>
                    <div class="text">
                      <h3>Fur coat</h3>
                      <p class="price">$143</p>
                    </div>
                  </div>
                  <!-- /.product-->
                </div>
                <div class="col-md-3 col-sm-6">
                  <div class="product same-height">
                    <div class="flip-container">
                      <div class="flipper">
                        <div class="front"><a href="detail.html"><img src="img/product1.jpg" alt="" class="img-fluid"></a></div>
                        <div class="back"><a href="detail.html"><img src="img/product1_2.jpg" alt="" class="img-fluid"></a></div>
                      </div>
                    </div><a href="detail.html" class="invisible"><img src="img/product1.jpg" alt="" class="img-fluid"></a>
                    <div class="text">
                      <h3>Fur coat</h3>
                      <p class="price">$143</p>
                    </div>
                  </div>
                  <!-- /.product-->
                </div>
                <div class="col-md-3 col-sm-6">
                  <div class="product same-height">
                    <div class="flip-container">
                      <div class="flipper">
                        <div class="front"><a href="detail.html"><img src="img/product3.jpg" alt="" class="img-fluid"></a></div>
                        <div class="back"><a href="detail.html"><img src="img/product3_2.jpg" alt="" class="img-fluid"></a></div>
                      </div>
                    </div><a href="detail.html" class="invisible"><img src="img/product3.jpg" alt="" class="img-fluid"></a>
                    <div class="text">
                      <h3>Fur coat</h3>
                      <p class="price">$143</p>
                    </div>
                  </div>
                  <!-- /.product-->
                </div>
              </div>
            </div>
            <!-- /.col-lg-9-->
            <div class="col-lg-3">
              <div id="order-summary" class="box">
                <div class="box-header">
                  <h3 class="mb-0">Resumen Orden</h3>
                </div>
                <div class="table-responsive">
                  <table class="table">
                    <tbody>
                      <tr>
                        <td>Subtotal Orden</td>
                        <th>$ {{ number_format($total, 0, ',', '.') }}</th>
                      </tr>
                      <tr class="total">
                        <td>Total</td>
                        <th>${{ number_format($total, 0, ',', '.') }}</th>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
              <!--
              <div class="box">
                <div class="box-header">
                  <h4 class="mb-0">Coupon code</h4>
                </div>
                <p class="text-muted">If you have a coupon code, please enter it in the box below.</p>
                <form>
                  <div class="input-group">
                    <input type="text" class="form-control"><span class="input-group-append">
                      <button type="button" class="btn btn-primary"><i class="fa fa-gift"></i></button></span>
                  </div>
                </form>
              </div>
            </div>
            -->
            <!-- /.col-md-3-->
          </div>
          @endisset
        </div>
      </div>
@endsection
