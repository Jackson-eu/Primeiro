<!--
Laio Pinheiro
laiopinheiro01@gmail.com 
-->
<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Sistema de Orcamentos - Cadastro de Cliente</title>
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">
  	<link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<script src="//code.jquery.com/jquery-1.9.1.js"></script>
  	<script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
	<script src="js/util.bind.js"></script>
	<?php 
		require('class/Conexao.class.php');
		require('class/Cliente.class.php');
		require('control/Control.cadastro.cliente.php');
	?>
</head>
<body>
	<!-- TOPO ============================================================================================= -->
	<h1 class="col-md-6 col-md-offset-3"><span class="glyphicon glyphicon-user"></span> Gerenciamento de Clientes </h1><br><br><hr class="col-xs-12 col-sm-6 
	col-md-12">
	<ul class="nav nav-tabs">
	  	<li><a href="index.php"><span class="glyphicon glyphicon-list-alt"></span> Orçamentos</a></li>
	  	<li><a href="cadastro.orcamento.php"><span class="glyphicon glyphicon-plus"></span> Novo Orçamento</a></li>
	  	<li class="active"><a href="cadastro.cliente.php"><span class="glyphicon glyphicon-user"></span> Clientes</a></li>
	  	<li><a href="cadastro.produto.php" ><span class="glyphicon glyphicon-shopping-cart"></span> Produtos</a></li>
	</ul>
	<!-- CADASTRO ========================================================================================================= -->
	<div id="cliente-form">
		<h2>Cadastro</h2>
		<form action="cadastro.cliente.php?acao=inserir" method="POST" class="form-inline" role="form">
			<label>Nome:  </label>
			<input type="text" name="nome" class="form-control" placeholder="Nome..." style="width:450px;" maxlength="200"><br><br>
			<label>Endereço:  </label>
			<input type="text" name="endereco" class="form-control" placeholder="Endereço..." style="width:450px;" maxlength="200">
			<label style="margin-left:20px;">Bairro:  </label>
			<input type="text" name="bairro" class="form-control" placeholder="Bairro..." style="width:300px;" maxlength="100">
			<label style="margin-left:20px;">CEP:  </label>
			<input type="text" name="cep" class="form-control" placeholder="CEP..." style="width:100px;" maxlength="9"><br><br>
			<label>Telefone:  </label>
			<input type="text" name="telefone" class="form-control" placeholder="Telefone..." style="width:150px;" maxlength="13">
			<label style="margin-left:20px;">Email:  </label>
			<input type="text" name="email" class="form-control" placeholder="email..." style="width:350px;" maxlength="255">
    		<br><br><input class="btn btn-info col-md-offset-1 col-md-2" type="submit" value="Salvar" />
		</form>
	</div><br><hr>
	<!-- LISTAGEM ========================================================================================================= -->
	<div>
		<h2>Lista de Clientes</h2>
		<table id="tabela" class="table">
			<tr>
				<td style="width:20px;">ID</td>
				<td style="width:80px;">Nome</td>
				<td style="width:80px;">Endereco</td>
				<td style="width:50px;">Bairro</td>
				<td style="width:30px;">CEP</td>
				<td style="width:50px;">Telefone</td>
				<td style="width:50px;">Email</td>
				<td style="width:40px;">Deletar</td>
				<td style="width:40px;">Editar<span class="small">*</span></td>
			</tr>
			<?php
				//Control.cadastro.cliente.php
				listarClientes();
			?>
		</table>
		<span class="small">*para a edição de uma célula da tabela ser concluida aperte o botão salvar da linha correspondente</span>	
	</div>	
</body>
</html>