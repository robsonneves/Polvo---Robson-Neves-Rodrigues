$(document).ready(function() {
    $('.js-example-basic-multiple').select2();
    $('#preco').maskMoney();
    $('#total').maskMoney();
});

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
	valor1 = retirarPontoTotal(valor1);
	valor2 = retirarPonto(valor2);
	var v1 = parseInt(valor1);
	var v2 = parseInt(valor2);
	var total = (v1) + (v2);
	total     = colocarVirgula(total);
	return total
}

function retirarPontoTotal(valor){
	var v = 0
	if(valor != 0 && valor != undefined){
		v = valor.replace(/\D+/g, '')
	}
	return v;
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