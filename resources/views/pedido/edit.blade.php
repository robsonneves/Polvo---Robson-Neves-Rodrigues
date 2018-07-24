@extends('base')
@section('content')

<div id="produtos" class="container">
	
	<div class="jumbotron">
	  	<div class="container">
	  		<blockquote class="blockquote text-center">
  	    		<h1 class="mb-0">Pedido Edição</h1>
  	    		<a href="{{route('pedidosIndex')}}" type="button" class="btn btn-primary">Voltar</a>
	    	</blockquote>
		</div>
	</div>

	<div class="row justify-content-center">

		<form class="col-md-6" method="post" action="{{route('pedidoSave')}}">
			{{ csrf_field() }}
		  	<div class="form-group">
		    	<label for="produtos">Produtos</label>
		    	<select id="produtosNome" class="col-md-12 js-example-basic-multiple" name="produtos[]" multiple="multiple" onchange="somarProdutos()">
				  	
		    		@foreach($produtos as $produto)
		    			
		    			@foreach($produtos_pedidos as $pp)

		    				@if($pp->pedido_id == $p->id && $pp->produto_id == $produto->id)
				
				    			<option value="{{$produto}}" selected="selected"> {{$produto->nome}} </option>

							@endif

						@endforeach

		    		@endforeach

	    			<option value="{{$produto}}"> {{$produto->nome}} </option>

				</select>

		    </div>
		  	<div class="form-group">
		    	<label for="data">Data</label>
		    	<input type="date" class="form-control" id="data" name="data" value="{{$p->data}}">
		    </div>

		  	<div class="form-group">
		    	<label for="total">Total</label>
		    	<input type="text" class="form-control" id="total" name="total" aria-describedby="total" value="{{$p->total}}" />
		    </div>
			<button type="submit" class="btn btn-primary">Cadastrar</button>
		</form>
	</div>

	<br><br>

</div>

@endsection 
