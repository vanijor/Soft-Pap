<?php
    # INSTANCIANDO PESSOA
    require_once("classes/pessoa.php");
    $pessoa = new pessoa();

    # CONEXÃO COM O BANCO
	$conn = mysqli_connect("localhost","root","","u573658764_papel") or
    die("Não foi possível conectar:" . mysqli_connect_errno());
    
    # RECEBE O ID DA PESSOA POR GET
	$Pessoa = $_GET['cd_pessoa'];

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
	$query = "UPDATE pessoa SET nm_nome = ?, cd_telefone = ?, ds_endereco = ?, vl_salario = ?, cd_login = ?, cd_senha = ?, cd_rg = ?, cd_cpf = ?, cd_adm = ? WHERE cd_pessoa = ?";

	# PREPARE QUERY 
    $stmt = $conn->prepare($query);
    # BINDAR PARAMETROS
    $stmt->bind_param("sisdssiiii", $Nome, $Telefone, $Endereco, $Salario, $Login, $Senha, $RG, $Cpf, $Adm, $Pessoa);
    # EXECUTE QUERY
	$stmt->execute();


	
	echo "Dados sobre o erro: " . mysql_error();
}

?>