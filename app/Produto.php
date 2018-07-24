<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
     
    protected $fillable = ['id', 'SKU', 'nome', 'descricao', 'preco'];

    public $rules = [
     	'SKU' 		=> 'required',
     	'nome' 		=> 'required|min:3|max:100',
     	'descricao' => 'min:3|max:1000',
     	'preco' 	=> 'required'
    ];

}
