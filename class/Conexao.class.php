<?php 
/*
developed by: Laio Pinheiro
laiopinheiro01@gmail.com 
*/
class Conexao{
	
	private $db_host = "localhost"; 
	private $db_user = "root"; 
	private $db_pass = ""; 
	private $db_name = "cdzestagiodb";

	private $con = false;

	public $instance;

	public function Conexao($db_name){
		$this->db_name = $db_name;
	}

	// Abre a coneccao e seleciona a base de dados =======================================================
	public function connect(){
		if(!$this->con){

			$myconn = @mysqli_connect($this->db_host, $this->db_user, $this->db_pass);

			if($myconn){
				$seldb = @mysqli_select_db($myconn,$this->db_name);

				if($seldb){
					$this->instance = $myconn;
					$this->con = true;
					return true;
				}else{
					return false;
				}
			}else{
				return false;
			}
		}else{
			return false;
		}
	}

	public function db_instance(){
		return $this->instance;
	}

	//Encerra a coneccao ======================================================================================
	public function disconnect(){
		if($this->con){
			if(@mysqli_close()){
				$this->con = false;
				return true;
			}else{
				return false;
			}
		}		
	}

}

?>