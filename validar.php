<?php
session_start();

    # INSTANCIANDO PESSOA
    require_once("classes/pessoa.php");
    $Pessoa = new Pessoa();

    # CONEXÃO COM O BANCO
	mysql_connect("localhost","root","") or
    die("Não foi possível conectar:" . mysql_error());
	mysql_select_db("u573658764_papel");

# RECEBENDO DADOS DO LOGIN
$Login=$_POST["Login"];
$Senha=$_POST["Password"];

# PROCURANDO DADOS NO BANCO
$query = mysql_query("SELECT * FROM Pessoa WHERE cd_login = '$Login' AND cd_senha = '$Senha'");

$result = mysql_num_rows($query);
if($result == 1){
	echo "usuario encontrado";
	
	# INSTANCIANDO OBJETO - PESSOA
	while ($result = mysql_fetch_assoc($query)) {
	
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


# NAO ESQUECER: Adicionar pagina	

echo '<script>window.location="painel.php";</script>';
}
else{
	echo "Usuário não encontrado";
}

?>