<?php 
//Laio Pinheiro
//tentando usar a conexão ne metodo mysqli_query
	class Orcamento extends Conexao{
		private $cod;
		private $data;
		private $dataRetorno;
		private $dataValidade;
		private $clieCod;
		private $prodCod1;
		private $prodCod2;
		private $prodCod3;
		private $condicoes;
		private $objecoes;
		private $clieNome;
		private $clieFone;
		private $sqlIns;
		private $sqlUpd;
		private $sqlDel;
		private $sqlSel;

		//tentando usar a conexão ne metodo mysqli_query



		// CONTRUTOR ==============================================================================================
		public function Orcamento(){
			$this->connect();
		}

		// INSERIR ================================================================================================
		public function inserir(){
			if ($this->prodCod2>0 and $this->prodCod3>0){
				$this->sqlIns = "INSERT INTO orcamento (orca_data, orca_data_retorno, orca_data_validade, orca_clie_cod,
													orca_prod_cod_1, orca_prod_cod_2, orca_prod_cod_3, orca_condicoes, orca_objecoes)
								VALUES('".$this->data."', '".$this->dataRetorno."', '".$this->dataValidade."', ".$this->clieCod."
									   ,".$this->prodCod1.", ".$this->prodCod2.", ".$this->prodCod3.", '".$this->condicoes."', '".$this->objecoes."');";
			}else if ($this->prodCod2>0){
				$this->sqlIns = "INSERT INTO orcamento (orca_data, orca_data_retorno, orca_data_validade, orca_clie_cod,
													orca_prod_cod_1, orca_prod_cod_2, orca_condicoes, orca_objecoes)
								VALUES('".$this->data."', '".$this->dataRetorno."', '".$this->dataValidade."', ".$this->clieCod."
									   ,".$this->prodCod1.", ".$this->prodCod2.", '".$this->condicoes."', '".$this->objecoes."');";
			}else if($this->prodCod3>0){
				$this->sqlIns = "INSERT INTO orcamento (orca_data, orca_data_retorno, orca_data_validade, orca_clie_cod,
													orca_prod_cod_1, orca_prod_cod_3, orca_condicoes, orca_objecoes)
								VALUES('".$this->data."', '".$this->dataRetorno."', '".$this->dataValidade."', ".$this->clieCod."
									   ,".$this->prodCod1.", ".$this->prodCod3.", '".$this->condicoes."', '".$this->objecoes."');";
			}else{
				$this->sqlIns = "INSERT INTO orcamento (orca_data, orca_data_retorno, orca_data_validade, orca_clie_cod,
													orca_prod_cod_1, orca_condicoes, orca_objecoes)
								VALUES('".$this->data."', '".$this->dataRetorno."', '".$this->dataValidade."', ".$this->clieCod."
									   ,".$this->prodCod1.", '".$this->condicoes."', '".$this->objecoes."');";
			}
			
			if(mysqli_query($this->db_instance(), $this->sqlIns)){
				echo("<script>alert('Salvo com sucesso');</script>");
			}else{
				echo("<span>Erro na inserção! Erro: ".mysqli_error()."</span>");
			}
		}

		// EDITAR ================================================================================================
		public function editar(){

			if($this->cod != "" and $this->cod != NULL){
				$this->sqlUpd = "UPDATE orcamento SET orca_data = '".$this->data."',
													 orca_data_retorno = '".$this->dataRetorno."',
													 orca_data_validade = '".$this->dataValidade."',
													 orca_clie_cod = ".$this->clieCod.",
													 orca_prod_cod_1 = ".$this->prodCod1.",
													 orca_prod_cod_2 = ".$this->prodCod2.",
													 orca_prod_cod_3 = ".$this->prodCod3.",
													 orca_condicoes = '".$this->condicoes."',
													 orca_objecoes = '".$this->objecoes."'
												 WHERE orca_cod = ".$this->cod.";";
			}else{
				echo("<script>alert('Erro no ID');</script>");
				return FALSE;
			}
			
			if (mysqli_query($this->sqlUpd)){
				echo("<script>alert('Editado com sucesso');</script>");
			}else{
				echo("<span>erro na edição! Erro: ".mysqli_error()."</span>");
			}
		}

		// EXCLUIR ==================================================================================================
		public function excluir(){
			if($this->cod != "" and $this->cod != NULL){
				$this->sqlDel = "DELETE FROM orcamento WHERE orca_cod = ".$this->cod.";";
			}else{
				echo("<script>alert('Erro no ID');</script>");
				return FALSE;			
			}
			
			if (mysqli_query($this->sqlDel)){
				echo("<script>alert('Excluido com sucesso');</script>");
			}else{
				echo("<span>Erro na exclusao! ERROR: ".mysqli_error()."</span>");
			}
		}

		// BUSCAR ==================================================================================================
		public function buscar(){
			if($this->cod != "" and $this->cod != NULL){
				$this->sqlSel = mysqli_query($this->db_instance(),"SELECT orca_data, orca_data_retorno, orca_data_validade,
										orca_clie_cod, orca_prod_cod_1, orca_prod_cod_2,
										orca_prod_cod_3, orca_condicoes, orca_objecoes
								 FROM orcamento WHERE orca_cod = ".$this->cod.";");
			}else{
				echo("<script>alert('Erro no ID');</script>");
				return FALSE;			
			}
			
			if ($resultList = mysqli_fetch_array($this->sqlSel)){
				$this->data = $resultList["orca_data"];
				$this->dataRetorno = $resultList["orca_data_retorno"];
				$this->dataValidade = $resultList["orca_data_validade"];
				$this->clieCod = $resultList["orca_clie_cod"];
				$this->prodCod1 = $resultList["orca_prod_cod_1"];
				$this->prodCod2 = $resultList["orca_prod_cod_2"];
				$this->prodCod3 = $resultList["orca_prod_cod_3"];
				$this->condicoes = $resultList["orca_condicoes"];
				$this->objecoes = $resultList["orca_objecoes"];
			}
		}

		// BUSCAR TODOS ===========================================================================================
		// Nao estava conseguindo percorrer o array do select em outro lugar, acabei trazendo para a classe
		public function buscarTodos($like){

			$where = "";

			if($like != ""){
				$where = " AND clie_nome LIKE \"%".$like."%\"";
			}

			$this->sqlSel = mysqli_query($this->db_instance(), "SELECT orca_cod, clie_nome, orca_data, clie_fone, orca_data_validade
								 FROM orcamento, cliente WHERE orca_clie_cod = clie_cod".$where." ORDER BY orca_data" );
			$cont = 0;		
			while($resultList = mysqli_fetch_array($this->sqlSel)){
				$this->cod = $resultList["orca_cod"];
	            $this->clieNome = $resultList["clie_nome"];
	            $this->data = $resultList["orca_data"];
	            $this->clieFone = $resultList["clie_fone"];
	            $this->dataValidade = $resultList["orca_data_validade"];
				$cont += 1;

	            //isso era pra estar no arquivo de controle
	            print "<tr><td><input type=\"text\" class=\"form-control input-sm\" value=\"".$this->clieNome."\" id=\"clieNome".$cont."\" disabled></td>
	            <td><input type=\"text\" class=\"form-control input-sm moeda\" value=".$this->data." id=\"data".$cont."\" disabled></td>
	            <td><input type=\"text\" class=\"form-control input-sm\" value=\"".$this->clieFone."\" id=\"clieFone".$cont."\" disabled></td>
	            <td><input type=\"text\" class=\"form-control input-sm\" value=\"".$this->dataValidade."\" id=\"dataValidade".$cont."\" disabled></td>
	            <td><a class=\"btn btn-primary tdPequeno\" href=\"detalhe.php?cod=".$this->cod."\"><span class=\"glyphicon glyphicon-file\"></span></a></td>
	            <td><a class=\"btn btn-danger tdPequeno\" href=\"index.php?acao=excluir&cod=".$this->cod."\"><span class=\"glyphicon glyphicon-trash\"></span></a></td>
	            </tr>";
	        }
		}

		// SET ====================================================================================================
		public function setCod($cod){
			$this->cod = $cod;
		}
		public function setData($data){
			$this->data = $data;
		}
		public function setDataRetorno($dataRetorno){
			$this->dataRetorno = $dataRetorno;
		}
		public function setDataValidade($dataValidade){
			$this->dataValidade = $dataValidade;
		}
		public function setClieCod($clieCod){
			$this->clieCod = $clieCod;
		}
		public function setProdCod1($prodCod){
			$this->prodCod1 = $prodCod;
		}
		public function setProdCod2($prodCod){
			$this->prodCod2 = $prodCod;
		}
		public function setProdCod3($prodCod){
			$this->prodCod3 = $prodCod;
		}
		public function setCondicoes($condicoes){
			$this->condicoes = $condicoes;
		}
		public function setObjecoes($objecoes){
			$this->objecoes = $objecoes;
		}
		// GET ====================================================================================================
		public function getCod(){
			return $this->cod;
		}
		public function getData(){
			return $this->data;
		}
		public function getDataRetorno(){
			return $this->dataRetorno;
		}
		public function getDataValidade(){
			return $this->dataValidade;
		}
		public function getClieCod(){
			return $this->clieCod;
		}
		public function getProdCod1(){
			return $this->prodCod1;
		}
		public function getProdCod2(){
			return $this->prodCod2;
		}
		public function getProdCod3(){
			return $this->prodCod3;
		}
		public function getCondicoes(){
			return $this->condicoes;
		}
		public function getObjecoes(){
			return $this->objecoes;
		}
		// ======================================================================================================

	}	

?>