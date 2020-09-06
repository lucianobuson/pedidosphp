@extends('layout')

@section('conteudo')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="container">
        <form method="post">
            @csrf
            <div class="row">
                <div style="width: 90px;">
{{--                <div class="col col-1">--}}
                    <label for="idPedido">Pedido</label>
                    <input type="text" class="form-control" name="idPedido" id="idPedido" readonly disabled value="{{ $pedido->id_pedido }}">
                </div>
                <div style="width: 90px;">
{{--                <div style="width: 90px;">--}}
{{--                <div class="col col-1">--}}
                    <label for="idCliente">Cliente</label>
                    <input type="text" class="form-control" name="idCliente" id="idCliente" value="{{ $pedido->id_cliente }}">
                </div>
                <div class="col col-4">
                    <label for="nomeCliente">Nome</label>
                    <input type="text" class="form-control" name="nomeCliente" id="nomeCliente" readonly disabled value="{{ $pedido->nome_cliente }}">
                </div>
                <div class="col col-2">
                    <label for="dataPedido">Data</label>
                    <input type="date" min="2020-01-01" max="2030-12-31" class="form-control" name="dataPedido" id="dataPedido" value="{{ $pedido->data_pedido }}">
                </div>
                <div class="col col-2">
                    <label for="totalPedido">Total</label>
                    <input type="number" min="0.01" max="1000.00" step="0.01" class="form-control" name="totalPedido" id="totalPedido" readonly disabled value="{{ number_format($pedido->total_pedido, 2, ',', '.') }}">
                </div>
            </div>
            <button class="btn btn-primary mt-2">Gravar</button>
            <a href="{{ route('listar_pedidos') }}" class="btn btn-warning mt-2">Voltar</a>
            <a href="{{ route('listar_itens') }}" class="btn btn-primary mt-2">Itens</a>
        </form>
    </div>
@endsection
