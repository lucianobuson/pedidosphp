<?php

namespace App\Services;

use App\cliente;
use Illuminate\Support\Facades\DB;

class IncluirCliente
{
    public function incluirCliente(string $nome): Cliente
    {
        $cliente = null;
        DB::beginTransaction();
        $cliente = cliente::create(['nome' => $nome]);
        DB::commit();

        return $cliente;
    }

}
