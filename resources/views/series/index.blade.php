@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Categorias</h1>
@stop

@section('content')
    <p>Está é a pagina de categorias.</p>
    

    <a href="{{ route('series.create') }}" class="btn btn-dark mb-2">Adicionar</a>

    <ul class="list-group">
        @foreach ($series as $serie)
        <li class="list-group-item">{{ $serie->nome }}</li>
        @endforeach
    </ul>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop