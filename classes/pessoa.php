<?php
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

		public function getNome(){
			return $this->Nome;
		}
		public function setNome($Nome){
			$this->Nome = $Nome;
		}

		public function getTelefone(){
			return $this->Telefone;
		}
		public function setTelefone($Telefone){
			$this->Telefone = $Telefone;
		}

		public function getEndereco(){
			return $this->Endereco;
		}
		public function setEndereco($Endereco){
			$this->Endereco = $Endereco;
		}

		public function getSalario(){
			return $this->Salario;
		}
		public function setSalario($Salario){
			$this->Salario = $Salario;
		}

		public function getLogin(){
			return $this->Login;
		}
		public function setLogin($Login){
			$this->Login = $Login;
		}

		public function getSenha(){
			return $this->Senha;
		}
		public function setSenha($Senha){
			$this->Senha = $Senha;
		}

		public function getRG(){
			return $this->RG;
		}
		public function setRG($RG){
			$this->RG = $RG;
		}

		public function getAdm(){
			return $this->Adm;
		}
		public function setAdm($Adm){
			$this->Adm = $Adm;
		}

				public function getCpf(){
			return $this->Cpf;
		}
		public function setCpf($Cpf){
			$this->Cpf = $Cpf;
		}
	}
?>