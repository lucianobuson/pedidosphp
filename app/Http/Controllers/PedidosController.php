<?php

namespace App\Http\Controllers;

use App\Http\Requests\PedidosFormRequest;
use App\Iten;
use App\Pedido;
use Illuminate\Http\Request;

class PedidosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pedidos = Pedido::query()
                            ->leftJoin('clientes', 'pedidos.id_cliente', '=', 'clientes.id')
                            ->orderBy('pedidos.id')->get(['pedidos.id', 'pedidos.id_cliente', 'clientes.nome', 'pedidos.data_pedido', 'pedidos.total']);

        $mensagem = $request->session()->get('mensagem');

        return view('pedidos.index', compact('pedidos', 'mensagem'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pedido = new Pedido();

        return view('pedidos.create', compact('pedido'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PedidosFormRequest $request)
    {
        $pedido = Pedido::create(['id_cliente' => $request->idCliente, 'data_pedido' => $request->dataPedido, 'total' => 0]);
        $request->session()->flash('mensagem', "Pedido número {$pedido->id} incluido com sucesso.");

        return view('pedidos.create', compact('pedido'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
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
        $pedido = Pedido::select('pedidos.id as id_pedido', 'pedidos.id_cliente', 'clientes.nome as nome_cliente',
                                 'pedidos.data_pedido', 'pedidos.total as total_pedido')->
                          leftJoin('clientes', 'pedidos.id_cliente', '=', 'clientes.id')->
                          where('pedidos.id', $id)->
                          first();

        $itens = Iten::select(['itens.id', 'itens.id_produto', 'produtos.nome', 'itens.quantidade', 'itens.preco',
                               'itens.desconto', 'itens.total'])
                               ->leftJoin('produtos', 'itens.id_produto', '=', 'produtos.id')
                               ->where('itens.id_pedido', $id)
                               ->orderBy('itens.id')
                               ->get();

        return view('pedidos.create', compact('pedido', 'itens'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PedidosFormRequest $request, int $id)
    {
        $pedido = Pedido::find($id);
        $pedido->id_cliente = $request->idCliente;
        $pedido->data_pedido = $request->dataPedido;
        $pedido->save();

        return redirect()->route('listar_pedidos');

//        return view('pedidos.create', compact('pedido'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        //
    }
}
