@extends('layout')

@section('conteudo')
    @include('mensagem', ['mensagem' => $mensagem])

    <div class="container">
        {{--        @auth--}}
        <a href="{{ route('incluir_produto') }}" class="btn btn-dark mb-2">Incluir</a>
        {{--        @endauth--}}

        <ul class="list-group">
            @foreach($produtos as $produto)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span id="nome-cliente-{{ $produto->id }}">{{ $produto->nome }}</span>
                    <span>{{ number_format($produto->preco, 2, ',', '.') }}</span>

                    <span class="d-flex">
{{--                        @auth--}}
                            <a href="{{ route('alterar_produto', ['id' => $produto->id]) }}" class="btn btn-info btn-sm mr-1">
                                <i class="fas fa-edit"></i>
                            </a>
{{--                        @endauth--}}
{{--                        @auth--}}
                            <form method="post" action="/produtos/{{ $produto->id }}"
                                  onsubmit="return confirm('Tem certeza que deseja excluir {{ addslashes($produto->nome) }} ?')" >
                                @csrf
                                @method('DELETE')
                                <button class="btn-sm btn-danger">
                                    <i class="far fa-trash-alt"></i>
                                </button>
                            </form>
{{--                        @endauth--}}
                    </span>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
