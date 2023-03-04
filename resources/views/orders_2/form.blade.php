@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>FORM BLADE</h1>
@stop

@section('content')
<div class="container">
    <h1>{{ isset($order) ? 'Editar Venda' : 'Nova Venda' }}</h1>

    <form action="{{ isset($order) ? route('orders.update', $order->id) : route('orders.store') }}" method="POST">
        @csrf
        @if(isset($order))
            @method('PUT')
        @endif

        
        <div class="form-group">
            <label for="produtos">Produtos</label>
            <select name="produtos[]" id="produtos" class="form-control" multiple>
                @foreach($products as $product)
                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="preco">Preço</label>
            <input type="number" name="preco" id="preco" class="form-control" value="{{ isset($order) ? $order->price : old('preco') }}" readonly>
        </div>

        <button type="submit" class="btn btn-primary">{{ isset($order) ? 'Salvar' : 'Criar' }}</button>
    </form>
    <form method="POST" action="{{ route('orders.store') }}">
</div>
@section('scripts')
    <script>
        $(function () {
            $('#produtos').select2({
                theme: 'bootstrap4',
                placeholder: 'Selecione os produtos',
                ajax: {
                    url: '{{ route('products.search') }}',                    
                    dataType: 'json',
                    data: function (params) {
                        return {
                            term: params.term
                        };
                    },
                    processResults: function (data) {
                        return {
                            results: data
                        };
                    }
                }
            });

            $('#produtos').on('change', function () {
                var total = 0;

                $(this).find('option:selected').each(function () {
                    total += parseFloat($(this).data('price'));
                });

                $('#preco').val(total);
            });
        });
    </script>
@endsection
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
