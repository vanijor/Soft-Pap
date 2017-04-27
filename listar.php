<?php

  # INSTANCIANDO PESSOA
  require_once("classes/pessoa.php");
  $pessoa = new pessoa();

    # CONEXÃO COM O BANCO
	$conn = mysqli_connect("mysql.hostinger.com.br","u573658764_dsa","labes123","u573658764_papel") or
    die("Não foi possível conectar:" . mysqli_connect_errno());
  
	# CONSULTA NO BANCO
    $query = "SELECT cd_pessoa, nm_nome, cd_telefone, ds_endereco, vl_salario, cd_rg, cd_cpf, cd_adm FROM Pessoa";

    # PREPARE QUERY -> VERIFICAÇÃO
    $stmt = $conn->prepare($query);
    # EXECUTE QUERY

	if($stmt->execute()) {
    # VERIFICA ERROS
    print_r(mysqli_error($conn));
	}
    # GUARDANDO RESULTADO
    $stmt->bind_result($cd_pessoa, $nm_nome, $cd_telefone, $ds_endereco, $vl_salario, $cd_rg, $cd_cpf, $cd_adm);

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
	while($stmt->fetch()) 
    {
        printf("<tr>");

	    printf("<td>" .
	   	$cd_pessoa
	    . "</td><td>" . 
	   	$nm_nome
	    . "</td><td>" . 
	    $cd_telefone
	    . "</td><td>" . 
	    $ds_endereco
	    . "</td><td>" . 
	    $vl_salario
	    . "</td><td>" . 
	    $cd_rg
	    . "</td><td>" .
	    $cd_cpf
	    . "</td><td>" .
	    $cd_adm
	    . "</td><td>" .
		"<button onClick="."confirmarDelete(".$cd_pessoa.")> APAGAR </button>"
		. " | " .
		"<button onClick="."sendEditData("
      .$cd_pessoa.","
      .$cd_telefone.","
      .$vl_salario.","
      .$cd_rg.","
      .$cd_cpf.
      ")"."> ALTERAR </button>"
	    
      );

	printf("</tr>");

	} 

  while ($stmt->fetch()) {
  
      $Pessoa->setNome($nm_nome);
      $Pessoa->setTelefone($cd_telefone);
      $Pessoa->setEndereco($ds_endereco);
      $Pessoa->setSalario($vl_salario);
      $Pessoa->setLogin($cd_login);
      $Pessoa->setSenha($cd_senha);
      $Pessoa->setRG($cd_rg);
      $Pessoa->setAdm($cd_adm);
      $Pessoa->setCpf($cd_cpf);

      $_SESSION["AltNome"] = $Pessoa->getNome();
      $_SESSION["AltTelefone"] = $Pessoa->getTelefone();
      $_SESSION["AltEndereco"] = $Pessoa->getEndereco(); 
      $_SESSION["AltSalario"] = $Pessoa->getSalario();
      $_SESSION["AltRG"] = $Pessoa->getRG();
      $_SESSION["AltCpf"] = $Pessoa->getCpf();
      $_SESSION["AltAdm"] = $Pessoa->getAdm();

    }

	  $stmt->close();
    mysqli_close($conn);

?>



