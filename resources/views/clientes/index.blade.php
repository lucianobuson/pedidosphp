@extends('layout')

@section('conteudo')
    @include('mensagem', ['mensagem' => $mensagem])

    <div class="container">
{{--        @auth--}}
            <a href="{{ route('incluir_cliente') }}" class="btn btn-dark mb-2">Incluir</a>
{{--        @endauth--}}

        <ul class="list-group">
            @foreach($clientes as $cliente)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span id="nome-cliente-{{ $cliente->id }}">{{ $cliente->nome }}</span>
                    <span>{{ $cliente->email }}</span>

{{--                    <div class="input-group w-50" hidden id="input-nome-cliente-{{ $cliente->id }}">--}}
{{--                        <input type="text" class="form-control" value="{{ $cliente->nome }}">--}}
{{--                    </div>--}}

                    <span class="d-flex">
{{--                        @auth--}}
                            <a href="{{ route('alterar_cliente', ['id' => $cliente->id]) }}" class="btn btn-info btn-sm mr-1">
                                <i class="fas fa-edit"></i>
                            </a>
{{--                        @endauth--}}
{{--                        @auth--}}
                            <form method="post" action="/clientes/{{ $cliente->id }}"
                                  onsubmit="return confirm('Tem certeza que deseja excluir {{ addslashes($cliente->nome) }} ?')" >
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
