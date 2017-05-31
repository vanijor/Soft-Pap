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


		public function insert($InputNome, $InputTelefone, $InputEndereco, $InputSalario, $InputLogin, $InputSenha, $InputRG, $InputCpf, $InputAdm){

			include("dbconnect.php");

			$query = "INSERT INTO Pessoa (nm_nome, cd_telefone, ds_endereco, vl_salario, cd_login, cd_senha, cd_rg, cd_cpf, cd_adm) VALUES (?,?,?,?,?,?,?,?,?)";

			$stmt = $db_conn->prepare($query);
			$stmt->bind_param("sisdssiii", $InputNome, $InputTelefone, $InputEndereco, $InputSalario, $InputLogin, $InputSenha, $InputRG, $InputCpf, $InputAdm);

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

			echo '<script>window.location="painel_list_user.php?lista=1&pagina=1";</script>';
			$stmt->close();
			$db_conn->close();
			return true; // Execução com sucesso
			}
		print_r($stmt->error);
		print_r($stmt->errno);
		$stmt->close();
		$db_conn->close();
        return false; // Falha na execução
        }

        public function getNumrows($Id, $Nome, $Cpf){

			include("dbconnect.php");

        	$query = "SELECT cd_pessoa, nm_nome, cd_rg, cd_cpf, cd_telefone, ds_endereco, vl_salario, cd_adm FROM Pessoa 
        	WHERE cd_pessoa LIKE ? OR
        	      nm_nome LIKE ? OR
        	      cd_cpf LIKE ?
        	";

        	$stmt = $db_conn->prepare($query);
        	$stmt->bind_param("isi", $Id, $Nome, $Cpf);
        	if($stmt->execute()) {
        		$stmt->bind_result($cd_pessoa, $nm_nome, $cd_rg, $cd_cpf, $cd_telefone, $ds_endereco, $vl_salario, $cd_adm);

        	while($stmt->fetch()) {
        	}

        	$numrows = $stmt->num_rows;
			return $numrows; // Execução com sucesso
			}
		$stmt->error;
		$stmt->errno;
		$stmt->close();
		$db_conn->close();
		return false; // Falha na execução
		}


        public function search($Id, $Nome, $Cpf){

        	include("dbconnect.php");

        	$query = "SELECT cd_pessoa, nm_nome, cd_rg, cd_cpf, cd_telefone, ds_endereco, vl_salario, cd_adm FROM Pessoa 
        	WHERE cd_pessoa LIKE ? OR
        	      nm_nome LIKE ? OR
        	      cd_cpf LIKE ?
        	";

        	$stmt = $db_conn->prepare($query);
        	$stmt->bind_param("isi", $Id, $Nome, $Cpf);
        	if($stmt->execute()) {
        		$stmt->bind_result($cd_pessoa, $nm_nome, $cd_rg, $cd_cpf, $cd_telefone, $ds_endereco, $vl_salario, $cd_adm);


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
        				"<a class='btn btn-success modalLink' href='#update_user' data-id=".$cd_pessoa." data-toggle='modal' data-target='#update_user'><em class='fa fa-pencil'></em></a>
        				<a class='btn btn-danger' onclick="."confirm_modal('deletar.php?cd_pessoa=".$cd_pessoa."')><em class='fa fa-trash'></em></a>
        				<a class='btn btn-info'><em class='fa fa-eye' aria-hidden='true'></em></a>");
        			printf("</td>");
        			printf("</tr>");
        			}
        	$stmt->close();
        	$db_conn->close();
			return true; // Execução com sucesso
			}
		$stmt->error;
		$stmt->errno;
		$stmt->close();
		$db_conn->close();
		return false; // Falha na execução
		}


        public function pageselect($Pagina){
        	
        	if($Pagina == 1) {
        		$this->select(0, 20);
        	} elseif($Pagina == 2) {
        		$this->select(20, 40);
        	} elseif($Pagina == 3) {
        		$this->select(40, 60);
			} elseif($Pagina == 4) {
				$this->select(60, 80);
			} elseif($Pagina == 5) {
				$this->select(80, 100);
			} elseif($Pagina == 6) {
				$this->select(100, 120);
			}
        }

        public function select($offset, $limit){

			include("dbconnect.php");

        	$query = "SELECT cd_pessoa, nm_nome, cd_rg, cd_cpf, cd_telefone, ds_endereco, vl_salario, cd_adm FROM Pessoa LIMIT ?, ?";

        	$stmt = $db_conn->prepare($query);
        	$stmt->bind_param("ii", $offset, $limit);
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
        				"<a class='btn btn-success modalLink' href='#update_user' data-id=".$cd_pessoa." data-toggle='modal' data-target='#update_user'><em class='fa fa-pencil'></em></a>
        				<a class='btn btn-danger' onclick="."confirm_modal('deletar.php?cd_pessoa=".$cd_pessoa."')><em class='fa fa-trash'></em></a>
        				<a class='btn btn-info'><em class='fa fa-eye' aria-hidden='true'></em></a>");
        			printf("</td>");
        			printf("</tr>");
        			}
        	$stmt->close();
        	$db_conn->close();
			return true; // Execução com sucesso
			}
		$stmt->error;
		$stmt->errno;
		$stmt->close();
		$db_conn->close();
		return false; // Falha na execução
		}


		public function update($InputNome, $InputTelefone, $InputEndereco, $InputSalario, $InputLogin, $InputSenha, $InputRG, $InputCpf, $InputAdm, $Id){

			include("dbconnect.php");

			$query = "UPDATE Pessoa SET nm_nome = ?, cd_telefone = ?, ds_endereco = ?, vl_salario = ?, cd_login = ?, cd_senha = ?, cd_rg = ?, cd_cpf = ?, cd_adm = ? WHERE cd_pessoa = ?";

			$stmt = $db_conn->prepare($query);

			$stmt->bind_param("sisdssiiii", $InputNome, $InputTelefone, $InputEndereco, $InputSalario, $InputLogin, $InputSenha, $InputRG, $InputCpf, $InputAdm, $Id);

			if($stmt->execute()) {
			$stmt->close();
			$db_conn->close();
			echo '<script>window.location="painel_list_user.php?lista=1&pagina=1";</script>';
			return true; // Execução com sucesso
			}
		$stmt->error;
		$stmt->errno;
		$stmt->close();
		$db_conn->close();
		echo "A alteração falhou";
		return false; // Falha na execução
		}


		public function delete($Id){

			include("dbconnect.php");

			$query = "DELETE FROM Pessoa WHERE cd_pessoa = ?";

			$stmt = $db_conn->prepare($query);
			$stmt->bind_param("i", $Id);

			if($stmt->execute()) {
			$stmt->close();
			$db_conn->close();
			echo '<script>window.location="painel_list_user.php?lista=1&pagina=1";</script>';
			return true; // Execução com sucesso
			}
		$stmt->error;
		$stmt->errno;
		$stmt->close();
		$db_conn->close();
		return false; // Falha na execução
		}


		public function login($Login, $Password){

			include("dbconnect.php");

			$query = "SELECT cd_pessoa, nm_nome, cd_rg, cd_cpf, cd_telefone, ds_endereco, vl_salario, cd_adm, cd_login, cd_senha FROM Pessoa WHERE cd_login = ? AND cd_senha = ?";

			$stmt = $db_conn->prepare($query);
    		$stmt->bind_param("ss", $Login, $Password);

    		if($stmt->execute()) {
			// GUARDANDO RESULTADO
			$stmt->store_result();
			$stmt->bind_result($cd_pessoa, $nm_nome, $cd_rg, $cd_cpf, $cd_telefone, $ds_endereco, $vl_salario, $cd_adm, $cd_login, $cd_senha);
			}

			$numrows = $stmt->num_rows;
			echo $numrows;
			if($numrows == 1){
			echo "Usuário encontrado";
			
			while($stmt->fetch()){
				// INSTANCIANDO OBJETO - PESSOA
			    $this->Nome = $nm_nome;
			    $this->Telefone = $cd_telefone;
			    $this->Endereco = $ds_endereco;
			    $this->Salario = $vl_salario;
			    $this->Login = $cd_login;
			    $this->Senha = $cd_senha;
			    $this->RG = $cd_rg;
			    $this->Cpf = $cd_cpf;
				$this->Adm = $cd_adm;

				// COOKIES E SESSION
				$_SESSION['ID'] = $cd_pessoa;
				$_SESSION["Nome"] = $nm_nome;
				$_SESSION["Telefone"] = $cd_telefone;
				$_SESSION["Endereco"] = $ds_endereco;	
				$_SESSION["Salario"] = $vl_salario;
				setcookie ("Usuario", $cd_login, time() + 3600); 	$_SESSION["Usuario"] = $cd_login;	
				setcookie ("Senha", $cd_senha, time() + 3600);  	$_SESSION["Senha"] = $cd_senha;
				$_SESSION["RG"] = $cd_rg;
				$_SESSION["Cpf"] = $cd_cpf;
				$_SESSION["Adm"] = $cd_adm;
    		}

    		if($this->Auth(isset($_SESSION['Adm'])) == true){
    		echo "Acesso concedido - redirecionando para painel administrativo";
	    	echo '<script>window.location="painel.php";</script>';
    		}

	    	return true;
			}
		echo "Usuário não encontrado";
		return false;
		}


		public function auth($Admin){

	    	if ($Admin == 1) {
			return true; // Execução com sucesso
	    	} elseif ($Admin == 0 && $_SESSION['Usuario'] != Null) {
			echo "Entrada de funcionário realizada";
			return false;
			} else {
			echo "Acesso negado, sendo redirecionado 2";
			echo '<script>window.location="index.html";</script>';
	        return false;
			}
		}


		public function logout(){

	        setcookie ("Usuario", $_SESSION["Usuario"], time() -3600);
			setcookie ("Senha", $_SESSION["Senha"], time() - 3600);
			session_destroy();
		    echo '<script>window.location="index.html";</script>';
		exit;
		}
	}
?>