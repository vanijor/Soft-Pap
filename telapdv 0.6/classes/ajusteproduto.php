<?php
	/**
	* 
	*/
	class AjusteProduto
	{
        private $Ajuste;
        private $Produto;
        private $Qtd_prod;
			

		function __construct($Ajuste='', $Produto='', $Qtd_prod='')
		{
			$this->Ajuste = $Ajuste;
            $this->Produto = $Produto;
			$this->Qtd_prod = $Qtd_prod;
        }

        public function __get($atributo)
		{
			return $this->atributo;
		}

		public function __set($atributo, $quantidade)
		{
			$this->atributo = $quantidade;
		}
		
		public function insert($InputAjuste,$InputProduto, $InputQtd_prod){

			include("dbconnect.php");

			$query = "INSERT INTO Ajuste_has_produto (	Ajuste_cd_Ajuste, Produto_cd_produto,	qt_produto) VALUES (?,?,?)";

			$stmt = $db_conn->prepare($query);
			$stmt->bind_param("iii", $InputAjuste, $InputProduto, $InputQtd_prod);

			if ($stmt->execute()){
				$this->Ajuste = $InputAjuste;
	            $this->Produto = $InputProduto;
				$this->Qtd_prod = $InputQtd_prod;
				
			echo '<script>window.location="painel_list_ajprod.php?lista=9&pagina=1";</script>';
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

        	$query = "SELECT cd_ajuste_has_produto, Ajuste_cd_ajuste, Produto_cd_produto,	qt_produto
			 FROM Ajuste_has_produto LIMIT ?, ?";

        	$stmt = $db_conn->prepare($query);
        	$stmt->bind_param("ii", $offset, $limit);
        	if($stmt->execute()) {
        		$stmt->bind_result($cd_ajprod, $cd_ajuste, $cd_prod, $qt_prod);

				// EXIBE PESSOA
        		while($stmt->fetch()) {
        			printf("<tr>");
        			printf("<td>" .
        				$cd_ajprod
        				. "</td><td>" . 
        				$cd_ajuste
        				. "</td><td>" .  
        				$cd_prod
        				. "</td><td>" . 
        				$qt_prod
        				. "</td><td>" . 
        				"<a class='btn btn-success modalLink' href='#update_ajprod' data-id=".$cd_ajprod." data-toggle='modal' data-target='#update_ajprod'><em class='fa fa-pencil'></em></a>
        				<a class='btn btn-danger' onclick="."confirm_modal('deletar.php?cd_ajprod=".$cd_ajprod."')><em class='fa fa-trash'></em></a>
        				<a class='btn btn-info modalView' href='#view_prod' data-id=".$cd_ajprod." data-toggle='modal' data-target='#view_prod'><em class='fa fa-eye' aria-hidden='true'></em></a>");
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

		public function update($InputAjuste, $InputProduto, $InputQt_Prod, $Id){

			include("dbconnect.php");

			$query = "UPDATE Ajuste_has_produto SET Ajuste_cd_ajuste = ?, Produto_cd_produto = ?, qt_produto = ? WHERE cd_ajuste_has_produto = ?";

			$stmt = $db_conn->prepare($query);

			$stmt->bind_param("iiii", $InputAjuste, $InputProduto, $InputQt_Prod, $Id);

			if($stmt->execute()) {
			$stmt->close();
			$db_conn->close();
			echo '<script>window.location="painel_list_ajprod.php?lista=9&pagina=1";</script>';
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

			$query = "DELETE FROM Ajuste_has_produto WHERE cd_ajuste_has_produto = ?";

			$stmt = $db_conn->prepare($query);
			$stmt->bind_param("i", $Id);

			if($stmt->execute()) {
			$stmt->close();
			$db_conn->close();
			echo '<script>window.location="painel_list_copr.php?lista=9&pagina=1";</script>';
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

