<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'id_cliente', 'data_pedido', 'total'];
//    protected $fillable = ['id_cliente', 'data_pedido', 'total'];
//    protected $dates = ['data_pedido'];

    public function itens()
    {
        return $this->hasMany(Iten::class);
    }

}
