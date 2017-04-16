<?php
session_start();

    # INSTANCIANDO PESSOA
    require_once("classes/pessoa.php");
    $Pessoa = new Pessoa();

    # CONEXÃO COM O BANCO
	$conn = mysqli_connect("localhost","root","","u573658764_papel") or
    die("Não foi possível conectar:" . mysqli_connect_errno());


	# RECEBENDO DADOS DO LOGIN
	$Login=$_POST["Login"];
	$Senha=$_POST["Password"];

	# QUERY - Procurar dados no banco
	$query = "SELECT * FROM pessoa WHERE cd_login = ? AND cd_senha = ?";

	$stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $Login, $Senha);

    # EXECUTE QUERY
	if($stmt->execute()) {
    # GUARDANDO RESULTADO
    $stmt->store_result();
	}

	$numrows = $stmt->num_rows;
	echo $numrows;
	if($numrows == 1){
		echo "Usuário encontrado";

	
	# INSTANCIANDO OBJETO - PESSOA
	while($row=mysqli_fetch_array($result)){
	
	    $Pessoa->setNome($result['nm_nome']);
	    $Pessoa->setTelefone($result['cd_telefone']);
	    $Pessoa->setEndereco($result['ds_endereco']);
	    $Pessoa->setSalario($result['vl_salario']);
	    $Pessoa->setLogin($result['cd_login']);
	    $Pessoa->setSenha($result['cd_senha']);
	    $Pessoa->setRG($result['cd_rg']);
	    $Pessoa->setAdm($result['cd_adm']);
	    $Pessoa->setCpf($result['cd_cpf']);
    }

	# COOKIES E SESSION
	$_SESSION["Nome"] = $Pessoa->getNome();
	$_SESSION["Telefone"] = $Pessoa->getTelefone();
	$_SESSION["Endereco"] = $Pessoa->getEndereco();	
	$_SESSION["Salario"] = $Pessoa->getSalario();
	setcookie ("Usuario", $Pessoa->getLogin(), 60);
	setcookie ("Senha", $Pessoa->getSenha(), 60);
	$_SESSION["RG"] = $Pessoa->getRG();
	$_SESSION["Cpf"] = $Pessoa->getCpf();
	$_SESSION["Adm"] = $Pessoa->getAdm();

echo '<script>window.location="painel.php";</script>';
}
else{
	echo "Usuário não encontrado";
}

?>