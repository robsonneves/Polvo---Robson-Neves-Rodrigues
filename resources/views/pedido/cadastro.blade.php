@extends('base')
@section('content')

<div id="produtos" class="container">
	
	<div class="jumbotron">
	  	<div class="container">
	  		<blockquote class="blockquote text-center">
  	    		<h1 class="mb-0">Pedido Cadastro</h1>
  	    		<a href="{{route('pedidosIndex')}}" type="button" class="btn btn-primary">Voltar</a>
	    	</blockquote>
		</div>
	</div>

	@if( isset($errors) && count($errors) > 0)

		<div class="alert alert-danger">
			@foreach( $errors->all() as $error)
				<p>{{ $error }}</p>
			@endforeach
		</div>

	@endif

	<div class="row justify-content-center">

		<form class="col-md-6" method="post" action="{{route('pedidoSave')}}">
			{{ csrf_field() }}
		  	<div class="form-group">
		    	<label for="produtos">Produtos</label>
		    	<select id="produtosNome" class="col-md-12 js-example-basic-multiple" name="produtos[]" multiple="multiple" onchange="somarProdutos()">
				  	
		    		@foreach($produtos as $produto)

		    			<option value="{{$produto}}"> {{$produto->nome}} </option>

		    		@endforeach

				</select>

		    </div>
		  	<div class="form-group">
		    	<label for="data">Data</label>
		    	<input type="date" class="form-control" id="data" name="data">
		    </div>

		  	<div class="form-group">
		    	<label for="total">Total</label>
		    	<input type="text" class="form-control" id="total" name="total" aria-describedby="total" />
		    </div>
			<button type="submit" class="btn btn-primary">Cadastrar</button>
		</form>
	</div>

	<br><br>

</div>

<script type="text/javascript">
	
	function somarProdutos(){
		var produtos = $('#produtosNome').val();
		var total = 0;
		for(i=0; i<produtos.length; i++){
			var produtoPreco = somar(total , produtos[i]);
			total = produtoPreco;
		}
		$('#total').val(total);
	}

	function somar(valor1, valor2){
		valor2 = retirarPonto(valor2);
		var total = parseInt(valor1) + parseInt(valor2);
		total     = colocarVirgula(total);
		return total
	}

	function retirarPonto(valor){
		var v = 0;
		if(valor != 0 && valor != undefined){
			var vPreco = valor.split(",");
			var vValor = vPreco[4].split(":");
			v = vValor[1].replace(/\D+/g, '')
		}
		return v; 
	}

	function colocarVirgula(n){
	    var n = ''+n, t = n.length -1, novo = '';
	    for( var i = t, a = 1; i >=0; i--, a++ ){
	        var ponto = a % 2 == 0 && i > 1 ? '.' : '';
	        novo = ponto + n.charAt(i) + novo;
	    }
	    return novo;
	}

</script>

@endsection 
