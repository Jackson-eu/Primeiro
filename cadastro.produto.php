<!--
Laio Pinheiro
laiopinheiro01@gmail.com 
-->
<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Sistema de Orcamentos - Cadastro de Produto</title>
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">
  	<link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<script src="//code.jquery.com/jquery-1.9.1.js"></script>
  	<script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
	<script src="js/jquery.maskMoney.js"></script>
	<script src="js/util.bind.js"></script>
	<?php 
		require('class/Conexao.class.php');
		require('class/Produto.class.php');
		require('control/Control.cadastro.produto.php');
	?>
</head>
<body>
	<!-- TOPO ============================================================================================= -->
	<h1 class="col-md-6 col-md-offset-3"><span class="glyphicon glyphicon-shopping-cart"></span> Gerenciamento de Produtos</h1><br><br><hr class="col-xs-12 col-sm-6 
	col-md-12">
	<ul class="nav nav-tabs">
	  	<li><a href="index.php"><span class="glyphicon glyphicon-list-alt"></span> Orçamentos</a></li>
	  	<li><a href="cadastro.orcamento.php"><span class="glyphicon glyphicon-plus"></span> Novo Orçamento</a></li>
	  	<li><a href="cadastro.cliente.php"><span class="glyphicon glyphicon-user"></span> Clientes</a></li>
	  	<li class="active"><a href="cadastro.produto.php" ><span class="glyphicon glyphicon-shopping-cart"></span> Produtos</a></li>
	</ul>
	<!-- CADASTRO ========================================================================================================= -->
	<div id="cliente-form">
		<h2>Cadastro</h2>
		<form action="cadastro.produto.php?acao=inserir" method="POST" class="form-inline" role="form">
			<label>Nome:  </label>
			<input type="text" name="nome" class="form-control" placeholder="Nome do produto..." style="width:450px;" maxlength="200"><br><br>
			<label>Valor:  </label>
			<input type="text" name="valor" class="form-control moeda" placeholder="R$ 0.00" style="width:200px;" maxlength="13">
			<label style="margin-left:20px;">Medida:  </label>
			<input type="text" name="medida" class="form-control" placeholder="Medida do produto..." style="width:300px;" maxlength="45">
    		<br><br><input class="btn btn-info col-md-offset-1 col-md-2" type="submit" value="Salvar" />
		</form>
	</div><br><hr>
	<!-- LISTAGEM ========================================================================================================= -->
	<div>
		<h2>Lista de Produtos</h2>
		<table id="tabela" class="table">
			<tr>
				<td style="width:20px;">ID</td>
				<td style="width:100px;">Nome</td>
				<td style="width:50px;">Valor</td>
				<td style="width:100px;">Medida</td>
				<td style="width:40px;">Deletar</td>
				<td style="width:40px;">Editar<span class="small">*</span></td>
			</tr>
			<?php
				//Control.cadastro.cliente.php
				listarProdutos();
			?>
		</table>
		<span class="small">*para a edição de uma célula da tabela ser concluida aperte o botão salvar da linha correspondente</span>	
	</div>	
</body>
</html>