<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
    # INSTANCIANDO PESSOA
    require_once("classes/pessoa.php");
    $pessoa = new pessoa();

    # RECEBE O ID DA PESSOA POR GET
	$Id = $_GET['cd_pessoa'];
	
	$pessoa->delete($Id);
	?>