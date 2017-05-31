<?php
	/**
	* 
	*/
	class Produto
	{
		private $Codbarra;
        private $Nome;
		private $Descricao;
        private $Quantidade;
		private $Valor;
		private $Categoria;
		

		function __construct($Codbarra='', $Nome='', $Descricao='', $Quantidade='', $Valor='', $Categoria='')
		{
			$this->Codbarra = $Codbarra;
            $this->Nome = $Nome;
            $this->Descricao = $Descricao;
			$this->Quantidade = $Quantidade;
			$this->Valor = $Valor;
            $this->Categoria = $Categoria;
			
        }

            // cd_produto	cd_codbarra	nm_produto	ds_produto	qt_produto	vl_produto	ds_categoria

        public function __get($atributo)
		{
			return $this->atributo;
		}

		public function __set($atributo, $valor)
		{
			$this->atributo = $valor;
		}
		
		public function insert($InputCodBarra, $InputNome, $InputDescricao, $InputQtd, $InputValor, $InputCategoria){

			include("dbconnect.php");

			$query = "INSERT INTO Produto (cd_codbarra,	nm_produto,	ds_produto,	qt_produto,	vl_produto,	ds_categoria) VALUES (?,?,?,?,?,?)";

			$stmt = $db_conn->prepare($query);
			$stmt->bind_param("issids", $InputCodBarra, $InputNome, $InputDescricao, $InputQtd, $InputValor, $InputCategoria);

			if ($stmt->execute()){
				$this->Codbarra = $InputCodBarra;
	            $this->Nome = $InputNome;
	            $this->Descricao = $InputDescricao;
				$this->Quantidade = $InputQtd;
				$this->Valor = $InputValor;
	            $this->Categoria = $InputCategoria;

			echo '<script>window.location="painel_list_prod.php?lista=3&pagina=1";</script>';
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

        public function getNumrows($Id, $Nome, $CodBarra){

			include("dbconnect.php");

        	$query = "SELECT cd_produto, nm_produto, cd_codbarra, ds_produto, qt_produto, vl_produto, ds_categoria FROM Produto
        	WHERE cd_produto LIKE ? OR
        	      nm_produto LIKE ? OR
        	      cd_codbarra LIKE ?
        	";

        	$stmt = $db_conn->prepare($query);
        	$stmt->bind_param("isi", $Id, $Nome, $CodBarra);
        	if($stmt->execute()) {
        		$stmt->bind_result($cd_produto, $nm_produto, $cd_codbarra, $ds_produto, $qt_produto, $vl_produto, $ds_categoria);

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

        public function search($Id, $Nome, $CodBarra){

			include("dbconnect.php");

        	$query = "SELECT cd_produto, nm_produto, cd_codbarra, ds_produto, qt_produto, vl_produto, ds_categoria FROM Produto
        	WHERE cd_produto LIKE ? OR
        	      nm_produto LIKE ? OR
        	      cd_codbarra LIKE ?
        	";

        	$stmt = $db_conn->prepare($query);
        	$stmt->bind_param("isi", $Id, $Nome, $CodBarra);
        	if($stmt->execute()) {
        		$stmt->bind_result($cd_produto, $nm_produto, $cd_codbarra, $ds_produto, $qt_produto, $vl_produto, $ds_categoria);


        		while($stmt->fetch()) {
        			printf("<tr>");
        			printf("<td>" .
        				$cd_produto
        				. "</td><td>" . 
        				$nm_produto
        				. "</td><td>" . 
        				$cd_codbarra
        				. "</td><td>" . 
        				$ds_produto
        				. "</td><td>" . 
        				$qt_produto
        				. "</td><td>" . 
        				$vl_produto
        				. "</td><td>" .
        				$ds_categoria
        				. "</td><td>" .
        				"<a class='btn btn-success modalLink' href='#update_user' data-id=".$cd_produto." data-toggle='modal' data-target='#update_user'><em class='fa fa-pencil'></em></a>
        				<a class='btn btn-danger' onclick="."confirm_modal('deletar.php?cd_produto=".$cd_produto."')><em class='fa fa-trash'></em></a>
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

        	$query = "SELECT cd_produto, nm_produto, cd_codbarra, ds_produto, qt_produto, vl_produto, ds_categoria FROM Produto LIMIT ?, ?";

        	$stmt = $db_conn->prepare($query);
        	$stmt->bind_param("ii", $offset, $limit);
        	if($stmt->execute()) {
        		$stmt->bind_result($cd_produto, $nm_produto, $cd_codbarra, $ds_produto, $qt_produto, $vl_produto, $ds_categoria);

				// EXIBE PESSOA
        		while($stmt->fetch()) {
        			printf("<tr>");
        			printf("<td>" .
        				$cd_produto
        				. "</td><td>" . 
        				$nm_produto
        				. "</td><td>" . 
        				$cd_codbarra
        				. "</td><td>" . 
        				$ds_produto
        				. "</td><td>" . 
        				$qt_produto
        				. "</td><td>" . 
        				$vl_produto
        				. "</td><td>" .
        				$ds_categoria
        				. "</td><td>" .
        				"<a class='btn btn-success modalLink' href='#update_prod' data-id=".$cd_produto." data-toggle='modal' data-target='#update_prod'><em class='fa fa-pencil'></em></a>
        				<a class='btn btn-danger' onclick="."confirm_modal('deletar.php?cd_produto=".$cd_produto."')><em class='fa fa-trash'></em></a>
        				<a class='btn btn-info modalView' href='#view_prod' data-id=".$cd_produto." data-toggle='modal' data-target='#view_prod'><em class='fa fa-eye' aria-hidden='true'></em></a>");
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

		public function update($InputNome, $InputCodBarra, $InputDescricao, $InputQtd, $InputValor, $InputCategoria, $Id){

			include("dbconnect.php");

			$query = "UPDATE Produto SET nm_produto = ?, cd_codbarra = ?, ds_produto = ?, qt_produto = ?, vl_produto = ?, ds_categoria = ? WHERE cd_produto = ?";

			$stmt = $db_conn->prepare($query);

			$stmt->bind_param("sisidsi", $InputNome, $InputCodBarra, $InputDescricao, $InputQtd, $InputValor, $InputCategoria, $Id);

			if($stmt->execute()) {
			$stmt->close();
			$db_conn->close();
			echo '<script>window.location="painel_list_prod.php?lista=3&pagina=1";</script>';
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

			$query = "DELETE FROM Produto WHERE cd_produto = ?";

			$stmt = $db_conn->prepare($query);
			$stmt->bind_param("i", $Id);

			if($stmt->execute()) {
			$stmt->close();
			$db_conn->close();
			echo '<script>window.location="painel_list_prod.php?lista=3&pagina=1";</script>';
			return true; // Execução com sucesso
			}
		$stmt->error;
		$stmt->errno;
		$stmt->close();
		$db_conn->close();
		return false; // Falha na execução
		}

		public function view($Id){

			include("dbconnect.php");
			require_once('Barcode/barcode.inc.php');

        	$query = "SELECT cd_produto, nm_produto, cd_codbarra, ds_produto, qt_produto, vl_produto, ds_categoria FROM Produto WHERE cd_produto = ?";

        	$stmt = $db_conn->prepare($query);
        	$stmt->bind_param("i", $Id);
        	if($stmt->execute()) {
        		$stmt->bind_result($cd_produto, $nm_produto, $cd_codbarra, $ds_produto, $qt_produto, $vl_produto, $ds_categoria);

        	while($stmt->fetch()) {
        			print_r("Código: " .
        				$cd_produto
        				. "<br>Nome: " .
        				$nm_produto
        				. "<br>Código de barra:" . 
        				$cd_codbarra
        				. "<br>Descricao:" . 
        				$ds_produto
        				. "<br>Quantidade:" . 
        				$qt_produto
        				. "<br>Valor:" . 
        				$vl_produto
        				. "<br>Descricao:" . 
        				$ds_categoria);
        			}
			return true; // Execução com sucesso
			}
		$stmt->error;
		$stmt->errno;
		$stmt->close();
		$db_conn->close();
		return false; // Falha na execução
		}

	}
?>

