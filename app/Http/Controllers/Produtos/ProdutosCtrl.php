<?php

namespace App\Http\Controllers\Produtos;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Produto;

class ProdutosCtrl extends Controller{

	private $produto;

	public function __construct(Produto $produto){
		$this->produto = $produto;
	}

    public function index(){
    	$produtos = Produto::all();
    	return view('produtos.index', compact('produtos'));
    }

    public function cadastro(){
    	return view('produtos.cadastro', compact('p'));
    }

    public function save(Request $request){
        try{
        	$this->validate($request, $this->produto->rules);
        	Produto::create($request->all());
            \Session::flash('msg', 'Produto Salvo com sucesso !');
    		return redirect()->route('produtosIndex');
        }catch(Exception $e){
            return $e->getMessage();
        }
    }

    public function edit($id){
    	$p = Produto::find($id);
    	return view('produtos.edit', compact('p'));
    }

    public function update(Request $request){
        try{
        	$this->validate($request, $this->produto->rules);
            Produto::find($request->id)->update($request->all());
            \Session::flash('msg', 'Produto Editado com sucesso !');
    		return redirect()->route('produtosIndex');
        }catch(Exception $e){
            return $e->getMessage();
        }
    }	

    public function deletar($id){
        try{
        	Produto::find($id)->delete();
            \Session::flash('msg', 'Produto Deletado com sucesso !');
    		return redirect()->route('produtosIndex');
        }catch(Exception $e){
            return $e->getMessage();
        }
    }
    
}
