@extends('base')
@section('content')

<div id="pedido" class="container">
	
	<div class="jumbotron">
	  	<div class="container">
	  		<blockquote class="blockquote text-center">
  	    		<h1 class="mb-0">Pedidos</h1>
  	    		<a href="{{route('cadastroIndex')}}" type="button" class="btn btn-light">Voltar Home</a>
  	    		<a href="{{route('pedidoCadastro')}}" type="button" class="btn btn-primary">Cadastro</a>
	    	</blockquote>
		</div>
	</div>

	@if(Session::has('msg'))
		<div class="alert alert-success">{{ Session::get('msg')}}</div>
	@endif

	<table class="table table-striped">
	  	<thead>
	    	<tr>
		      	<th scope="col">id</th>
		      	<th scope="col">Produtos</th>
		      	<th scope="col">Data</th>
		      	<th scope="col">Total</th>
		    	<th scope="col">#</th>
		    </tr>
	  	</thead>
	  	
	  	<tbody>

	  		@foreach($pedidos as $pedido)

			    <tr>
			      	<th scope="row">{{$pedido->id}}</th>
			      	<td>

			    		@foreach($produtos as $produto)
		    			
			    			@foreach($produtos_pedidos as $pp)

			    				@if($pp->pedido_id == $pedido->id && $pp->produto_id == $produto->id)
									
									{{$produto->nome}} - 

								@endif

							@endforeach

			    		@endforeach

			      	</td>
			      	<td>{{$pedido->data}}</td>
			      	<td>{{$pedido->total}}</td>
			      	<td>
		      			<a href="{{route('pedidoEdit', ['id' => $pedido->id])}}"> Editar </a> | 
			      		<a href="{{route('pedidoDeletar', ['id' => $pedido->id])}}"> Deletar </a>
			      	</td>
			    </tr>

	    	@endforeach

	  	</tbody>
	</table>

</div>

@endsection 
