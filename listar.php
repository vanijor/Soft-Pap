<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

    # INSTANCIANDO PESSOA
    require_once("classes\pessoa.php");
    $pessoa = new pessoa();

    # MONTANDO ESTRUTURA DA TABELA
        printf("<table class='table'>
       	       <tr>");
        printf("<th>ID</th>");
        printf("<th>Nome</th>");
        printf("<th>RG</th>");
        printf("<th>CPF</th>");
        printf("<th>TELEFONE</th>");
        printf("<th>ENDEREÇO</th>");
        printf("<th>SALARIO</th>");
        printf("<th>ADMIN</th>");
        printf("<th>COMANDOS</th>");
        printf("</tr>");

    $pessoa->select();
?>



