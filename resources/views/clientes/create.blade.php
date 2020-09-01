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
                <div class="col col-4">
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control" name="nome" id="nome" value="{{ $cliente->nome }}">
                </div>
                <div class="col col-4">
                    <label for="email">eMail</label>
                    <input type="text" class="form-control" name="email" id="email" value="{{ $cliente->email }}">
                </div>
            </div>

            @if($inclusao)
                <button class="btn btn-primary mt-2">Incluir</button>
            @else
                <button class="btn btn-primary mt-2">Alterar</button>
            @endif
        </form>
    </div>
@endsection
