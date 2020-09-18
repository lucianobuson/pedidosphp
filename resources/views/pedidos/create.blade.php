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
                <div class="col col-2" style="text-align:right;">
                    <label for="totalPedido">Total</label>
                    <input type="text" style="text-align:right;" class="form-control" name="totalPedido" id="totalPedido" readonly disabled value="{{ number_format($pedido->total_pedido, 2, ',', '.') }}">
{{--                    <input type="text" min="0.01" max="1000.00" step="0.01" class="form-control" name="totalPedido" id="totalPedido" readonly disabled value="{{ number_format($pedido->total_pedido, 2, ',', '.') }}">--}}
                </div>
            </div>
            <button class="btn btn-primary mt-2">Gravar</button>
            <a href="{{ route('listar_pedidos') }}" class="btn btn-warning mt-2">Voltar</a>
            <a href="{{ route('listar_itens', ['id' => $pedido->id_pedido]) }}" class="btn btn-primary mt-2">Itens</a>
        </form>
    </div>
    <div class="container">
        {{--        @auth--}}
        {{--        <a href="{{ route('incluir_item') }}" class="btn btn-dark mb-2">Incluir</a>--}}
        {{--        @endauth--}}

        <table>
            <tr>
                <th style="text-align:right; width: 5%; padding: 0 8px 0 0;">Item</th>
                <th style="width: 60%;">Produto</th>
                <th style="text-align:right; width: 10%;">Qtde</th>
                <th style="text-align:right; width: 10%;">Preço</th>
                <th style="text-align:right; width: 10%;">Desc.</th>
                <th style="text-align:right; width: 10%;">Total</th>
            </tr>
            @foreach($itens as $item)
                <tr>
                    <td style="text-align:right; padding: 0 8px 0 0;" id="item-{{ $item->id }}">{{ $item->id }}</td>
                    <td id="idproduto-{{ $item->id_produto }}">{{ $item->id_produto }} - {{ $item->nome }}</td>
                    <td style="text-align:right;">{{ number_format($item->quantidade, 2, ',', '.') }}</td>
                    <td style="text-align:right;">{{ number_format($item->preco, 2, ',', '.') }}</td>
                    <td style="text-align:right;">{{ number_format($item->desconto, 2, ',', '.') }}</td>
                    <td style="text-align:right;">{{ number_format($item->total, 2, ',', '.') }}</td>
                    {{--                    <td style="text-align:right;">--}}
                    {{--                        <span class="d-flex">--}}
                    {{--                            @auth--}}
                    {{--                                <a href="{{ route('alterar_item', ['id' => $item->id]) }}" class="btn btn-info btn-sm mr-1">--}}
                    {{--                                    <i class="fas fa-edit"></i>--}}
                    {{--                                </a>--}}
                    {{--                                <form method="post" action="/itens/{{ $item->id }}"--}}
                    {{--                                      onsubmit="return confirm('Tem certeza que deseja excluir o item {{ addslashes($item->id) }} ?')" >--}}
                    {{--                                    @csrf--}}
                    {{--                                    @method('DELETE')--}}
                    {{--                                    <button class="btn-sm btn-danger">--}}
                    {{--                                        <i class="far fa-trash-alt"></i>--}}
                    {{--                                    </button>--}}
                    {{--                                </form>--}}
                    {{--                            @endauth--}}
                    {{--                        </span>--}}
                    {{--                    </td>--}}
                </tr>
            @endforeach
        </table>
    </div>
    <script>
        $("#idCliente").blur(function() {
            let idcliente = $("#idCliente").val();

            $.ajax({
                type: "POST",
                url: "{{ url('clientes/postIndex') }}",
                data: {id: idcliente},
                success: function(data, status){
                    alert("Dados: " + data + "\nStatus: " + status);
                },
                error: function(data) {
                    alert('Atenção: ', data);
                    $("#idCliente").focus();
                }
            });
        });
    </script>
@endsection
