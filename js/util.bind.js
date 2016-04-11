//utilitarios jquery
$(function() {
    $( ".datepicker" ).datepicker();
  });
$(function(){
	$(".moeda").maskMoney({decimal:".", thousands:''});
});
//EDITAR CLIENTE ============================================================================
//cadastro.cliente.php
function editarCliente(contador, cod) {
	var inputNome = "", inputEndereco = "", inputBairro = "", 
		inputCep = "", inputTelefone = "", inputEmail = "";
	var nome = "", endereco = "", bairro = "", cep = "", telefone = "", email = "";

	inputNome = 'nome'+contador+'';
	inputEndereco = 'endereco'+contador+'';
	inputBairro = 'bairro'+contador+'';
	inputCep = 'cep'+contador+'';
	inputTelefone = 'telefone'+contador+'';
	inputEmail = 'email'+contador+'';

	//captura valores dos campos para passar ao php via GET
	nome = document.getElementById(inputNome).value;
	endereco = document.getElementById(inputEndereco).value;
	bairro = document.getElementById(inputBairro).value;
	cep = document.getElementById(inputCep).value;
	telefone = document.getElementById(inputTelefone).value;
	email = document.getElementById(inputEmail).value;

	window.location.href = "cadastro.cliente.php?acao=editar&cod="+cod+"&nome="+nome+"&endereco="+endereco+"&bairro="+bairro+"&cep="+cep+"&telefone="+telefone+"&email="+email+"";
}

//EDITAR PRODUTO =======================================================================================================
//cadastro.produto.php
function editarProduto(contador, cod) {
	var inputNome = "", inputValor = "", inputMedida = "";
	var nome = "", valor = "", medida = "";

	inputNome = 'nome'+contador+'';
	inputValor = 'valor'+contador+'';
	inputMedida = 'medida'+contador+'';

	nome = document.getElementById(inputNome).value;
	valor = document.getElementById(inputValor).value;
	medida = document.getElementById(inputMedida).value;

	window.location.href = "cadastro.produto.php?acao=editar&cod="+cod+"&nome="+nome+"&valor="+valor+"&medida="+medida+"";
}

//PESQUISAR =====================================================================================================
//index.php
function pesquisar(){
	var texto = "";
	texto = document.getElementById('pesquisa').value;
	
	window.location.href = "index.php?texto="+texto+"";
}