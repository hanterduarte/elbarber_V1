@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Categorias</h1>
@stop

@section('content')
    <p>Está é a pagina de categorias.</p>
    <div>
    
        <div class="text-center">
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
        </div>
    
        <div class="my-3 text-center">
            <h4>Tabela de produtos</h4>
        </div>
    
        <div class="my-3 d-flex justify-content-between">
            <a class="btn btn-success" href="{{ route('products.create') }}"> Criar novo Produto</a>
        </div>
    
        <table class="table rounded-3 shadow-sm">
              <thead class="bg-secondary border border-bottom border-secondary text-white">
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">NOME</th>
                    <th scope="col">PREÇO</th>
                    <th scope="col">CATEGORIA</th>
                    <th scope="col"></th>
                  </tr>
              </thead>
              <tbody>
                
                @foreach ($products as $product)
                  <tr>
    
                      <th scope="row">{{ $product->id }}</th>
    
                      <td> {{ $product->name }}</td>
                      <td> {{ $product->price }}</td>
                      <td> {{ $product->category->name }}</td>
    
                      <td class="w-25">
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                            <a class="btn btn-primary" href="{{ route('products.edit', $product->id) }}">Editar</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Excluir</button>
                        </form>
                      </td>
    
                  </tr>
                @endforeach
    
              </tbody>
        </table>
        <div class="my-3 text-end">
            {!! $products->links() !!}
        </div>
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop