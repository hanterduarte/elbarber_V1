@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>PONTO DE VENDAS (PDV)</h1>
@stop
@section('content')
    <p>Nova Venda</p>
    <div>
    
        <div class="text-center">
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
        </div>
        
        <div class="container">
            <h1>Vendas</h1>
    
            <a href="{{ route('orders.create') }}" class="btn btn-primary mb-3">Criar nova venda</a>
    
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Cliente</th>
                        <th>Valor total</th>
                        <th>Produtos vendidos</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->customer_name }}</td>
                            <td>{{ $order->total_amount }}</td>
                            <td>
                                <ul>
                                    @foreach($order->products as $product)
                                        <li>{{ $product->name }}</li>
                                    @endforeach
                                </ul>
                            </td>
                            <td>
                                <a href="{{ route('orders.show', $order->id) }}" class="btn btn-info btn-sm">Detalhes</a>
                                <a href="{{ route('orders.edit', $order->id) }}" class="btn btn-warning btn-sm">Editar</a>
                                <form action="{{ route('orders.destroy', $order->id) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir essa venda?')">Excluir</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop