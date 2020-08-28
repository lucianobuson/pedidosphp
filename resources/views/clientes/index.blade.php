@extends('layout')

@section('conteudo')
    @include('mensagem', ['mensagem' => $mensagem])

    <div class="container">
{{--        @auth--}}
            <a href="{{ route('form_incluir_cliente') }}" class="btn btn-dark mb-2">Incluir</a>
{{--        @endauth--}}

        <ul class="list-group">
            @foreach($clientes as $cliente)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span id="nome-cliente-{{ $cliente->id }}">{{ $cliente->nome }}</span>

                    <div class="input-group w-50" hidden id="input-nome-cliente-{{ $cliente->id }}">
                        <input type="text" class="form-control" value="{{ $cliente->nome }}">
                        <div class="input-group-append">
                            <button class="btn btn-primary" onclick="editarCliente({{ $cliente->id }})">
                                <i class="fas fa-check"></i>
                            </button>
                            @csrf
                        </div>
                    </div>

                    <span class="d-flex">
                        @auth
                            <button class="btn btn-info btn-sm mr-1" onclick="toggleInput({{ $cliente->id }})">
                                <i class="fas fa-edit"></i>
                            </button>
                        @endauth
                        @auth
                            <form method="post" action="/cliente/{{ $cliente->id }}"
                                  onsubmit="return confirm('Tem certeza que deseja excluir {{ addslashes($cliente->nome) }} ?')" >
                                @csrf
                                @method('DELETE')
                                <button class="btn-sm btn-danger">
                                    <i class="far fa-trash-alt"></i>
                                </button>
                            </form>
                        @endauth
                    </span>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
