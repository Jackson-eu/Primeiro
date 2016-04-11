<!--
Laio Pinheiro
laiopinheiro01@gmail.com 
-->
<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Sistema de Orcamentos - Inicio</title>
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
		require('control/Control.index.php');
	?>
</head>
<body>
	<!-- TOPO ============================================================================================= -->
	<h1 class="col-md-6 col-md-offset-3"><span class="glyphicon glyphicon-list-alt"></span> Sistema de Orçamentos</h1><br><br><hr class="col-xs-12 col-sm-6 
	col-md-12">
	<ul class="nav nav-tabs">
	  	<li class="active"><a href="index.php"><span class="glyphicon glyphicon-list-alt"></span> Orçamentos</a></li>
	  	<li><a href="cadastro.orcamento.php"><span class="glyphicon glyphicon-plus"></span> Novo Orçamento</a></li>
	  	<li><a href="cadastro.cliente.php"><span class="glyphicon glyphicon-user"></span> Clientes</a></li>
	  	<li><a href="cadastro.produto.php" ><span class="glyphicon glyphicon-shopping-cart"></span> Produtos</a></li>
	</ul>
	<!-- PESQUISA ============================================================================================= -->
	<div class="col-md-6">
		<div class="input-group">
			<input type="text" id="pesquisa" class="form-control" placeholder="Digite aqui o nome do cliente para pesquisar na lista de orçamentos... ">
			<span class="input-group-btn">
				<button class="btn btn-default" onclick="pesquisar()" type="button">
					Go!  <span class="glyphicon glyphicon-search"></span>
				</button>
			</span>
		</div>
	</div>
	<br>
	<!-- LISTA DE ORCAMENTOS ================================================================================== -->
	<table class="table">
		<tr>
			<td class="tdGrande">Nome do cliente</td>
			<td class="tdMedio">Data</td>
			<td class="tdMedio">Telefone</td>
			<td class="tdMedio">Validade</td>
			<td class="tdMedio">Detalhes</td>
			<td class="tdMedio">Excluir</td>
		</tr>
		<?php
			//Control.index.php
			listarOrcamentos();
		?>
    </table>
    <br>
</body>
</html>