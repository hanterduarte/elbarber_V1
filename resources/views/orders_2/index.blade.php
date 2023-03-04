@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>PONTO DE VENDAS (PDV)</h1>
@stop
@section('content')
    <p>Nova Venda</p>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Pedidos</h1>
                <a href="{{ route('orders.create') }}" class="btn btn-primary mb-3">Novo Pedido</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome do Cliente</th>
                            <th>Total</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->customer_name }}</td>
                                <td>{{ $order->customer_email }}</td>
                                <td>{{ $order->customer_phone }}</td>
                                <td>{{ $order->total }}</td>
                                <td>
                                    <a href="{{ route('orders.show', $order) }}" class="btn btn-info btn-sm">Detalhes</a>
                                    <a href="{{ route('orders.edit', $order) }}" class="btn btn-primary btn-sm">Editar</a>
                                    <form action="{{ route('orders.destroy', $order) }}" method="POST" style="display: inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop