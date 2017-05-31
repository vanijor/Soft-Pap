<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
	/**
	* 
	*/
	class Fornecedor
	{
		private $Cnpj;
        private $Nome;
		private $Endereco;
        private $Telefone;
		private $Email;
		

		function __construct($Cnpj='', $Nome='', $Endereco='', $Telefone='', $Email='')
		{
			$this->Cnpj = $Cnpj;
            $this->Nome = $Nome;
            $this->Endereco = $Endereco;
			$this->Telefone = $Telefone;
			$this->Email = $Email;
			
            }

		// CAMPOS DA TABELA: cd_fornecedor, cd_cnpj_fornecedor, nm_fornecedor, ds_endereco_fornecedor, cd_tel_fornecedor, ds_email

		public function __get($atributo)
		{
			return $this->atributo;
		}

		public function __set($atributo, $valor)
		{
			$this->atributo = $valor;
		}


		public function insert($InputCnpj, $InputNome, $InputEndereco, $InputTelefone, $InputEmail){

			include("dbconnect.php");

			$query = "INSERT INTO Fornecedor (cd_cnpj_fornecedor, nm_fornecedor, ds_endereco_fornecedor, cd_tel_fornecedor, ds_email) VALUES (?,?,?,?,?)";

			$stmt = $db_conn->prepare($query);
			$stmt->bind_param("issis", $InputCnpj, $InputNome, $InputEndereco, $InputTelefone, $InputEmail);

			if ($stmt->execute()){
				$this->Cnpj = $InputCnpj;
				$this->Nome = $InputNome;
				$this->Endereco = $InputEndereco;
				$this->Telefone = $InputTelefone;
				$this->Email = $InputEmail;

			echo '<script>window.location="painel_list_forn.php?lista=2&pagina=1";</script>';
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

        public function getNumrows($Id, $Nome, $Cnpj){

        	include("dbconnect.php");

        	$query = "SELECT cd_fornecedor, cd_cnpj_fornecedor, nm_fornecedor, ds_endereco_fornecedor, cd_tel_fornecedor, ds_email FROM Fornecedor 
        	WHERE cd_fornecedor LIKE ? OR
        	      nm_fornecedor LIKE ? OR
        	      cd_cnpj_fornecedor LIKE ?
        	"; 

        	$stmt = $db_conn->prepare($query);
        	$stmt->bind_param("isi", $Id, $Nome, $Cnpj);
        	if($stmt->execute()) {
        		$stmt->bind_result($cd_forn, $cnpj_forn, $nome_forn, $endereco_forn, $tel_forn, $email_forn);

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

        public function search($Id, $Nome, $Cnpj){

        	include("dbconnect.php");

        	$query = "SELECT cd_fornecedor, cd_cnpj_fornecedor, nm_fornecedor, ds_endereco_fornecedor, cd_tel_fornecedor, ds_email FROM Fornecedor 
        	WHERE cd_fornecedor LIKE ? OR
        	      nm_fornecedor LIKE ? OR
        	      cd_cnpj_fornecedor LIKE ?
        	"; 

        	$stmt = $db_conn->prepare($query);
        	$stmt->bind_param("isi", $Id, $Nome, $Cnpj);
        	if($stmt->execute()) {
        		$stmt->bind_result($cd_forn, $cnpj_forn, $nome_forn, $endereco_forn, $tel_forn, $email_forn);

				    while($stmt->fetch()) {
        			printf("<tr>");
        			printf("<td>" .
        				$cd_forn
        				. "</td><td>" . 
        				$nome_forn
        				. "</td><td>" . 
        				$cnpj_forn
        				. "</td><td>" . 
        				$endereco_forn
        				. "</td><td>" . 
        				$tel_forn
        				. "</td><td>" . 
        				$email_forn
        				. "</td><td>" .
        				"<a class='btn btn-success modalLink' href='#update_forn' data-id=".$cd_forn." data-toggle='modal'data-target='#update_forn'><em class='fa fa-pencil'></em></a>
        				<a class='btn btn-danger' onclick="."confirm_modal('deletar.php?cd_forn=".$cd_forn."')><em class='fa fa-trash'></em></a>
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

        	$query = "SELECT * FROM Fornecedor LIMIT ?, ?";

        	$stmt = $db_conn->prepare($query);
        	$stmt->bind_param("ii", $offset, $limit);
        	if($stmt->execute()) {
        		$stmt->bind_result($cd_forn, $cnpj_forn, $nome_forn, $endereco_forn, $tel_forn, $email_forn);

        		while($stmt->fetch()) {
        			printf("<tr>");
        			printf("<td>" .
        				$cd_forn
        				. "</td><td>" . 
        				$nome_forn
        				. "</td><td>" . 
        				$cnpj_forn
        				. "</td><td>" . 
        				$endereco_forn
        				. "</td><td>" . 
        				$tel_forn
        				. "</td><td>" . 
        				$email_forn
        				. "</td><td>" .
        				"<a class='btn btn-success modalLink' href='#update_forn' data-id=".$cd_forn." data-toggle='modal'data-target='#update_forn'><em class='fa fa-pencil'></em></a>
        				<a class='btn btn-danger' onclick="."confirm_modal('deletar.php?cd_forn=".$cd_forn."')><em class='fa fa-trash'></em></a>
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
		return false; // Erro na execução
		}       

		public function update($InputCnpj, $InputNome, $InputEndereco, $InputTelefone, $InputEmail, $InputCd){

			include("dbconnect.php");

			$query = "UPDATE Fornecedor SET cd_cnpj_fornecedor = ?, nm_fornecedor = ?, ds_endereco_fornecedor = ?, cd_tel_fornecedor = ?, ds_email = ? WHERE cd_fornecedor = ?";

			$stmt = $db_conn->prepare($query);

			$stmt->bind_param("issisi", $InputCnpj, $InputNome, $InputEndereco, $InputTelefone, $InputEmail, $InputCd);

			if($stmt->execute()) {
			$stmt->close();
			$db_conn->close();
			echo '<script>window.location="painel_list_forn.php?lista=2&pagina=1";</script>';
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

			$query = "DELETE FROM Fornecedor WHERE cd_fornecedor = ?";
			$stmt = $db_conn->prepare($query);
			$stmt->bind_param("i", $Id);

			if($stmt->execute()) {
			$stmt->close();
			$db_conn->close();
			echo '<script>window.location="painel_list_forn.php?lista=2&pagina=1";</script>';
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