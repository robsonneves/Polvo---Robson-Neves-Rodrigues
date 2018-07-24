@extends('base')
@section('content')

<div class="jumbotron jumbotron-fluid">
  	<div class="container">
  		<div class="col-md-6">
		    <h1 class="display-4">Produtos</h1>
		    <p class="lead">
		    	<a href="{{route('produtosIndex')}}"> Cadastrar produto </a>
		    </p>
	    </div>
	    <div class="col-md-6">
		    <h1 class="display-4">Pedido</h1>
		    <p class="lead">
		    	<a href="{{route('pedidosIndex')}}"> Cadastrar pedido </a>
		    </p>
	    </div>
	</div>
</div>


@endsection 