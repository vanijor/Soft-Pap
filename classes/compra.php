<?php
	/**
	* 
	*/
	class Compra
	{
		private $Data;
        private $Pagamento;
		private $Fornecedor;
			

		function __construct($Data='', $Pagamento='', $Fornecedor='')
		{
			$this->Data = $Data;
            $this->Pagamento = $Pagamento;
            $this->Fornecedor = $Fornecedor;
			
        }

        public function __get($atributo)
		{
			return $this->atributo;
		}

		public function __set($atributo, $quantidade)
		{
			$this->atributo = $quantidade;
		}
		
		public function insert($InputData, $InputPagamento, $InputFornecedor){

			include("dbconnect.php");

			$query = "INSERT INTO Compra (dt_compra,	ds_pagamento_compra, Fornecedor_cd_fornecedor) VALUES (?,?,?)";

			$stmt = $db_conn->prepare($query);
			$stmt->bind_param("ssi", $InputData, $InputPagamento, $InputFornecedor);

			if ($stmt->execute()){
				$this->Data = $InputData;
	            $this->Pagamento = $InputPagamento;
	            $this->Fornecedor = $InputFornecedor;
				
			echo '<script>window.location="painel_list_compra.php?lista=4&pagina=1";</script>';
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

        	$query = "SELECT cd_compra,	dt_compra, ds_pagamento_compra, Fornecedor_cd_fornecedor
			 FROM Compra LIMIT ?, ?";

        	$stmt = $db_conn->prepare($query);
        	$stmt->bind_param("ii", $offset, $limit);
        	if($stmt->execute()) {
        		$stmt->bind_result($cd_compra, $dt_compra,$ds_pagamento_compra, $cd_fornecedor);

				// EXIBE PESSOA
        		while($stmt->fetch()) {
        			printf("<tr>");
        			printf("<td>" .
        				$cd_compra
        				. "</td><td>" . 
        				$dt_compra
        				. "</td><td>" . 
        				$ds_pagamento_compra
        				. "</td><td>" . 
        				$cd_fornecedor
        				. "</td><td>" . 
        				"<a class='btn btn-success modalLink' href='#update_compra' data-id=".$cd_compra." data-toggle='modal' data-target='#update_compra'><em class='fa fa-pencil'></em></a>
        				<a class='btn btn-danger' onclick="."confirm_modal('deletar.php?cd_compra=".$cd_compra."')><em class='fa fa-trash'></em></a>
        				<a class='btn btn-info modalView' href='#view_prod' data-id=".$cd_compra." data-toggle='modal' data-target='#view_prod'><em class='fa fa-eye' aria-hidden='true'></em></a>");
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

		public function update($InputData, $InputPagamento, $InputFornecedor, $Id){

			include("dbconnect.php");

			$query = "UPDATE Compra SET dt_compra = ?, ds_pagamento_compra = ?, Fornecedor_cd_fornecedor = ? WHERE cd_compra = ?";

			$stmt = $db_conn->prepare($query);

			$stmt->bind_param("ssii", $InputData, $InputPagamento, $InputFornecedor, $Id);

			if($stmt->execute()) {
			$stmt->close();
			$db_conn->close();
			echo '<script>window.location="painel_list_compra.php?lista=4&pagina=1";</script>';
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

			$query = "DELETE FROM Compra WHERE cd_compra = ?";

			$stmt = $db_conn->prepare($query);
			$stmt->bind_param("i", $Id);

			if($stmt->execute()) {
			$stmt->close();
			$db_conn->close();
			echo '<script>window.location="painel_list_compra.php?lista=4&pagina=1";</script>';
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

