<?php

namespace App\Services;

use App\Cliente;
use App\Pedido;
use Illuminate\Support\Facades\DB;

class ClientesManutencao
{
    public function incluirCliente(string $nome, string $email): Cliente
    {
        $cliente = null;
        DB::beginTransaction();
        $cliente = Cliente::create(['nome' => $nome, 'email' => $email]);
        DB::commit();

        return $cliente;
    }

    public function excluirCliente(int $clienteId): string
    {
        $clienteNome = '';
        $qtdePedidos = Pedido::where('id_cliente', $clienteId)->count();
        if ($qtdePedidos > 0) {
            $clienteNome = '-1';
        } else {
            DB::transaction(function () use ($clienteNome, $clienteId) {
                $cliente = Cliente::find($clienteId);
                $clienteNome = $cliente->nome;
                $cliente->delete();
            });
        }

        return $clienteNome;
    }

}
