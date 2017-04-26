<?php

  # INSTANCIANDO PESSOA
  require_once("classes/pessoa.php");
  $pessoa = new pessoa();

    # CONEXÃO COM O BANCO
	$conn = mysqli_connect("localhost","root","","u573658764_papel") or
    die("Não foi possível conectar:" . mysqli_connect_errno());
  
	# CONSULTA NO BANCO
    $query = "SELECT cd_pessoa, nm_nome, cd_telefone, ds_endereco, vl_salario, cd_rg, cd_cpf, cd_adm FROM pessoa";

    # PREPARE QUERY -> VERIFICAÇÃO
    $stmt = $conn->prepare($query);
    # EXECUTE QUERY
	if($stmt->execute()) {
    # GUARDANDO RESULTADO
    $result = $stmt->get_result();
	}

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
	while($row=mysqli_fetch_array($result)) 
    {
        printf("<tr>");

	    printf("<td>" .
	   	$row["cd_pessoa"]
	    . "</td><td>" . 
	   	$row["nm_nome"]
	    . "</td><td>" . 
	    $row["cd_telefone"]
	    . "</td><td>" . 
	     $row["ds_endereco"]
	    . "</td><td>" . 
	    $row["vl_salario"]
	    . "</td><td>" . 
	     $row["cd_rg"]
	    . "</td><td>" .
	    $row["cd_cpf"]
	    . "</td><td>" .
	    $row["cd_adm"]
	    . "</td><td>" .
		"<button onClick="."confirmarDelete(".$row['cd_pessoa'].")"."> APAGAR </button>"
		. " | " .
		"<button id="."setModalData("
      .$row['cd_pessoa'].")> ALTERAR </button>"
      #.","
      #."$row[nm_nome]".","
      #.$row['cd_telefone'].","
      #.$row['ds_endereco'].","
      #.$row['vl_salario'].","
      #.$row['cd_rg'].","
      #.$row['cd_cpf'].","
      #.$row['cd_adm'].
      
	    
      );

	printf("</tr>");

	} 

  while ($row=mysqli_fetch_array($result)) {
  
      $Pessoa->setNome($result['nm_nome']);
      $Pessoa->setTelefone($result['cd_telefone']);
      $Pessoa->setEndereco($result['ds_endereco']);
      $Pessoa->setSalario($result['vl_salario']);
      $Pessoa->setLogin($result['cd_login']);
      $Pessoa->setSenha($result['cd_senha']);
      $Pessoa->setRG($result['cd_rg']);
      $Pessoa->setAdm($result['cd_adm']);
      $Pessoa->setCpf($result['cd_cpf']);

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



