<?php 
//Laio Pinheiro
	class Produto extends Conexao{
		private $cod;
		private $nome;
		private $medida;
		private $valor;
		private $sqlIns;
		private $sqlUpd;
		private $sqlDel;
		private $sqlSel;

		// CONTRUTOR ==============================================================================================
		public function Produto(){
			$this->connect();
		}

		// INSERIR ================================================================================================
		public function inserir(){
			$this->sqlIns = "INSERT INTO produto (prod_nome, prod_medida, prod_valor)
								VALUES('".$this->nome."', '".$this->medida."', '".$this->valor."');";
			if(mysqli_query($this->db_instance(),$this->sqlIns)){
				echo("<script>alert('Salvo com sucesso');</script>");
			}else{
				echo("<span>Erro na inserção! Erro: ".mysqli_error()."</span>");
			}
		}

		// EDITAR ================================================================================================
		public function editar(){
			if($this->cod != "" and $this->cod != NULL){
				$this->sqlUpd = "UPDATE produto SET prod_nome = '".$this->nome."',
													 prod_medida = '".$this->medida."',
													 prod_valor = '".$this->valor."'
												 WHERE prod_cod = ".$this->cod.";";
			}else{
				echo("<span>Erro no ID</span>");
				return FALSE;
			}
			
			if (mysqli_query($this->db_instance(),$this->sqlUpd)){
				echo("<script>alert('Editado com sucesso');</script>");
			}else{
				echo("<span>erro na edição! Erro: ".mysql_error()."</span>");
			}
		}

		// EXCLUIR ==================================================================================================
		public function excluir(){
			if($this->cod != "" and $this->cod != NULL){
				$this->sqlDel = "DELETE FROM produto WHERE prod_cod = ".$this->cod.";";
			}else{
				echo("<span>Erro no ID!</span>");
				return FALSE;			
			}
			
			if (mysqli_query($this->db_instance(),$this->sqlDel)){
				echo("<script>alert('Excluido com sucesso');</script>");
			}else{
				echo("<span>Erro na exclusao! ERROR: ".mysqli_error()."</span>");
			}
		}

		// BUSCAR ==================================================================================================
		public function buscar(){
			if($this->cod != "" and $this->cod != NULL){
				$this->sqlSel = mysqli_query($this->db_instance(),"SELECT prod_nome, prod_medida, prod_valor
								 FROM produto WHERE prod_cod = ".$this->cod.";");
			}else{
				echo("<span>Erro no ID!</span>");
				return FALSE;			
			}
			
			if ($resultList = mysqli_fetch_array($this->sqlSel)){
				$this->nome = $resultList["prod_nome"];
				$this->medida = $resultList["prod_medida"];
				$this->valor = $resultList["prod_valor"];
			}
		}

		// BUSCAR TODOS ===========================================================================================
		// usado para tabela e dropdown list!
		// *nao queria colocar isso na classe, mas precisa terminar no final de semana.. =\
		public function buscarTodos($tipo){
			$this->sqlSel = mysqli_query($this->db_instance(),"SELECT prod_cod, prod_nome, prod_medida, prod_valor
								 FROM produto ORDER BY prod_nome;");
			$cont = 0;			
			while($resultList = mysqli_fetch_array($this->sqlSel)){
	            $this->cod = $resultList["prod_cod"];
	            $this->nome = $resultList["prod_nome"];
	            $this->medida = $resultList["prod_medida"];
	            $this->valor = $resultList["prod_valor"];
	            $cont += 1;
	            if($tipo == "tabela"){
	            	//*isso era pra estar no arquivo de controle
		            //editarProduto() em util.bind.js
		            print "<tr><td><input type=\"text\" class=\"form-control input-sm tdPequeno\" value=\"".$this->cod."\" disabled></td>
		            <td><input type=\"text\" class=\"form-control input-sm\" value=\"".$this->nome."\" id=\"nome".$cont."\" maxlength=\"200\"></td>
		            <td><input type=\"text\" class=\"form-control input-sm moeda\" value=".$this->valor." id=\"valor".$cont."\"  maxlength=\"13\"></td>
		            <td><input type=\"text\" class=\"form-control input-sm\" value=\"".$this->medida."\" id=\"medida".$cont."\" maxlength=\"45\"></td>
		            <td><a class=\"btn btn-danger tdPequeno\" href=\"cadastro.produto.php?acao=excluir&cod=".$this->cod."\"><span class=\"glyphicon glyphicon-trash\"></span></a></td>
		            <td><a class=\"btn btn-primary tdPequeno\" href=\"#\" onclick=\"editarProduto(".$cont.", ".$this->cod.");\"><span class=\"glyphicon glyphicon-floppy-open\"></span></a></td>
		            </tr>";
	        	}else if($tipo == "dropdown"){
	        		print "<option value=\"".$this->cod."\">".$this->nome."</option>";
	        	}
			}
		}

		// SET ====================================================================================================
		public function setCod($cod){
			$this->cod = $cod;
		}
		public function setNome($nome){
			$this->nome = $nome;
		}
		public function setMedida($medida){
			$this->medida = $medida;
		}
		public function setValor($valor){
			$this->valor = $valor;
		}
		// GET ====================================================================================================
		public function getCod(){
			return $this->cod;
		}
		public function getNome(){
			return $this->nome;
		}
		public function getMedida(){
			return $this->medida;
		}
		public function getValor(){
			return $this->valor;
		}
		// ======================================================================================================

	}
?>