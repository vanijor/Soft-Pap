<?php
	/**
	* 
	*/
	class Venda
	{
		private $Data;
        private $Pagamento;
		private $Pessoa;
			

		function __construct($Data='', $Pagamento='', $Pessoa='')
		{
			$this->Data = $Data;
            $this->Pagamento = $Pagamento;
            $this->Pessoa = $Pessoa;
			
        }

        public function __get($atributo)
		{
			return $this->atributo;
		}

		public function __set($atributo, $quantidade)
		{
			$this->atributo = $quantidade;
		}
		
		public function insert($InputData, $InputPagamento, $InputPessoa){

			include("dbconnect.php");

			$query = "INSERT INTO Venda (dt_venda,	ds_pagamento, Pessoa_cd_pessoa) VALUES (?,?,?)";

			$stmt = $db_conn->prepare($query);
			$stmt->bind_param("ssi", $InputData, $InputPagamento, $InputPessoa);

			if ($stmt->execute()){
				$this->Data = $InputData;
	            $this->Pagamento = $InputPagamento;
	            $this->Pessoa = $InputPessoa;
				
			echo '<script>window.location="painel_list_venda.php?lista=6&pagina=1";</script>';
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

        	$query = "SELECT cd_venda, dt_venda,	ds_pagamento, Pessoa_cd_pessoa
			 FROM Venda LIMIT ?, ?";

        	$stmt = $db_conn->prepare($query);
        	$stmt->bind_param("ii", $offset, $limit);
        	if($stmt->execute()) {
        		$stmt->bind_result($cd_venda, $dt_venda,$ds_pagamento, $cd_pessoa);

				// EXIBE PESSOA
        		while($stmt->fetch()) {
        			printf("<tr>");
        			printf("<td>" .
        				$cd_venda
        				. "</td><td>" . 
        				$dt_venda
        				. "</td><td>" . 
        				$ds_pagamento
        				. "</td><td>" . 
        				$cd_pessoa
        				. "</td><td>" . 
        				"<a class='btn btn-success modalLink' href='#update_venda' data-id=".$cd_venda." data-toggle='modal' data-target='#update_venda'><em class='fa fa-pencil'></em></a>
        				<a class='btn btn-danger' onclick="."confirm_modal('deletar.php?cd_venda=".$cd_venda."')><em class='fa fa-trash'></em></a>
        				<a class='btn btn-info modalView' href='#view_prod' data-id=".$cd_venda." data-toggle='modal' data-target='#view_prod'><em class='fa fa-eye' aria-hidden='true'></em></a>");
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


		public function update($InputData, $InputPagamento, $Id){

			include("dbconnect.php");

			$query = "UPDATE Venda SET dt_venda = ?, ds_pagamento = ? WHERE cd_venda = ?";

			$stmt = $db_conn->prepare($query);

			$stmt->bind_param("ssi", $InputData, $InputPagamento, $Id);

			if($stmt->execute()) {
			$stmt->close();
			$db_conn->close();
			echo '<script>window.location="painel_list_venda.php?lista=6&pagina=1";</script>';
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

			$query = "DELETE FROM Venda WHERE cd_venda = ?";

			$stmt = $db_conn->prepare($query);
			$stmt->bind_param("i", $Id);

			if($stmt->execute()) {
			$stmt->close();
			$db_conn->close();
			echo '<script>window.location="painel_list_venda.php?lista=6&pagina=1";</script>';
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

