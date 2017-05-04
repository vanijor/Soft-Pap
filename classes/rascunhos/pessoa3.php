<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
	require_once('database.php');
	/**
	* 
	*/
	class Pessoa extends database
	{
		private $Nome;
		private $Telefone;
		private $Endereco;
		private $Salario;
		private $Login;
		private $Senha;
		public $link = null;

		function __construct($Nome='', $Telefone='',$Endereco='', $Salario='', $Login='', $Senha='', $RG='', $Adm='',$Cpf='')
		{
			$this->Nome = $Nome;
			$this->Telefone = $Telefone;
			$this->Endereco = $Endereco;
			$this->Salario = $Salario;
			$this->Login = $Login;
			$this->Senha = $Senha;
			$this->RG = $RG;
			$this->Adm = $Adm;
			$this->Cpf = $Cpf;

		}

		public function __get($atributo)
		{
		   return $this->$atributo;
		}

		public function __set($atributo, $valor)
		{
		   $this->$atributo = $valor;
		}


		// VERIFICA SE HÁ ALGUÉM COM MESMO LOGIN OU CPF NO BANCO
		public function verificaPessoa(){

		$db = new Database();
        $this->link = $db->linkstart();

	        $query = "SELECT * FROM pessoa WHERE cd_login = ? OR cd_cpf = ?";

	        $stmt = $db->classlink()->prepare($query);
	        $stmt->bind_param("si", $Login, $Cpf);
	        $stmt->execute();
	        // VERIFICANDO SE USUÁRIO JÁ ESTÁ CADASTRADO
	        $stmt->store_result();
	        $numrows = $stmt->num_rows;
        	if($numrows >= 1){
            	echo "Usuário já cadastrado";
        	return true; // USUARIO EXISTE
			}
		return false;
		}

		// INSERE TODAS AS COLUNAS DA TABELA PESSOA
		public function insert($Nome, $Telefone, $Endereco, $Salario, $Login, $Senha, $RG, $Cpf, $Adm){

		$db = new Database();
        $this->link = $db->linkstart();

			if($this->verificaPessoa() != true){
            	$query = "INSERT INTO pessoa (nm_nome, cd_telefone, ds_endereco, vl_salario, cd_login, cd_senha, cd_rg, cd_cpf, cd_adm) VALUES (?,?,?,?,?,?,?,?,?)";

            	$stmt = $db->prepare($query);
            	$stmt->bind_param("sisdssiii", $Nome, $Telefone, $Endereco, $Salario, $Login, $Senha, $RG, $Cpf, $Adm);
            	
            	if ($stmt->execute()){
            	$this->Nome = $Nome;
				$this->Telefone = $Telefone;
				$this->Endereco = $Endereco;
				$this->Salario = $Salario;
				$this->Login = $Login;
				$this->Senha = $Senha;
				$this->RG = $RG;
				$this->Adm = $Adm;
				$this->Cpf = $Cpf;

				echo '<script>window.location="painel_list_user.php";</script>';
				$stmt->close();
				$db->disconnect();
				return true; // Execução com sucesso
				}

			$stmt->error;
        	$stmt->errno;
        	$stmt->close();
        	$db->disconnect();
        	return false; // Erro na execução
			}
		}

		// CONSULTA E EXIBE TODAS AS LINHAS DA TABELA PESSOA
		public function select(){

		$db = new Database();
        $this->link = $db->linkstart();


		$query = "SELECT cd_pessoa, nm_nome, cd_telefone, ds_endereco, vl_salario, cd_rg, cd_cpf, cd_adm FROM pessoa";

		$stmt = $db->classlink()->prepare($query);

			if($stmt->execute()) {
			$stmt->bind_result($cd_pessoa, $nm_nome, $cd_telefone, $ds_endereco, $vl_salario, $cd_rg, $cd_cpf, $cd_adm);

				// EXIBE PESSOA
				while($stmt->fetch()) {
				    printf("<tr>");
					printf("<td>" .
					$cd_pessoa
					. "</td><td>" . 
					$nm_nome
					. "</td><td>" . 
					$cd_telefone
					. "</td><td>" . 
					$ds_endereco
					. "</td><td>" . 
					$vl_salario
					. "</td><td>" . 
					$cd_rg
					. "</td><td>" .
					$cd_cpf
					. "</td><td>" .
					$cd_adm
					. "</td><td>" .
					"<button> APAGAR </button>"
					. " | " .
					"<button> ALTERAR </button>"
					);
					printf("<tr>");
				}
			$stmt->close();
			$db->disconnect();
			return true; // Execução com sucesso
			}
		$stmt->error;
        $stmt->errno;
		$stmt->close();
		$db->disconnect();
		return false; // Erro na execução
		}

		// ALTERA DADOS DA LINHA SELECIONADA
		public function update($Nome, $Telefone, $Endereco, $Salario, $Login, $Senha, $RG, $Cpf, $Adm, $Id){

		$db = new Database();
        $this->link = $db->linkstart();

		$query = "UPDATE Pessoa SET nm_nome = ?, cd_telefone = ?, ds_endereco = ?, vl_salario = ?, cd_login = ?, cd_senha = ?, cd_rg = ?, cd_cpf = ?, cd_adm = ? WHERE cd_pessoa = ?";

	    $stmt = $db->prepare($query);

	    $stmt->bind_param("sisdssiiii", $Nome, $Telefone, $Endereco, $Salario, $Login, $Senha, $RG, $Cpf, $Adm, $Id);

			if($stmt->execute()) {
				$stmt->close();
				$db->disconnect();
				echo '<script>window.location="painel_list_user.php";</script>';
			return true; // Execução com sucesso
			}

		$stmt->error;
	    $stmt->errno;
		$stmt->close();
		$db->disconnect();
		return false; // Erro na execução
		}

		public function delete($Id){
			
		$db = new Database();
        $this->link = $db->linkstart();

			$query = "DELETE FROM pessoa WHERE cd_pessoa = ?";
		    $stmt = $conn->prepare($query);
		    $stmt->bind_param("i", $Id);

			if($stmt->execute()) {
				$stmt->close();
				$db->disconnect();
				echo '<script>window.location="painel_list_user.php";</script>';
			return true; // Execução com sucesso
			}
			
		$stmt->error;
	    $stmt->errno;
		$stmt->close();
		$db->disconnect();
		return false; // Erro na execução
		}

	}
?>