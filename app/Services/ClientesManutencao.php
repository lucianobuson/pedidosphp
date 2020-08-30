<?php

namespace App\Services;

use App\Cliente;
use Illuminate\Support\Facades\DB;

class ClientesManutencao
{
    public function incluirCliente(string $nome): Cliente
    {
        $cliente = null;
        DB::beginTransaction();
        $cliente = Cliente::create(['nome' => $nome]);
        DB::commit();

        return $cliente;
    }

    public function excluirCliente(int $clienteId): string
    {
        $clienteNome = '';
        DB::transaction(function() use($clienteNome, $clienteId) {
            $cliente = Cliente::find($clienteId);
            $clienteNome = $cliente->nome;
            $cliente->delete();
        });

        return $clienteNome;
    }

}
