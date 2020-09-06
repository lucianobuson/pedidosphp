<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'id_cliente', 'data_pedido', 'total'];

    public function itens()
    {
        return $this->hasMany(Iten::class);
    }

}
