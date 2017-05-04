<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

	/**
	* 
	*/
	class Database
	{
	// VARIAVEIS DE ESTABELECIMENTO DE CONEXAO 
	private $db_host = "localhost";
	private $db_user = "root";
	private $db_pass = "";
	private $db_name = "u573658764_papel";

	// VARIAVEIS DE VERIFICAÇAO DE CONEXAO
	private $conn = false;     // Checa se conexão está ativa ou não
	public $db_conn = ""; 	   // Objeto de conexão
	private $result = array(); // Array que guarda resultados das query
	private $myQuery;		   // Query usada para depurar o retorno

	private $stmtError;		   // Erro no Statement
	private $stmtErrno;		   // Erro no Statement

	// CONEXAO DB
	public function linkstart(){

		if($this->conn = false){ 
		$this->db_conn = new mysqli(
			$this->db_host, 
			$this->db_user,
			$this->db_pass, 
			$this->db_name);

			if($this->db_conn->connect_errno != 0){
				printf($this->db_conn->connect_error);
				printf($this->result);
				return false; // Problema para conectar encontrado
			} else {
				$this->conn = true;
				return true; // Conexão estabelecida
			}
		} else {
			return true; // Conexão estabelecida
			}
		}


	public function disconnect(){
		// Procura se há conexão existente
		if($this->conn){
			// Conexão encontrada
			if($this->db_conn->close()){
				// Conexão fechada
				$this->conn = false;
				return true;
			} else {
		 		// Erro ao finalizar conexão
		 		return false;
				}
			}	
		}	

	public function classLink() { 
    	return $this->db_conn;
		}


	}
?>


