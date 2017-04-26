<?php

    # INSTANCIANDO PESSOA
    require_once("classes/pessoa.php");
    $pessoa = new pessoa();

    # CONEXÃO COM O BANCO
	$conn = mysqli_connect("localhost","root","","u573658764_papel") or
    die("Não foi possível conectar:" . mysqli_connect_errno());


    # RECEBENDO VALORES DO FORMULÁRIO
    if (isset($_POST["CreateUser"])) { 
        $Nome = $_POST['Nome'];
        $Telefone = $_POST['Telefone'];
        $Endereco = $_POST['Endereco'];
        $Salario = $_POST['Salario'];
        $Login = $_POST['Login'];
        $Senha = $_POST['Senha'];
        $RG = $_POST['RG'];
        $Cpf = $_POST['Cpf'];
        $Adm = isset($_POST['Adm']);
    }

    if (isset($Login, $Cpf)){

        # SELECT COMPARANDO LOGIN COM BANCO
        $query = "SELECT * FROM pessoa WHERE cd_login = ? OR cd_cpf = ?";

        # PREPARE QUERY -> VERIFICAÇÃO
        $stmt = $conn->prepare($query);
        $stmt->bind_param("si", $Login, $Cpf);
        $stmt->execute();

        # VERIFICANDO SE USUÁRIO JÁ ESTÁ CADASTRADO
        $stmt->store_result();
        $numrows = $stmt->num_rows;

        if($numrows >= 1){
            echo "Usuário já cadastrado";
        } else {
            # QUERY - INSERIR DADOS
            $query = "INSERT INTO pessoa (nm_nome, cd_telefone, ds_endereco, vl_salario, cd_login, cd_senha, cd_rg, cd_cpf, cd_adm) VALUES (?,?,?,?,?,?,?,?,?)";
            # PREPARE QUERY -> CADASTRO
            $stmt = $conn->prepare($query);

            # BIND - PREENCHE OS DADOS
            $stmt->bind_param("sisdssiii", $Nome, $Telefone, $Endereco, $Salario, $Login, $Senha, $RG, $Cpf, $Adm);
            # EXECUTE - EXECUTA A QUERY
            $stmt->execute();
            printf("%d Row inserted.\n", $stmt->affected_rows);
            
            if ($result) {
              echo "Seu cadastro foi realizado com sucesso";

            # ATRIBUINDO AO OBJETO PESSOA
            $pessoa->setNome($Nome);
            $pessoa->setTelefone($Telefone);
            $pessoa->setEndereco($Endereco);
            $pessoa->setSalario($Salario);
            $pessoa->setLogin($Login);
            $pessoa->setSenha($Senha);
            $pessoa->setRG($RG);
            $pessoa->setAdm($Adm);
            $pessoa->setCpf($Cpf);

            # FECHANDO STATEMENT E CONEXÃO BD
            $stmt->close();
            mysqli_close($conn);
        

        echo '<script>window.location="painel.php";</script>';
        } else {
          echo "Não foi possível realizar o cadastro, tente novamente.";
          // Exibe dados sobre o erro:
          echo "Dados sobre o erro: " . mysqli_error();

        }
    }
}

?>
