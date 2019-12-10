@extends('layout.app');

@section('title') - Listado Ordenes @endsection
@section('content')
<div id="content">
    <div id="customer-orders" class="col-lg-12">
        <div class="box">
        <h1>Mis Ordenes</h1>
        <p class="lead">Todas tus ordenes en un solo lugar.</p>
        <hr>
        <div class="table-responsive">
            <table class="table table-hover">
            <thead>
                <tr>
                <th>Orden</th>
                <th>Cliente</th>
                <th>Fecha</th>
                <th>Total</th>
                <th>Estado</th>
                <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
            @foreach( $orders as $order )
                <tr>
                    <th># {{ $order->id }}</th>
                    <td>{{ $order->customer_name }}</td>
                    <td>{{ $order->date }}</td>
                    <td>$ {{ number_format($order->total, 0, ',', '.') }}</td>
                    <td><span class="badge badge-info">En Entrega</span></td>
                    <td><a href="{{ route('orders2.show', $order->id ) }}" class="btn btn-primary btn-sm">Ver Detalle</a></td>
                </tr>
            @endforeach
            </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
