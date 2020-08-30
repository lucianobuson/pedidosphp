<?php

namespace App\Http\Controllers;

use App\cliente;
use App\Http\Requests\ClientesFormRequest;
use App\Services\ClientesManutencao;
use Illuminate\Http\Request;

class clientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $clientes = cliente::query()->orderBy('nome')->get();
        $mensagem = $request->session()->get('mensagem');

        return view('clientes.index', compact('clientes', 'mensagem'));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClientesFormRequest $request, ClientesManutencao $incluirCliente)
    {
        $cliente = $incluirCliente->incluirCliente($request->nome, $request->email);
        $request->session()->flash('mensagem', "Cliente {$cliente->id} - {$cliente->nome} incluido com sucesso.");

        return redirect()->route('listar_clientes');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, ClientesManutencao $excluirCliente)
    {
        $nomeSerie = $excluirCliente->excluirCliente($request->id);

        $request->session()->flash('mensagem', "Cliente $nomeSerie excluido com sucesso");
        return redirect()->route('listar_clientes');
    }
}
