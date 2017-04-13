<?php
    # INSTANCIANDO PESSOA
    require_once("classes/pessoa.php");
    $pessoa = new pessoa();

    # CONEXÃO COM O BANCO
	mysql_connect("localhost","root","") or
    die("Não foi possível conectar:" . mysql_error());
	mysql_select_db("u573658764_papel");

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
            $query = mysql_query("SELECT * FROM pessoa WHERE
            cd_login = '".$Login."'
            OR
            cd_cpf = '".$Cpf."'
            ");
    
            # VERIFICANDO TODAS AS LINHAS PARA ENCONTRAR USUÁRIO
            $result = mysql_num_rows($query);
            if($result >= 1){
                echo "Usuário já cadastrado";
            } else {
            # INSERÇÃO NO BANCO DE DADOS
            $vSQL = "INSERT INTO `pessoa` 
            (`nm_nome`, `cd_telefone`, `ds_endereco`, `vl_salario`,`cd_login`,`cd_senha`,`cd_rg`,`cd_cpf`,`cd_adm`)  
            VALUES 
            ('".$Nome."', '".$Telefone."', '".$Endereco."', '".$Salario."', '".$Login."', '".$Senha."','".$RG."','".$Cpf."','".$Adm."')";
    
            $result = mysql_query($vSQL);
            if ($result) {
              echo "Seu cadastro foi realizado com sucesso";

            # INSTANCIANDO OBJETO pessoa
            $pessoa->setNome($Nome);
            $pessoa->setTelefone($Telefone);
            $pessoa->setEndereco($Endereco);
            $pessoa->setSalario($Salario);
            $pessoa->setLogin($Login);
            $pessoa->setSenha($Senha);
            $pessoa->setRG($RG);
            $pessoa->setAdm($Adm);
            $pessoa->setCpf($Cpf);
            
            /* RN - Quem cadastra não é o usuário, sendo assim, não grava Cookies e Session do cadastro.
            setcookie ("Usuario", $pessoa->getLogin(), 3000);
            setcookie ("Senha", $pessoa->getSenha(), 3000);
            $_SESSION["ADM"] = $pessoa->getAdm();
            $_SESSION["Nome"] = $pessoa->getNome();
            */

        } else {
          echo "Não foi possível realizar o cadastro, tente novamente.";
          // Exibe dados sobre o erro:
          echo "Dados sobre o erro: " . mysql_error();
        }
    }
}

?>
