   <?php
   
    # CONEXÃO COM O BANCO
	$conn = mysqli_connect("mysql.hostinger.com.br","u573658764_dsa","labes123","u573658764_papel") or
    die("Não foi possível conectar:" . mysqli_connect_errno());

    # RECEBE O ID DA PESSOA POR GET
	$pessoa = $_GET['cd_pessoa'];
	
	# QUERY PARA DELETAR
	$query = "DELETE FROM Pessoa WHERE cd_pessoa = ?";

	# PREPARE QUERY -> VERIFICAÇÃO
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $pessoa);
    $stmt->execute();

	
    $stmt->close();
    mysqli_close($conn);
    
	echo '<script>window.location="painel_list_user.php";</script>';
	?>