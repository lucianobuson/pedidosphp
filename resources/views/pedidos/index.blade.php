@extends('layout')

@section('conteudo')
    @include('mensagem', ['mensagem' => $mensagem])

    <div class="container">
        {{--        @auth--}}
        <a href="{{ route('incluir_pedido') }}" class="btn btn-dark mb-2">Incluir</a>
        {{--        @endauth--}}

        <table>
            <tr>
                <th style="width: 5%; padding: 0 8px 0 0;">Pedido</th>
                <th style="width: 60%;">Cliente</th>
                <th style="width: 20%;">Data</th>
                <th style="text-align:right; width: 20%;">Valor</th>
                <th style="width: 20%;"> </th>
            </tr>
            @foreach($pedidos as $pedido)
                <tr>
                    <td style="text-align:right; padding: 0 8px 0 0;" id="numped-{{ $pedido->id }}">{{ $pedido->id }}</td>
                    <td id="idcliente-{{ $pedido->id_cliente }}">{{ $pedido->id_cliente }} - {{ $pedido->nome }}</td>
                    <td>{{ date('d/m/Y', strtotime($pedido->data_pedido)) }}</td>
                    <td style="text-align:right;">{{ number_format($pedido->total, 2, ',', '.') }}</td>
                    <td style="text-align:right;">
                        <span class="d-flex">
{{--                            @auth--}}
                                <a href="{{ route('alterar_pedido', ['id' => $pedido->id]) }}" class="btn btn-info btn-sm mr-1">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form method="post" action="/pedidos/{{ $pedido->id }}"
                                      onsubmit="return confirm('Tem certeza que deseja excluir o pedido {{ addslashes($pedido->id) }} ?')" >
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn-sm btn-danger">
                                        <i class="far fa-trash-alt"></i>
                                    </button>
                                </form>
{{--                            @endauth--}}
                        </span>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
