<?php

    # INSTANCIANDO PESSOA
    require_once("classes/pessoa.php");
    $pessoa = new pessoa();

    # CONEXÃO COM O BANCO
	$conn = mysqli_connect("mysql.hostinger.com.br","u573658764_dsa","labes123","u573658764_papel") or
    die("Não foi possível conectar:" . mysqli_connect_errno());

    # RECEBE O ID DA PESSOA POR GET
    $Pessoa = $_GET['cd_pessoa'];

    echo $Pessoa;
    
    # RECEBENDO VALORES DO FORMULARIO 
	if (isset($_POST["AlterUser"])) { 
        $Nome = $_POST['AltNome'];
        $Telefone = $_POST['AltTelefone'];
        $Endereco = $_POST['AltEndereco'];
        $Salario = $_POST['AltSalario'];
        $Login = $_POST['AltLogin'];
        $Senha = $_POST['AltSenha'];
        $RG = $_POST['AltRG'];
        $Cpf = $_POST['AltCpf'];
        $Adm = isset($_POST['Adm']);
	
	# QUERY PARA ALTERAR
	$query = "UPDATE Pessoa SET nm_nome = ?, cd_telefone = ?, ds_endereco = ?, vl_salario = ?, cd_login = ?, cd_senha = ?, cd_rg = ?, cd_cpf = ?, cd_adm = ? WHERE cd_pessoa = ?";

	# PREPARE QUERY 
    $stmt = $conn->prepare($query);
    # BINDAR PARAMETROS
    $stmt->bind_param("sisdssiiii", $Nome, $Telefone, $Endereco, $Salario, $Login, $Senha, $RG, $Cpf, $Adm, $Pessoa);
    # EXECUTE QUERY
	$stmt->execute();

    $stmt->close();
    mysqli_close($conn);

 echo '<script>window.location="painel_list_user.php";</script>';
	} else {
	echo "Dados sobre o erro: " . mysqli_error($conn);
}

?>