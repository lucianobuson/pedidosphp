<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProdutosFormRequest;
use App\Iten;
use App\Produto;
use Illuminate\Http\Request;

class ProdutosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $produtos = Produto::query()->orderBy('nome')->get();
        $mensagem = $request->session()->get('mensagem');

        return view('produtos.index', compact('produtos', 'mensagem'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $produto = new Produto();

        return view('produtos.create', compact('produto'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProdutosFormRequest $request)
    {
        $produto = Produto::create(['nome' => $request->nome, 'preco' => $request->preco]);
        $request->session()->flash('mensagem', "Produto {$produto->id} - {$produto->nome} incluido com sucesso.");

        return redirect()->route('listar_produtos');
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
    public function edit(int $id)
    {
        $produto = Produto::find($id);

        return view('produtos.create', compact('produto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProdutosFormRequest $request, int $id)
    {
        $produto = Produto::find($id);
        $produto->nome = $request->nome;
        $produto->preco = $request->preco;
        $produto->save();

        return redirect()->route('listar_produtos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $produto = Produto::find($request->id);
        $nomeProduto = $produto->nome;
        $qtdeItens = Iten::where('id_produto', $request->id)->count();
        if ($qtdeItens == 0) {
            $produto->delete();
            $request->session()->flash('mensagem', "Produto $nomeProduto excluido com sucesso.");
        } else {
            $request->session()->flash('mensagem', "Há itens de pedidos vinculados ao produto.");
        }

        return redirect()->route('listar_produtos');
    }
}
