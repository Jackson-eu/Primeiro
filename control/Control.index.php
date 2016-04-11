<?php 
//Laio Pinheiro
    $con = new Conexao("cdzestagiodb");
    $con->connect();
    //EXCLUIR ===============================================
	if(isset($_GET['acao'])){
        if($_GET['acao'] == "excluir"){
        	$orcamentoDel = new Orcamento();
            $orcamentoDel->setCod($_GET['cod']);
            $orcamentoDel->excluir();
        }
    }
    //LISTAR COM OU SEM PESQUISA ===================================
	function listarOrcamentos(){
        $orcamentoSel = new Orcamento();
        if(isset($_GET['texto'])){
            $orcamentoSel->buscarTodos($_GET['texto']);
        }else{
            $orcamentoSel->buscarTodos("");
        }
	}
?>