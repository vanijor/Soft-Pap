<?php
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

        public function getCnpj(){
			return $this->Cnpj;
		}
		public function setCnpj($Cnpj){
			$this->Cnpj = $Cnpj;
		}
        
		public function getNome(){
			return $this->Nome;
		}
		public function setNome($Nome){
			$this->Nome = $Nome;
		}
        
        public function getEndereco(){
			return $this->Endereco;
		}
		public function setEndereco($Endereco){
			$this->Endereco = $Endereco;
		}

		public function getTelefone(){
			return $this->Telefone;
		}
		public function setTelefone($Telefone){
			$this->Telefone = $Telefone;
		}

		public function getEmail(){
			return $this->Email;
		}
		public function setEmail($Email){
			$this->Email = $Email;
		}

		
		
	}
?>