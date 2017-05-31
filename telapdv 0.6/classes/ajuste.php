<?php
	/**
	* 
	*/
	class Ajuste
	{
		private $Data;
        private $Justificativa;
		private $Pessoa;
			

		function __construct($Data='', $Justificativa='', $Pessoa='')
		{
			$this->Data = $Data;
            $this->Justificativa = $Justificativa;
            $this->Pessoa = $Pessoa;
			
        }

        public function __get($atributo)
		{
			return $this->atributo;
		}

		public function __set($atributo, $Quantidade)
		{
			$this->atributo = $Quantidade;
		}
		
		public function insert($InputData, $InputJustificativa, $InputPessoa){

			include("dbconnect.php");

			$query = "INSERT INTO Ajuste (dt_ajuste, ds_justificativa, Pessoa_cd_pessoa) VALUES (?,?,?)";

			$stmt = $db_conn->prepare($query);
			$stmt->bind_param("ssi", $InputData, $InputJustificativa, $InputPessoa);

			if ($stmt->execute()){
				$this->Data = $InputData;
	            $this->Justificativa = $InputJustificativa;
	            $this->Pessoa = $InputPessoa;
				
			echo '<script>window.location="painel_list_ajuste.php?lista=7&pagina=1";</script>';
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

        	$query = "SELECT cd_ajuste, dt_ajuste,	ds_justificativa, Pessoa_cd_pessoa
			 FROM Ajuste LIMIT ?, ?";

        	$stmt = $db_conn->prepare($query);
        	$stmt->bind_param("ii", $offset, $limit);
        	if($stmt->execute()) {
        		$stmt->bind_result($cd_ajuste, $dt_ajuste, $ds_justificativa, $cd_pessoa);

				// EXIBE PESSOA
        		while($stmt->fetch()) {
        			printf("<tr>");
        			printf("<td>" .
        				$cd_ajuste
        				. "</td><td>" . 
        				$dt_ajuste
        				. "</td><td>" . 
        				$ds_justificativa
        				. "</td><td>" . 
        				$cd_pessoa
        				. "</td><td>" . 
        				"<a class='btn btn-success modalLink' href='#update_ajuste' data-id=".$cd_ajuste." data-toggle='modal' data-target='#update_ajuste'><em class='fa fa-pencil'></em></a>
        				<a class='btn btn-danger' onclick="."confirm_modal('deletar.php?cd_ajuste=".$cd_ajuste."')><em class='fa fa-trash'></em></a>
        				<a class='btn btn-info modalView' href='#view_prod' data-id=".$cd_ajuste." data-toggle='modal' data-target='#view_prod'><em class='fa fa-eye' aria-hidden='true'></em></a>");
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

		public function update($InputData, $InputJustificativa, $Id){

			include("dbconnect.php");

			$query = "UPDATE Ajuste SET dt_ajuste = ?, ds_justificativa = ? WHERE cd_ajuste = ?";

			$stmt = $db_conn->prepare($query);

			$stmt->bind_param("ssi", $InputData, $InputJustificativa, $Id);

			if($stmt->execute()) {
			$stmt->close();
			$db_conn->close();
			echo '<script>window.location="painel_list_ajuste.php?lista=7&pagina=1";</script>';
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

			$query = "DELETE FROM Ajuste WHERE cd_ajuste = ?";

			$stmt = $db_conn->prepare($query);
			$stmt->bind_param("i", $Id);

			if($stmt->execute()) {
			$stmt->close();
			$db_conn->close();
			echo '<script>window.location="painel_list_ajuste.php?lista=7&pagina=1";</script>';
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

