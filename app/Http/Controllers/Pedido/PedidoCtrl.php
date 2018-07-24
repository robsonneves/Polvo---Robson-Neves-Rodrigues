<?php

namespace App\Http\Controllers\Pedido;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pedido;
use App\Produto;
use App\Produtos_Pedidos;

class PedidoCtrl extends Controller
{

	private $pedido;

	public function __construct(Pedido $pedido){
		$this->pedido = $pedido;
	}


	public function index(){
		$pedidos = Pedido::all();
		$produtos = Produto::all();
		$produtos_pedidos = Produtos_Pedidos::all();
		return view('pedido.index', compact('pedidos', 'produtos', 'produtos_pedidos'));
	}

	public function cadastro(){
		$produtos = Produto::all();
		return view('pedido.cadastro', compact('produtos'));
	}

	public function edit($id){
		$p = Pedido::find($id);
		$produtos = Produto::all();
		$produtos_pedidos = Produtos_Pedidos::all();
    	return view('pedido.edit', compact('p', 'produtos', 'produtos_pedidos'));
	}

	public function save(Request $request){
		try{
			$this->validate($request, $this->pedido->rules);
        	$pedido 		= new Pedido();
        	$pedido->data  	= $request->data;
			$pedido->total 	= $request->total;
			if($pedido->save()){
				$idPedido = $pedido->id;
				foreach ($request->produtos as $key => $v){
					$v = explode(",", $v);
					$v = explode(":", $v[0]);
					$idProduto = $v[1];	

					$pp = new Produtos_Pedidos();
					$pp->produto_id = $idProduto;
					$pp->pedido_id  = $idPedido;
					$pp->save();
				}
			}
			\Session::flash('msg', 'Pedido salvo com sucesso !');
			return redirect()->route('pedidosIndex');
		}catch(Exception $e){
            return $e->getMessage();
        }
	}

	public function update(Request $request){
		try{
        	$this->validate($request, $this->pedido->rules);
        	$p 				= Pedido::findOrFail($request->id);
        	$p->data 		= $request->data;
        	$p->total 		= $request->total;
        	$p->save();
        	\Session::flash('msg', 'Pedido Editado com sucesso !');
    		return redirect()->route('pedidosIndex');
        }catch(Exception $e){
            return $e->getMessage();
        }
	}

	public function deletar($id){
		try{
			$p = Pedido::find($id);
	    	$p->delete();
			\Session::flash('msg', 'Pedido Deletado com sucesso !');
			return redirect()->route('pedidosIndex');
		}catch(Exception $e){
            return $e->getMessage();
        }
	}

}
