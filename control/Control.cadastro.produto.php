<?php 

    $con = new Conexao("cdzestagiodb");
    $con->connect();

    //ACOES ================================================================================================================
    if(isset($_GET['acao'])){
        $acao = $_GET['acao'];

        switch($acao) {
            case "inserir":{//INSERIR
                if($_POST['nome'] != "" and $_POST['medida'] != "" and $_POST['valor'] != ""){
                    $produtoIns = new Produto();
                    $produtoIns->setNome($_POST['nome']);
                    $produtoIns->setMedida($_POST['medida']);
                    $produtoIns->setValor($_POST['valor']);
                    $produtoIns->inserir();
                }else{
                    echo("<script>alert('Preencha corretamente os campos!');</script>");
                }
            } break;

            case "excluir":{//EXCLUIR
                $produtoDel = new Produto();
                $produtoDel->setCod($_GET['cod']);
                $produtoDel->excluir();
            } break;

            case "editar":{//EDITAR
                if($_GET['nome'] != "" and $_GET['medida'] != "" and $_GET['valor'] != ""){ 
                    $produtoEdt = new Produto();
                    $produtoEdt->setCod($_GET['cod']);
                    $produtoEdt->setNome($_GET['nome']);
                    $produtoEdt->setMedida($_GET['medida']);
                    $produtoEdt->setValor($_GET['valor']);
                    $produtoEdt->editar();
                }else{
                    echo("<script>alert('Preencha corretamente os campos!');</script>");
                }
            } break;
        }
    }

    //LISTAR PRODUTOS ======================================================================================================
    // nao consegui percorrer o array de resultado aqui
    // tive que montar o html na classe para nao perder muito tempo
    function listarProdutos(){
        $produtoLi = new Produto();
        $produtoLi->buscarTodos("tabela");
    }
    
?>
