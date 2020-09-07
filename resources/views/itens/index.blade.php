@extends('layout')

@section('conteudo')
    @include('mensagem', ['mensagem' => $mensagem])

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
                    <td id="idproduto-{{ $item->id_produto }}">{{ $item->id_produto }} - {{ $item->nome_produto }}</td>
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
@endsection
