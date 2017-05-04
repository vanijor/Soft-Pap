<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
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

		public function __get($atributo)
		{
			return $this->atributo;
		}

		public function __set($atributo, $valor)
		{
			$this->atributo = $valor;
		}


		// INSERE TODAS AS COLUNAS DA TABELA PESSOA
		public function insert($InputNome, $InputTelefone, $InputEndereco, $InputSalario, $InputLogin, $InputSenha, $InputRG, $InputCpf, $InputAdm){

			include("dbconnect.php");

			$query = "INSERT INTO pessoa (nm_nome, cd_telefone, ds_endereco, vl_salario, cd_login, cd_senha, cd_rg, cd_cpf, cd_adm) VALUES (?,?,?,?,?,?,?,?,?)";

			$stmt = $db_conn->prepare($query);
			$stmt->bind_param("sisdssiii", $InputNome, $InputTelefone, $InputEndereco, $InputSalario, $InputLogin, $InputSenha, $InputRG, $InputCpf, $InputAdm);
            	# corrigir os nomes aqui, e os setters embaixo.
			if ($stmt->execute()){
				$this->Nome = $InputNome;
				$this->Telefone = $InputTelefone;
				$this->Endereco = $InputEndereco;
				$this->Salario = $InputSalario;
				$this->Login = $InputLogin;
				$this->Senha = $InputSenha;
				$this->RG = $InputRG;
				$this->Adm = $InputAdm;
				$this->Cpf = $InputCpf;

			echo '<script>window.location="painel_list_user.php";</script>';
			$stmt->close();
			$db_conn->close();
			return true; // Execução com sucesso
			}
		print_r($stmt->error);
		print_r($stmt->errno);
		$stmt->close();
		$db_conn->close();
        return false; // Erro na execução
        }



		// CONSULTA E EXIBE TODAS AS LINHAS DA TABELA PESSOA 
        public function select(){

			include("dbconnect.php");

        	$db_conn = mysqli_connect("localhost","root","","u573658764_papel") 
        	or
        	die("Não foi possível conectar:" . mysqli_connect_errno());

        	$query = "SELECT cd_pessoa, nm_nome, cd_rg, cd_cpf, cd_telefone, ds_endereco, vl_salario, cd_adm FROM pessoa";


        	$stmt = $db_conn->prepare($query);
        	if($stmt->execute()) {
        		$stmt->bind_result($cd_pessoa, $nm_nome, $cd_rg, $cd_cpf, $cd_telefone, $ds_endereco, $vl_salario, $cd_adm);

				// EXIBE PESSOA
        		while($stmt->fetch()) {
        			printf("<tr>");
        			printf("<td>" .
        				$cd_pessoa
        				. "</td><td>" . 
        				$nm_nome
        				. "</td><td>" . 
        				$cd_rg
        				. "</td><td>" . 
        				$cd_cpf
        				. "</td><td>" . 
        				$cd_telefone
        				. "</td><td>" . 
        				$ds_endereco
        				. "</td><td>" .
        				$vl_salario
        				. "</td><td>" .
        				$cd_adm
        				. "</td><td>" .
        				"<button onclick="."confirm_modal('deletar.php?cd_pessoa=".$cd_pessoa."')> APAGAR </button>"
        				. " | " .
        				"<button href='#update_modal' data-id=".$cd_pessoa." data-toggle='modal' data-target='#update_modal' class='modalLink'> ALTERAR </button>"
        				);
        			printf("<tr>");
        			}
        	$stmt->close();
        	$db_conn->close();
			return true; // Execução com sucesso
			}
		$stmt->error;
		$stmt->errno;
		$stmt->close();
		$db_conn->close();
		return false; // Erro na execução
		}


		// ALTERA DADOS DA LINHA SELECIONADA
	public function update($InputNome, $InputTelefone, $InputEndereco, $InputSalario, $InputLogin, $InputSenha, $InputRG, $InputCpf, $InputAdm, $Id){

			include("dbconnect.php");

			$query = "UPDATE Pessoa SET nm_nome = ?, cd_telefone = ?, ds_endereco = ?, vl_salario = ?, cd_login = ?, cd_senha = ?, cd_rg = ?, cd_cpf = ?, cd_adm = ? WHERE cd_pessoa = ?";

			$stmt = $db_conn->prepare($query);

			$stmt->bind_param("sisdssiiii", $InputNome, $InputTelefone, $InputEndereco, $InputSalario, $InputLogin, $InputSenha, $InputRG, $InputCpf, $InputAdm, $Id);

			if($stmt->execute()) {
				$stmt->close();
				$db_conn->close();
				echo '<script>window.location="painel_list_user.php";</script>';
			return true; // Execução com sucesso
			}

		$stmt->error;
		$stmt->errno;
		$stmt->close();
		$db_conn->close();
		echo "A alteração falhou";
		return false; // Erro na execução
		}

	public function delete($Id){

			include("dbconnect.php");

			$query = "DELETE FROM pessoa WHERE cd_pessoa = ?";
			$stmt = $db_conn->prepare($query);
			$stmt->bind_param("i", $Id);

			if($stmt->execute()) {
				$stmt->close();
				$db_conn->close();
				echo '<script>window.location="painel_list_user.php";</script>';
			return true; // Execução com sucesso
			}

		$stmt->error;
		$stmt->errno;
		$stmt->close();
		$db_conn->close();
		return false; // Erro na execução
		}

}
?>