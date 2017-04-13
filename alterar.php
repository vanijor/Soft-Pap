<?php
   
    # CONEXÃO COM O BANCO
	mysql_connect("localhost","root","") or
    die("Não foi possível conectar:" . mysql_error());
	mysql_select_db("u573658764_papel");
    
    # RECEBE O ID DA PESSOA POR GET
	$pessoa = $_GET['cd_pessoa'];

    # RECEBENDO VALORES DO FORMULARIO 

	if (isset($_POST["AlterUser"])) { 
        $Nome = $_POST['Nome'];
        $Telefone = $_POST['Telefone'];
        $Endereco = $_POST['Endereco'];
        $Salario = $_POST['Salario'];
        $Login = $_POST['Login'];
        $Senha = $_POST['Senha'];
        $RG = $_POST['RG'];
        $Cpf = $_POST['Cpf'];
        $Adm = isset($_POST['Adm']);
	
	# QUERY PARA ALTERAR
	$vSQL = "UPDATE pessoa SET (nm_nome = '$Nome', cd_telefone = '$Telefone') WHERE cd_pessoa = ". $pessoa. "";


/*
	if (isset($Nome)){
		$vSQL .= "'".$Nome."',";
	}
	if (isset($Telefone)){
		$vSQL .= "'".$Telefone."',";
	}
	if (isset($Endereco)){
		$vSQL .= "'".$Endereco."',";
	}
	if (isset($Salario)){
		$vSQL .= "'".$Salario."',";
	}
	if (isset($Login)){
		$vSQL .= "'".$Login."',";
	}
	if (isset($Senha)){
		$vSQL .= "'".$Senha."',";
	}
	if (isset($RG)){
		$vSQL .= "'".$RG."',";
	}
	if (isset($Cpf)){
		$vSQL .= "'".$Cpf."',";
	}
	if (isset($Adm)){
		$vSQL .= '".$Adm."';
	}

    $vSQL .= ")";
    */


	echo "SQL: " . $vSQL;
	$result = mysql_query($vSQL);
	echo "Dados sobre o erro: " . mysql_error();

	/*		echo '<script>window.location="painel.php";</script>';
			mysql_free_result($result);
	*/
}

?>