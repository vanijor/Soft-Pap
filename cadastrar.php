<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

    # INSTANCIANDO PESSOA
    require_once("classes/pessoa.php");
    $pessoa = new pessoa();

    # RECEBENDO VALORES DO FORMULÁRIO
    if (isset($_POST["CreateUser"])) { 
        $Nome = $_POST['Nome'];
        $Telefone = $_POST['Telefone'];
        $Endereco = $_POST['Endereco'];
        $Salario = $_POST['Salario'];
        $Login = $_POST['Login'];
        $Senha = $_POST['Senha'];
        $RG = $_POST['RG'];
        $Cpf = $_POST['Cpf'];
        $Adm = isset($_POST['Adm']);
    }

    if (isset($Login, $Cpf)){
        $pessoa->insert($Nome, $Telefone, $Endereco, $Salario, $Login, $Senha, $RG, $Cpf, $Adm);
    }
?>