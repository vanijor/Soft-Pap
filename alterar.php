<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

    # INSTANCIANDO PESSOA
    require_once("classes/pessoa.php");
    $pessoa = new pessoa();
    
    # RECEBENDO VALORES DO FORMULARIO 
	if (isset($_POST["UpdateUser"])) {
        $Id = $_POST['AltId'];
        $Nome = $_POST['AltNome'];
        $Telefone = $_POST['AltTelefone'];
        $Endereco = $_POST['AltEndereco'];
        $Salario = $_POST['AltSalario'];
        $Login = $_POST['AltLogin'];
        $Senha = $_POST['AltSenha'];
        $RG = $_POST['AltRG'];
        $Cpf = $_POST['AltCpf'];
        $Adm = isset($_POST['AltAdm']);
        
    $pessoa->update($Nome, $Telefone, $Endereco, $Salario, $Login, $Senha, $RG, $Cpf, $Adm, $Id);
    }
?>