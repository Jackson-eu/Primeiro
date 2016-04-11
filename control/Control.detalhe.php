<?php 
//Laio Pinheiro
    $con = new Conexao("cdzestagiodb");
    $con->connect();

	function detalharOrcamento(){
        //Instância dos objetos =====================================================================
        $orcamento = new Orcamento();
        $produto1 = new Produto();
        $produto2 = new Produto();
        $produto3 = new Produto();
        $cliente = new Cliente();
        //Preenche objetos ==========================================================================  
        $orcamento->setCod($_GET['cod']);
        $orcamento->buscar();
        
        $cliente->setCod($orcamento->getClieCod());
        $cliente->buscar();

        $codigoProd1 = $orcamento->getProdCod1();
        if(isset($codigoProd1)){
            $produto1->setCod($codigoProd1);
            $produto1->buscar();
        }

        $codigoProd2 = $orcamento->getProdCod2();
        if(isset($codigoProd2)){
            $produto2->setCod($codigoProd2);
            $produto2->buscar();
        }

        $codigoProd3 = $orcamento->getProdCod3();
        if(isset($codigoProd3)){
            $produto3->setCod($codigoProd3);
            $produto3->buscar();
        }
        
        //MOnta HTML dinamico ==========================================================================
        print  "<div class=\"row\">
                    <div class=\"col-md-4\"><span><b>Cliente:</b> ".$cliente->getNome()."</span></div>
                    <div class=\"col-md-4\"><span><b>Data:</b> ".$orcamento->getData()."</span></div>
                    <div class=\"col-md-4\"></span></div>         
                </div>
                <div class=\"row\">
                    <div class=\"col-md-4\"><span><b>Retorno:</b> ".$orcamento->getDataRetorno()."</span></div>
                    <div class=\"col-md-4\"><span><b>Validade:</b> ".$orcamento->getDataValidade()."</span></div>
                    <div class=\"col-md-4\"></span></div>         
                </div>
                <h3>Produtos Cotados</h3>
                <table class=\"table\">
                    <tr><td><b>Nome</b></td><td><b>Valor</b></td><td><b>Medida</b></td></tr>
                    <tr><td>".$produto1->getNome()."</td><td>".$produto1->getValor()."</td><td>".$produto1->getMedida()."</td></tr>
                    <tr><td>".$produto2->getNome()."</td><td>".$produto2->getValor()."</td><td>".$produto2->getMedida()."</td></tr>
                    <tr><td>".$produto3->getNome()."</td><td>".$produto3->getValor()."</td><td>".$produto3->getMedida()."</td></tr>
                </table>
                <div class=\"row\">
                    <div class=\"col-md-4\"><span><b>Condições:</b> ".$orcamento->getCondicoes()."</span></div>
                    <div class=\"col-md-4\"><span><b>Objeções:</b> ".$orcamento->getObjecoes()."</span></div>
                    <div class=\"col-md-4\"></div>
                </div>
                ";
    }
?>