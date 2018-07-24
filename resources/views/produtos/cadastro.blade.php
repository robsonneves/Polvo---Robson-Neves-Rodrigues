@extends('base')
@section('content')

<div id="produtos" class="container">
	
	<div class="jumbotron">
	  	<div class="container">
	  		<blockquote class="blockquote text-center">
  	    		<h1 class="mb-0">Produto Cadastro</h1>
  	    		<a href="{{route('produtosIndex')}}" type="button" class="btn btn-primary">Voltar</a>
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

		<form class="col-md-6" method="post" action="{{route('produtosSave')}}">
			{{ csrf_field() }}
		  	<div class="form-group">
		    	<label for="sku">SKU</label>
		    	<input type="number" class="form-control" id="sku" name="SKU" value="{{ old('SKU') }}" aria-describedby="nome" placeholder="Numero SKU">
		    </div>
		  	<div class="form-group">
		    	<label for="nome">Nome</label>
		    	<input type="text" class="form-control" id="nome" name="nome" value="{{ old('nome') }}" aria-describedby="nome" placeholder="Nome do produto">
		    </div>
		    <div class="form-group">
			    <label for="descricao">Descrição</label>
			    <textarea class="form-control" id="descricao" name="descricao" rows="3">{{ old('descricao') }}</textarea>
			</div>
			<div class="form-group">
		    	<label for="preco">Preço</label>
		    	<input type="text" class="form-control" id="preco" name="preco" value="{{ old('preco') }}" aria-describedby="preco" placeholder="Preço do produto">
		    </div>

		  	<button type="submit" class="btn btn-primary">Cadastrar</button>
		</form>
	</div>

	<br><br>

</div>

@endsection 
