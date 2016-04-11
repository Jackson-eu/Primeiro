<?php 
    $con = new Conexao("cdzestagiodb");
    $con->connect();

    //ACOES ==================================================================================================================
    if(isset($_GET['acao'])){
        $acao = $_GET['acao'];

        switch($acao) {
            case "inserir":{//INSERIR
                if($_POST['nome'] != "" and $_POST['endereco'] != "" and $_POST['bairro'] != "" and $_POST['cep']  != "" and $_POST['telefone'] != "" and $_POST['email'] != ""){
                    $clienteIns = new Cliente();
                    $clienteIns->setNome($_POST['nome']);
                    $clienteIns->setEndereco($_POST['endereco']);
                    $clienteIns->setBairro($_POST['bairro']);
                    $clienteIns->setCep($_POST['cep']);
                    $clienteIns->setFone($_POST['telefone']);
                    $clienteIns->setEmail($_POST['email']);
                    $clienteIns->inserir();
                }else{
                    echo("<script>alert('Preencha corretamente os campos!');</script>");
                }
            } break;

            case "excluir":{//EXCLUIR
                $clienteDel = new Cliente();
                $clienteDel->setCod($_GET['cod']);
                $clienteDel->excluir();
            } break;

            case "editar":{//EDITAR
                if($_GET['nome'] != "" and $_GET['endereco'] != "" and $_GET['bairro'] != "" and $_GET['cep']  != "" and $_GET['telefone'] != "" and $_GET['email'] != ""){ 
                    $clienteEdt = new Cliente();
                    $clienteEdt->setCod($_GET['cod']);
                    $clienteEdt->setNome($_GET['nome']);
                    $clienteEdt->setEndereco($_GET['endereco']);
                    $clienteEdt->setBairro($_GET['bairro']);
                    $clienteEdt->setCep($_GET['cep']);
                    $clienteEdt->setFone($_GET['telefone']);
                    $clienteEdt->setEmail($_GET['email']);
                    $clienteEdt->editar();
                }else{
                    echo("<script>alert('Preencha corretamente os campos!');</script>");
                }
            } break;
        }
    }

    //LISTAR CLIENTES ======================================================================================================
    // nao consegui percorrer o array de resultado aqui
    // tive que montar o html na classe para nao perder muito tempo
    function listarClientes(){
        $clienteLi = new Cliente();
        $clienteLi->buscarTodos("tabela");
    }
    
?>
