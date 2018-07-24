<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    
    protected $fillable = ['id', 'data', 'total'];

    public $rules = [
     	'data' 		=> 'required',
     	'total' 	=> 'required',
     	'produtos'   => 'required',
    ];

}
