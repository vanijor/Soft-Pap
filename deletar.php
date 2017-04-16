   <?php
   
    # CONEXÃO COM O BANCO
	$conn = mysqli_connect("localhost","root","","u573658764_papel") or
    die("Não foi possível conectar:" . mysqli_connect_errno());

    # RECEBE O ID DA PESSOA POR GET
	$pessoa = $_GET['cd_pessoa'];
	
	# QUERY PARA DELETAR
	$query = "DELETE FROM pessoa WHERE cd_pessoa = ?";

	# PREPARE QUERY -> VERIFICAÇÃO
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $pessoa);
    $stmt->execute();

	
    $stmt->close();
    mysqli_close($conn);
    
	echo '<script>window.location="painel.php";</script>';
	?>