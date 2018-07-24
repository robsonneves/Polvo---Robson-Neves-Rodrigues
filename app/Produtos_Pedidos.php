<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produtos_Pedidos extends Model
{
    protected $fillable = ['id', 'produto_id', 'pedido_id'];
}
