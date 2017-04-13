   <?php
   
    # CONEXÃO COM O BANCO
	mysql_connect("localhost","root","") or
    die("Não foi possível conectar:" . mysql_error());
	mysql_select_db("u573658764_papel");
    
    # RECEBE O ID DA PESSOA POR GET
	$pessoa = $_GET['cd_pessoa'];
	
	# QUERY PARA DELETAR
	$vSQL = "DELETE FROM pessoa WHERE cd_pessoa = " . $pessoa;
	//echo "SQL: " . $vSQL;
	
	$result = mysql_query($vSQL);
	echo '<script>window.location="painel.php";</script>';
	?>