<!--
Laio Pinheiro
laiopinheiro01@gmail.com 
-->
<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Sistema de Orcamentos - Cadastro de orcamento</title>
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">
  	<link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<script src="//code.jquery.com/jquery-1.9.1.js"></script>
  	<script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
	<script src="js/util.bind.js"></script>
	<?php 
		require('class/Conexao.class.php');
		require('class/Produto.class.php');
		require('class/Cliente.class.php');
		require('class/Orcamento.class.php');
		require('control/Control.cadastro.orcamento.php');
	?>
</head>
<body>
	<!-- TOPO ============================================================================================= -->
	<h1 class="col-md-6 col-md-offset-3"><span class="glyphicon glyphicon-plus"></span> Cadastro de Orçamento</h1><br><br><hr class="col-xs-12 col-sm-6 
	col-md-12">
	<ul class="nav nav-tabs">
	  	<li><a href="index.php"><span class="glyphicon glyphicon-list-alt"></span> Orçamentos</a></li>
	  	<li class="active"><a href="cadastro.orcamento.php"><span class="glyphicon glyphicon-plus"></span> Novo Orçamento</a></li>
	  	<li><a href="cadastro.cliente.php"><span class="glyphicon glyphicon-user"></span> Clientes</a></li>
	  	<li><a href="cadastro.produto.php" ><span class="glyphicon glyphicon-shopping-cart"></span> Produtos</a></li>
	</ul><br><br>
	<!-- FORMULARIO DE CADASTRO ============================================================================================== -->
	<form action="cadastro.orcamento.php?acao=inserir" id="form-cadastro-orcamento" method="POST" class="form-inline" role="form">
		<label for="cliente">Cliente: </label>
		<select name="cliente" id="cliente" class="form-control">
			<option selected value="">Selecione o Cliente</option>
			<?php listarClientes(); ?>
		</select>
		<label class="componenteDireita" for="data">Data: </label>
		<input type="text" name="data" class="form-control datepicker">
		<br><br>
		<fieldset>
			<legend>Produto(s) Cotado(s)</legend>
			<label>Produto 1: </label>
			<select name="produto1" id="produto1" class="form-control">
				<option selected value="">Selecione o Produto</option>
				<?php listarProdutos(); ?>
			</select><br><br>
			<label>Produto 2: </label>
			<select name="produto2" id="produto2" class="form-control"> 
				<option selected value="">Selecione o Produto</option>
				<?php listarProdutos(); ?>
			</select><br><br>
			<label>Produto 3: </label>
			<select name="produto3" id="produto3" class="form-control">
				<option selected value="">Selecione o Produto</option>
				<?php listarProdutos(); ?>
			</select><br>
		</fieldset>
		<hr>
		<div class="row">
			<div class="col-md-4">
				<label>Condições Desejadas: </label><br>
				<textarea class="form-control" rows="6" cols="36" placeholder="Aqui ficam as condições..." id="condicoes" name="condicoes"></textarea>
			</div>
			<div>
				<label>Objeções: </label><br>
				<textarea class="form-control" rows="6" cols="36" placeholder="Aqui ficam as objeções..." id="objecoes" name="objecoes"></textarea>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3">
				<label for="data-retorno">Data de Retorno do Contato:</label><br>
				<input type="text" name="data-retorno" class="form-control datepicker">
			</div>
			<div class="col-md-3">
				<label for="data-validade">Data de Validade do Orcamento:</label><br>
				<input type="text" name="data-validade" class="form-control datepicker">
			</div>
		</div><br>
		<input type="submit"  class="btn btn-info col-md-offset-1 col-md-2" value="Salvar"><br><br><br>
	</form>
</body>
</html>