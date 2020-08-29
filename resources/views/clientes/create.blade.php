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
                <div class="col col-8">
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control" name="nome" id="nome">
                </div>
            </div>

            <button class="btn btn-primary mt-2">Incluir</button>
        </form>
    </div>
@endsection
