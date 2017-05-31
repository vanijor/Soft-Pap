<?php
	/**
	* 
	*/
	class ProdutoVenda
	{
        private $Produto;
        private $Venda;
		private $Qtd_prod;
		private $Nome_prod;
		private $Vl_prod;
			

		function __construct($Produto='', $Venda='', $Qtd_prod='', $Nome_prod='', $Vl_venda='')
		{
            $this->Produto = $Produto;
         	$this->Venda = $Venda;
			$this->Qtd_prod = $Qtd_prod;
            $this->Nome_prod = $Nome_prod;
            $this->Vl_venda = $Vl_venda;
        }

        public function __get($atributo)
		{
			return $this->atributo;
		}

		public function __set($atributo, $quantidade)
		{
			$this->atributo = $quantidade;
		}
		
		public function insert($InputProduto, $InputVenda, $InputNome_prod, $InputVl_Venda, $InputQtd_prod){

			include("dbconnect.php");

			$query = "INSERT INTO Produto_has_venda (Produto_cd_produto, Venda_cd_venda, nm_produto, vl_produto, qt_produto) VALUES (?,?,?,?,?)";

			$stmt = $db_conn->prepare($query);
			$stmt->bind_param("iisdi", $InputProduto, $InputVenda, $InputNome_prod, $InputVl_Venda, $InputQtd_prod);

			if ($stmt->execute()){
				$this->Produto = $InputProduto;
				$this->Venda = $InputVenda;
	            $this->Nome_prod = $InputNome_prod;
	            $this->Vl_prod = $InputVl_Prod;
				$this->Qtd_prod = $InputQtd_prod;
	            
				
			echo '<script>window.location="painel_list_prvd.php?lista=8&pagina=1";</script>';
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

        	$query = "SELECT cd_produto_has_venda, Produto_cd_produto, Venda_cd_venda, nm_produto, vl_produto, qt_produto
			 FROM Produto_has_venda LIMIT ?, ?";

        	$stmt = $db_conn->prepare($query);
        	$stmt->bind_param("ii", $offset, $limit);
        	if($stmt->execute()) {
        		$stmt->bind_result($cd_prvd, $cd_prod, $cd_venda, $nm_prod, $vl_prod, $qt_prod);

				// EXIBE PESSOA
        		while($stmt->fetch()) {
        			printf("<tr>");
        			printf("<td>" .
        				$cd_prvd
        				. "</td><td>" . 
        				$cd_prod
        				. "</td><td>" . 
        				$cd_venda
        				. "</td><td>" . 
        				$nm_prod
        				. "</td><td>" . 
        				$vl_prod
        				. "</td><td>" . 
        				$qt_prod
        				. "</td><td>" . 
        				"<a class='btn btn-success modalLink' href='#update_prvd' data-id=".$cd_prvd." data-toggle='modal' data-target='#update_prvd'><em class='fa fa-pencil'></em></a>
        				<a class='btn btn-danger' onclick="."confirm_modal('deletar.php?cd_prvd=".$cd_prvd."')><em class='fa fa-trash'></em></a>
        				<a class='btn btn-info modalView' href='#view_prod' data-id=".$cd_prvd." data-toggle='modal' data-target='#view_prod'><em class='fa fa-eye' aria-hidden='true'></em></a>");
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

		public function update($InputProduto, $InputVenda, $InputNome, $InputVl_prod, $InputQt_prod, $Id){

			include("dbconnect.php");

			$query = "UPDATE Produto_has_venda SET Produto_cd_produto = ?, Venda_cd_venda = ?,  nm_produto = ?, vl_produto = ?, qt_produto = ? WHERE cd_produto_has_venda = ?";

			$stmt = $db_conn->prepare($query);

			$stmt->bind_param("iisdii", $InputProduto, $InputVenda, $InputNome, $InputVl_prod, $InputQt_prod, $Id);

			if($stmt->execute()) {
			$stmt->close();
			$db_conn->close();
			echo '<script>window.location="painel_list_prvd.php?lista=8&pagina=1";</script>';
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

			$query = "DELETE FROM Produto_has_venda WHERE cd_produto_has_venda = ?";

			$stmt = $db_conn->prepare($query);
			$stmt->bind_param("i", $Id);

			if($stmt->execute()) {
			$stmt->close();
			$db_conn->close();
			echo '<script>window.location="painel_list_prvd.php?lista=8&pagina=1";</script>';
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

