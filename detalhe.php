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
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<script src="//code.jquery.com/jquery-1.9.1.js"></script>
	<script src="js/util.bind.js"></script>
	<?php 
		require('class/Conexao.class.php');
		require('class/Produto.class.php');
		require('class/Cliente.class.php');
		require('class/Orcamento.class.php');
		require('control/Control.detalhe.php');
	?>
</head>
<body>
	<div class="col-md-4"><a href="index.php" class="btn btn-default"><span class="glyphicon glyphicon-hand-left"></span> Voltar</a></div>
	<h1 class="col-md-6 col-md-offset-3"><span class="glyphicon glyphicon-file"></span> Detalhes do Orçamento</h1><br><br><hr class="col-xs-12 col-sm-6 
	col-md-12">
	<?php
		//Control.default.php
		detalharOrcamento();
	?>
    </div>
    <br>
</body>
</html>