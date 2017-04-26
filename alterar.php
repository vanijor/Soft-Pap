<?php

    # INSTANCIANDO PESSOA
    require_once("classes/pessoa.php");
    $pessoa = new pessoa();

    # CONEXÃO COM O BANCO
	$conn = mysqli_connect("localhost","root","","u573658764_papel") or
    die("Não foi possível conectar:" . mysqli_connect_errno());
    
    # RECEBENDO VALORES DO FORMULARIO 
	if (isset($_POST["AlterUser"])) { 
        $Pessoa = $_POST['id'];
        $AltNome = $_POST['Nome'];
        $AltTelefone = $_POST['Telefone'];
        $AltEndereco = $_POST['Endereco'];
        $AltSalario = $_POST['Salario'];
        $AltLogin = $_POST['Login'];
        $AltSenha = $_POST['Senha'];
        $AltRG = $_POST['RG'];
        $AltCpf = $_POST['Cpf'];
        $AltAdm = isset($_POST['Adm']);
	
	# QUERY PARA ALTERAR
	$query = "UPDATE pessoa SET nm_nome = ?, cd_telefone = ?, ds_endereco = ?, vl_salario = ?, cd_login = ?, cd_senha = ?, cd_rg = ?, cd_cpf = ?, cd_adm = ? WHERE cd_pessoa = ?";

	# PREPARE QUERY 
    $stmt = $conn->prepare($query);
    # BINDAR PARAMETROS
    $stmt->bind_param("sisdssiiii", $Nome, $Telefone, $Endereco, $Salario, $Login, $Senha, $RG, $Cpf, $Adm, $Pessoa);
    # EXECUTE QUERY
	$stmt->execute();

    echo '<script>window.location="painel.php";</script>';
	} else {
	echo "Dados sobre o erro: " . mysql_error();
}

?>