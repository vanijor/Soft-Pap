<?php
	/**
	* 
	*/
	class CompraProduto
	{
        private $Compra;
		private $Fornecedor;
        private $Produto;
		private $Qtd_prod;
		private $Nome_prod;
			

		function __construct($Compra='', $Fornecedor='', $Produto='', $Qtd_prod='', $Nome_prod='')
		{
			$this->Compra = $Compra;
            $this->Fornecedor = $Fornecedor;
            $this->Produto = $Produto;
			$this->Qtd_prod = $Qtd_prod;
            $this->Nome_prod = $Nome_prod;
        }

        public function __get($atributo)
		{
			return $this->atributo;
		}

		public function __set($atributo, $quantidade)
		{
			$this->atributo = $quantidade;
		}
		
		public function insert($InputCompra, $InputFornecedor,$InputProduto, $InputQtd_prod, $InputNome_prod){

			include("dbconnect.php");

			$query = "INSERT INTO Compra_has_produto (	Compra_cd_compra, Compra_Fornecedor_cd_fornecedor, Produto_cd_produto,	qt_produto,	nm_produto) VALUES (?,?,?,?,?)";

			$stmt = $db_conn->prepare($query);
			$stmt->bind_param("iiiis", $InputCompra, $InputFornecedor, $InputProduto, $InputQtd_prod, $InputNome_prod);

			if ($stmt->execute()){
				$this->Compra = $InputCompra;
	            $this->Fornecedor = $InputFornecedor;
	            $this->Produto = $InputProduto;
				$this->Qtd_prod = $InputQtd_prod;
	            $this->Nome_prod = $InputNome_prod;
				
			echo '<script>window.location="painel_list_copr.php?lista=5&pagina=1";</script>';
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

        	$query = "SELECT cd_compra_has_produto, Compra_cd_compra, Compra_Fornecedor_cd_fornecedor, Produto_cd_produto,	qt_produto,	nm_produto
			FROM Compra_has_produto LIMIT ?, ?";

        	$stmt = $db_conn->prepare($query);
        	$stmt->bind_param("ii", $offset, $limit);
        	if($stmt->execute()) {
        		$stmt->bind_result($cd_copr, $cd_compra, $cd_forn, $cd_prod, $qt_prod, $nm_prod);

				// EXIBE PESSOA
        		while($stmt->fetch()) {
        			printf("<tr>");
        			printf("<td>" .
        				$cd_copr
        				. "</td><td>" . 
        				$cd_compra
        				. "</td><td>" . 
        				$cd_forn
        				. "</td><td>" . 
        				$cd_prod
        				. "</td><td>" . 
        				$qt_prod
        				. "</td><td>" . 
        				$nm_prod
        				. "</td><td>" . 
        				"<a class='btn btn-success modalLink' href='#update_copr' data-id=".$cd_copr." data-toggle='modal' data-target='#update_copr'><em class='fa fa-pencil'></em></a>
        				<a class='btn btn-danger' onclick="."confirm_modal('deletar.php?cd_copr=".$cd_copr."')><em class='fa fa-trash'></em></a>
        				<a class='btn btn-info modalView' href='#view_prod' data-id=".$cd_copr." data-toggle='modal' data-target='#view_prod'><em class='fa fa-eye' aria-hidden='true'></em></a>");
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


		public function update($InputCompra, $InputFornecedor,$InputProduto, $InputQtd_prod, $InputNome_prod, $Id){

			include("dbconnect.php");

			$query = "UPDATE Compra_has_produto SET Compra_cd_compra = ?, Compra_Fornecedor_cd_fornecedor = ?,  Produto_cd_produto = ?, qt_produto = ?,	nm_produto = ? WHERE cd_compra_has_produto = ?";

			$stmt = $db_conn->prepare($query);

			$stmt->bind_param("iiiisi", $InputCompra, $InputFornecedor, $InputProduto, $InputQtd_prod, $InputNome_prod, $Id);

			if($stmt->execute()) {
			$stmt->close();
			$db_conn->close();
			echo '<script>window.location="painel_list_copr.php?lista=5&pagina=1";</script>';
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

			$query = "DELETE FROM Compra_has_produto WHERE cd_compra_has_produto = ?";

			$stmt = $db_conn->prepare($query);
			$stmt->bind_param("i", $Id);

			if($stmt->execute()) {
			$stmt->close();
			$db_conn->close();
			echo '<script>window.location="painel_list_copr.php?lista=5&pagina=1";</script>';
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

