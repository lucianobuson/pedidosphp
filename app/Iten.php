<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Iten extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'id_pedido', 'id_produto', 'quantidade', 'preco', 'total'];

    public function pedido()
    {
        return $this->belongsTo(Pedido::class);
    }
}
