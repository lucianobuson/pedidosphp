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
                    <input type="text" class="form-control" name="nome" id="nome" value="{{ $produto->nome }}">
                </div>
                <div class="col col-4">
                    <label for="preco">Preço</label>
                    <input type="number" placeholder="0,00" pattern="^\d*(\.\d{0,2})?$" min="0.01" max="1000.00" step="0.01" class="form-control" name="preco" id="preco" value="{{ $produto->preco }}">
                </div>
            </div>

            <button class="btn btn-primary mt-2">Gravar</button>
        </form>
    </div>
@endsection
