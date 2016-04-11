<?php 
//Laio Pinheiro
	class Cliente extends Conexao{
		private $cod;
		private $nome;
		private $endereco;
		private $bairro;
		private $cep;
		private $fone;
		private $email;
		private $sqlIns;
		private $sqlUpd;
		private $sqlDel;
		private $sqlSel;

		// CONTRUTOR ==============================================================================================
		public function Cliente(){
			$this->connect();
		}

		// INSERIR ================================================================================================
		public function inserir(){

			$this->sqlIns = "INSERT INTO cliente (clie_nome, clie_endereco, clie_bairro, clie_cep,
													clie_fone, clie_email)
								VALUES('".$this->nome."', '".$this->endereco."', '".$this->bairro."', '".$this->cep."'
									   ,'".$this->fone."', '".$this->email."');";
			if(mysqli_query($this->db_instance(), $this->sqlIns)){
				echo("<script>alert('Salvo com sucesso');</script>");
			}else{
				echo("<span>Erro na inserção! Erro: ".mysqli_error()."</span>");
			}
		}

		// EDITAR ================================================================================================
		public function editar(){
			if($this->cod != "" and $this->cod != NULL){
				$this->sqlUpd = "UPDATE cliente SET clie_nome = '".$this->nome."',
													 clie_endereco = '".$this->endereco."',
													 clie_bairro = '".$this->bairro."',
													 clie_cep = '".$this->cep."',
													 clie_fone = '".$this->fone."',
													 clie_email = '".$this->email."'
												 WHERE clie_cod = ".$this->cod.";";
			}else{
				echo("<span>Erro no ID</span>");
				return FALSE;
			}
			
			if (mysqli_query($this->db_instance(),$this->sqlUpd)){
				echo("<script>alert('Editado com sucesso');</script>");
			}else{
				echo("<span>erro na edição! Erro: ".mysqli_error()."</span>");
			}
		}

		// EXCLUIR ==================================================================================================
		public function excluir(){
			if($this->cod != "" and $this->cod != NULL){
				$this->sqlDel = "DELETE FROM cliente WHERE clie_cod = ".$this->cod.";";
			}else{
				echo("<span>Erro no ID!</span>");
				return FALSE;			
			}
			
			if (mysqli_query($this->db_instance(), $this->sqlDel)){
				echo("<script>alert('Excluido com sucesso');</script>");
			}else{
				echo("<span>Erro na exclusao! ERROR: ".mysqli_error()."</span>");
			}
		}

		// BUSCAR ==================================================================================================
		public function buscar(){
			if($this->cod != "" and $this->cod != NULL){
				$this->sqlSel = mysqli_query($this->db_instance(),"SELECT clie_nome, clie_endereco, clie_bairro,
										clie_cep, clie_fone, clie_email
								 FROM cliente WHERE clie_cod = ".$this->cod.";");
			}else{
				echo("<span>Erro no ID!</span>");
				return FALSE;			
			}
			
			if ($resultList = mysqli_fetch_array($this->sqlSel)){
				$this->nome = $resultList["clie_nome"];
				$this->endereco = $resultList["clie_endereco"];
				$this->bairro = $resultList["clie_bairro"];
				$this->cep = $resultList["clie_cep"];
				$this->fone = $resultList["clie_fone"];
				$this->email = $resultList["clie_email"];
			}
		}
		
		// BUSCAR TODOS ===========================================================================================
		// usado para tabela e dropdown list!
		// nao queria colocar isso na classe, mas precisa terminar no final de semana.. =\
		public function buscarTodos($tipo){
			$this->sqlSel = mysqli_query($this->db_instance(),"SELECT clie_cod ,clie_nome, clie_endereco, clie_bairro,
									clie_cep, clie_fone, clie_email
							 FROM cliente ORDER BY clie_nome;");
			$cont = 0;			
			while($resultList = mysqli_fetch_array($this->sqlSel)){
	            $this->cod = $resultList["clie_cod"];
	            $this->nome = $resultList["clie_nome"];
	            $this->endereco = $resultList["clie_endereco"];
	            $this->bairro = $resultList["clie_bairro"];
	            $this->cep = $resultList["clie_cep"];
	            $this->fone = $resultList["clie_fone"];
	            $this->email = $resultList["clie_email"];
	            $cont += 1;
	            if($tipo == "tabela"){
	            	//isso era pra estar no arquivo de controle
		            //editarCliente em util.bind.js
		            print "<tr><td><input type=\"text\" class=\"form-control input-sm tdPequeno\" value=\"".$this->cod."\" disabled></td>
		            <td><input type=\"text\" class=\"form-control input-sm\" value=\"".$this->nome."\" id=\"nome".$cont."\" maxlength=\"200\"></td>
		            <td><input type=\"text\" class=\"form-control input-sm\" value=\"".$this->endereco."\" id=\"endereco".$cont."\" maxlength=\"200\"></td>
		            <td><input type=\"text\" class=\"form-control input-sm\" value=".$this->bairro." id=\"bairro".$cont."\" maxlength=\"100\"></td>
		            <td><input type=\"text\" class=\"form-control input-sm\" value=".$this->cep." id=\"cep".$cont."\" maxlength=\"9\"></td>
		            <td><input type=\"text\" class=\"form-control input-sm\" value=".$this->fone." id=\"telefone".$cont."\" maxlength=\"13\"></td>
		            <td><input type=\"text\" class=\"form-control input-sm\" value=".$this->email." id=\"email".$cont."\" maxlength=\"255\"></td>
		            <td><a class=\"btn btn-danger tdPequeno\" href=\"cadastro.cliente.php?acao=excluir&cod=".$this->cod."\"><span class=\"glyphicon glyphicon-trash\"></span></a></td>
		            <td><a class=\"btn btn-primary tdPequeno\" href=\"#\" onclick=\"editarCliente(".$cont.", ".$this->cod.");\"><span class=\"glyphicon glyphicon-floppy-open\"></span></a></td>
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
		public function setEndereco($endereco){
			$this->endereco = $endereco;
		}
		public function setBairro($bairro){
			$this->bairro = $bairro;
		}
		public function setCep($cep){
			$this->cep = $cep;
		}
		public function setFone($fone){
			$this->fone = $fone;
		}
		public function setEmail($email){
			$this->email = $email;
		}
		// GET ====================================================================================================
		public function getNome(){
			return $this->nome;
		}
		public function getEndereco(){
			return $this->endereco;
		}
		public function getBairro(){
			return $this->bairro;
		}
		public function getCep(){
			return $this->cep;
		}
		public function getFone(){
			return $this->fone;
		}
		public function getEmail(){
			return $this->email;
		}
		// ======================================================================================================

	}
?>