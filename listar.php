<?php

    # CONEXÃO COM O BANCO
	mysql_connect("localhost","root","") or
    die("Não foi possível conectar:" . mysql_error());
	mysql_select_db("u573658764_papel");
  
	# CONSULTA NO BANCO
	$result = mysql_query("SELECT cd_pessoa, nm_nome, cd_telefone, ds_endereco, vl_salario, cd_rg, cd_cpf, cd_adm 
							FROM pessoa");

	# MONTANDO ESTRUTURA DA TABELA
       printf("<table class="."table".">
       	       <tr>");
       printf("<th>ID</th>");
       printf("<th>Nome</th>");
       printf("<th>Telefone</th>");
       printf("<th>Endereço</th>");
       printf("<th>Salário</th>");
       printf("<th>RG</th>");
       printf("<th>CPF</th>");
       printf("<th>Admin</th>");
       printf("<th>Comandos</th>");
       printf("</tr>");

    # EXIBINDO LINHAS DA TABELA
	while($row=mysql_fetch_array($result,MYSQL_ASSOC)) 
    {
       printf("<tr>");

	   printf("<td>" .
	   	$row["cd_pessoa"]
	    . "</td><td>" . 
	   	$row["nm_nome"]
	    . "</td><td>" . 
	    $row["cd_telefone"]
	    . "</td><td>" . 
	     $row["ds_endereco"]
	    . "</td><td>" . 
	    $row["vl_salario"]
	    . "</td><td>" . 
	     $row["cd_rg"]
	    . "</td><td>" .
	    $row["cd_cpf"]
	    . "</td><td>" .
	    $row["cd_adm"]
	    . "</td><td>" .
		"<button onClick="."confirmarDelete(".$row['cd_pessoa'].")"."> APAGAR </button>"
		. " | " .
		"<button onClick="."alterar(".$row['cd_pessoa'].")"."> ALTERAR </button>"
	    );


	   printf("</tr>");
	} 

	mysql_free_result($result);

	# MODAL DO JORGE
	# <a href="#myModal" data-toggle="modal" >

	#	DELETE SEM CONFIRMAÇÃO
	#        "<a href=deletar.php?cd_pessoa="
	#		 . $row["cd_pessoa"]  . "> APAGAR </a>"


	?>



