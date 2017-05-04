<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
	include('database.php');
	/**
	* 
	*/
	class Pessoa
	{
		private $Nome;
		private $Telefone;
		private $Endereco;
		private $Salario;
		private $Login;
		private $Senha;


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

		public function getNome(){
			return $this->Nome;
		}
		public function setNome($Nome){
			$this->Nome = $Nome;
		}

		public function getTelefone(){
			return $this->Telefone;
		}
		public function setTelefone($Telefone){
			$this->Telefone = $Telefone;
		}

		public function getEndereco(){
			return $this->Endereco;
		}
		public function setEndereco($Endereco){
			$this->Endereco = $Endereco;
		}

		public function getSalario(){
			return $this->Salario;
		}
		public function setSalario($Salario){
			$this->Salario = $Salario;
		}

		public function getLogin(){
			return $this->Login;
		}
		public function setLogin($Login){
			$this->Login = $Login;
		}

		public function getSenha(){
			return $this->Senha;
		}
		public function setSenha($Senha){
			$this->Senha = $Senha;
		}

		public function getRG(){
			return $this->RG;
		}
		public function setRG($RG){
			$this->RG = $RG;
		}

		public function getAdm(){
			return $this->Adm;
		}
		public function setAdm($Adm){
			$this->Adm = $Adm;
		}

		public function getCpf(){
			return $this->Cpf;
		}
		public function setCpf($Cpf){
			$this->Cpf = $Cpf;
		}


		// VERIFICA SE HÁ ALGUÉM COM MESMO LOGIN OU CPF NO BANCO
		public function verificaPessoa(){

			$db = new Database();
			$db->linkstart();

	        $query = "SELECT * FROM pessoa WHERE cd_login = ? OR cd_cpf = ?";

	        $stmt = $db->prepare($query);
	        $stmt->bind_param("si", $Login, $Cpf);
	        $stmt->execute();
	        // VERIFICANDO SE USUÁRIO JÁ ESTÁ CADASTRADO
	        $stmt->store_result();
	        $numrows = $stmt->num_rows;
        	if($numrows >= 1){
            	echo "Usuário já cadastrado";
        	return true; // USUARIO EXISTE
			}
		}

		// INSERE TODAS AS COLUNAS DA TABELA PESSOA
		public function insert($Nome, $Telefone, $Endereco, $Salario, $Login, $Senha, $RG, $Cpf, $Adm){

			$db = new Database();
			$db->linkstart();

			if($this->verificaPessoa() != true){
            	$query = "INSERT INTO pessoa (nm_nome, cd_telefone, ds_endereco, vl_salario, cd_login, cd_senha, cd_rg, cd_cpf, cd_adm) VALUES (?,?,?,?,?,?,?,?,?)";

            	$stmt = $db->prepare($query);
            	$stmt->bind_param("sisdssiii", $Nome, $Telefone, $Endereco, $Salario, $Login, $Senha, $RG, $Cpf, $Adm);
            	
            	if ($stmt->execute()){
            	$this->Nome->setNome($Nome);
				$this->Telefone->setTelefone($Telefone);
				$this->Endereco->setEndereco($Endereco);
				$this->Salario->setSalario($Salario);
				$this->Login->setLogin($Login);
				$this->Senha->setSenha($Senha);
				$this->RG->setRG($RG);
				$this->Adm->setAdm($Adm);
				$this->Cpf->setCpf($Cpf);

				echo '<script>window.location="painel_list_user.php";</script>';
				$stmt->close();
				return true; // Execução com sucesso
				}

			$stmt->error;
        	$stmt->errno;
        	$stmt->close();
        	return false; // Erro na execução
			}
		}

		// CONSULTA E EXIBE TODAS AS LINHAS DA TABELA PESSOA
		public function select(){

		$db = new Database();
		$db->linkstart();

		$query = "SELECT cd_pessoa, nm_nome, cd_telefone, ds_endereco, vl_salario, cd_rg, cd_cpf, cd_adm FROM pessoa";

		$stmt = $db->prepare($query);

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
			return true; // Execução com sucesso
			}
		$stmt->error;
        $stmt->errno;
		$stmt->close();
		return false; // Erro na execução
		}

		// ALTERA DADOS DA LINHA SELECIONADA
		public function update($Nome, $Telefone, $Endereco, $Salario, $Login, $Senha, $RG, $Cpf, $Adm, $Id){

		$db = new Database();
		$db->linkstart();

		$query = "UPDATE Pessoa SET nm_nome = ?, cd_telefone = ?, ds_endereco = ?, vl_salario = ?, cd_login = ?, cd_senha = ?, cd_rg = ?, cd_cpf = ?, cd_adm = ? WHERE cd_pessoa = ?";

	    $stmt = $db->prepare($query);

	    $stmt->bind_param("sisdssiiii", $Nome, $Telefone, $Endereco, $Salario, $Login, $Senha, $RG, $Cpf, $Adm, $Id);

			if($stmt->execute()) {
				$stmt->close();
				echo '<script>window.location="painel_list_user.php";</script>';
			return true; // Execução com sucesso
			}

		$stmt->error;
	    $stmt->errno;
		$stmt->close();
		return false; // Erro na execução
		}

		public function delete($Id){

		$db = new Database();
		$db->linkstart();

			$query = "DELETE FROM pessoa WHERE cd_pessoa = ?";
		    $stmt = $conn->prepare($query);
		    $stmt->bind_param("i", $Id);

			if($stmt->execute()) {
				$stmt->close();
				echo '<script>window.location="painel_list_user.php";</script>';
			return true; // Execução com sucesso
			}
			
		$stmt->error;
	    $stmt->errno;
		$stmt->close();
		return false; // Erro na execução
		}

	}
?>