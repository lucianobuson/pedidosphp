<?php

namespace App\Http\Controllers;

use App\Iten;
use App\Pedido;
use Illuminate\Http\Request;

class ItensController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, int $pedidoId)
    {
        $itens = Iten::select(['itens.id', 'itens.id_produto', 'produtos.nome', 'itens.quantidade', 'itens.preco',
                               'itens.desconto', 'itens.total'])
                       ->leftJoin('produtos', 'itens.id_produto', '=', 'produtos.id')
                       ->where('itens.id_pedido', $pedidoId)
                       ->orderBy('itens.id')
                       ->get();

        $mensagem = $request->session()->get('mensagem');

        return view('itens.index', compact('itens', 'mensagem'));

//        $pedido = Pedido::find($pedidoId);
//        $itens = $pedido->itens;
//        $mensagem = $request->session()->get('mensagem');
//
//        return view('itens.index', compact('pedido', 'itens', 'mensagem'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function destroy($id)
    {
        //
    }
}
