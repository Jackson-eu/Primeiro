<?php 

    $con = new Conexao("cdzestagiodb");
    $con->connect();

    //ACOES ==================================================================================================================
    if(isset($_GET['acao'])){
        if($_GET['acao'] == "inserir") {//INSERIR
            if($_POST['cliente'] != "" and $_POST['data'] != "" and $_POST['produto1'] != "" and $_POST['data-retorno'] != "" and $_POST['data-validade'] != ""){
                //converter a data para o padrao SQL
                $data = toMysqlDate($_POST['data']);
                $dataRetorno = toMysqlDate($_POST['data-retorno']);
                $dataValidade = toMysqlDate($_POST['data-validade']);

                $orcamentoIns = new Orcamento();
                $orcamentoIns->setData($data);
                $orcamentoIns->setDataRetorno($dataRetorno);
                $orcamentoIns->setDataValidade($dataValidade);
                $orcamentoIns->setClieCod($_POST['cliente']);
                $orcamentoIns->setProdCod1($_POST['produto1']);
                $orcamentoIns->setProdCod2($_POST['produto2']);
                $orcamentoIns->setProdCod3($_POST['produto3']);
                $orcamentoIns->setCondicoes($_POST['condicoes']);
                $orcamentoIns->setObjecoes($_POST['objecoes']);
                $orcamentoIns->inserir();
            }else{
                echo("<script>alert('Preencha corretamente os campos!');</script>");
            }
        }
    }

    //DROPDOWN DE PRODUTOS ======================================================================================================
    // nao consegui percorrer o array de resultado aqui
    // tive que montar o html na classe para nao perder muito tempo
    function listarProdutos(){
        $produtoLi = new Produto();
        $produtoLi->buscarTodos('dropdown');
    }
    //DROPDOWN DE CLIENTES ======================================================================================================
    function listarClientes(){
        $clienteLi = new Cliente();
        $clienteLi->buscarTodos('dropdown');
    }
    //Coloca a data vinda do datepicker no padrao SQL =================================================
    function toMysqlDate($dt){
        $mes = substr($dt,0,2);
        $dia = substr($dt,3,2);
        $ano = substr($dt,6,4);
        $data = $ano."-".$mes."-".$dia;
        return $data;
    }
    
?>
