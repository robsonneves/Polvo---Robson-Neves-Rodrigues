@extends('base')
@section('content')

<div id="produtos" class="container">
	
	<div class="jumbotron">
	  	<div class="container">
	  		<blockquote class="blockquote text-center">
  	    		<h1 class="mb-0">Produtos</h1>
  	    		<a href="{{route('cadastroIndex')}}" type="button" class="btn btn-light">Voltar Home</a>
  	    		<a href="{{route('produtosCadastro')}}" type="button" class="btn btn-primary">Novo produto</a>
	    	</blockquote>
		</div>
	</div>

	@if(Session::has('msg'))
		<div class="alert alert-success">{{ Session::get('msg')}}</div>
	@endif

	<table class="table table-striped">
	  	<thead>
	    	<tr>
		      	<th scope="col">SKU</th>
		      	<th scope="col">Nome</th>
		      	<th scope="col">Descrição</th>
		      	<th scope="col">Preço</th>
		    	<th scope="col">#</th>
		    </tr>
	  	</thead>
	  	
	  	<tbody>

	  		@foreach($produtos as $produto)

			    <tr>
			      	<th scope="row">{{$produto->SKU}}</th>
			      	<td>{{$produto->nome}}</td>
			      	<td>{{$produto->descricao}}</td>
			      	<td>{{$produto->preco}}</td>
			      	<td>
			      		<a href="{{route('produtosEdit', ['id' => $produto->id])}}"> Editar </a> | 
			      		<a href="{{route('produtosDeletar', ['id' => $produto->id])}}"> Deletar </a>
			      	</td>
			    </tr>

	    	@endforeach

	  	</tbody>
	</table>

</div>

@endsection 
