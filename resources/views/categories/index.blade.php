@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Categorias</h1>
@stop

@section('content')
    <p>Está é a pagina de cadastro de categorias.</p>
    <div>
    
        <div class="text-center">
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
        </div>
        
        <div class="my-3 d-flex justify-content-between">

            <a class="btn btn-success" href="{{ route('categories.create') }}"> Criar nova categoria</a>  

        </div>
    
        <table class="table rounded-3 shadow-sm">
              <thead class="bg-secondary border border-bottom border-secondary text-white">
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">NOME</th>
                    <th scope="col"></th>
                  </tr>
              </thead>
              <tbody>
                
                @foreach ($categories as $category)
                  <tr>
    
                      <th scope="row">{{ $category->id }}</th>
    
                      <td> {{ $category->name }}</td>
    
                      <td class="w-25">
                        <form action="{{ route('categories.destroy', $category->id) }}" method="Post">
                            <a class="btn btn-primary" href="{{ route('categories.edit', $category->id) }}">Editar</a>
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
            {!! $categories->links() !!}
        </div>
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop