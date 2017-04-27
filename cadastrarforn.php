<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

    # INSTANCIANDO fornecedor
    require_once("classes/fornecedor.php");
    $fornecedor = new fornecedor();

    # CONEXÃO COM O BANCO
	$conn = mysqli_connect("mysql.hostinger.com.br","u573658764_dsa","labes123","u573658764_papel") or
    die("Não foi possível conectar:" . mysqli_connect_errno());


    # RECEBENDO VALORES DO FORMULÁRIO
    if (isset($_POST["CreateForn"])) { 
        $NomeForn = $_POST['Nome'];
        $CnpjForn = $_POST['CPNJ'];
        $TelForn = $_POST['Telefone'];
        $EnderecoForn = $_POST['Endereco'];
        $EmailForn = $_POST['Email'];
    }

    if (isset($CpnjForn)){

        # SELECT COMPARANDO LOGIN COM BANCO
        $query = "SELECT * FROM Fornecedor WHERE cd_cnpj_fornecedor = ?";

        # PREPARE QUERY -> VERIFICAÇÃO
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $CnpjForn);
        $stmt->execute();

        print_r(mysqli_error($conn));

        # VERIFICANDO SE USUÁRIO JÁ ESTÁ CADASTRADO
        $stmt->store_result();
        $numrows = $stmt->num_rows;

        if($numrows >= 1){
            echo "Fornecedor já cadastrado";
        } else {
            # QUERY - INSERIR DADOS
            $query = "INSERT INTO Fornecedor (cd_cnpj_fornecedor, nm_fornecedor, ds_endereco_fornecedor, cd_tel_fornecedor, ds_email) VALUES (?,?,?,?,?)";
            # PREPARE QUERY -> CADASTRO
            $stmt = $conn->prepare($query);

            # BIND - PREENCHE OS DADOS
            $stmt->bind_param("issis", $CnpjForn, $NomeForn, $EnderecoForn, $TelForn, $EmailForn);

            # EXECUTE - EXECUTA A QUERY
            $stmt->execute();

            print_r(mysqli_error($conn));

            printf("%d Row inserted.\n", $stmt->affected_rows);
            
             if ($result) {
              echo "Seu cadastro foi realizado com sucesso";

            # ATRIBUINDO AO OBJETO fornecedor
            $fornecedor->setCnpj($CnpjForn);
            $fornecedor->setNome($NomeForn);
            $fornecedor->setTelefone($TelForn);
            $fornecedor->setEndereco($EnderecoForn);
            $fornecedor->setEmail($EmailForn);

            # FECHANDO STATEMENT E CONEXÃO BD
            $stmt->close();
            mysqli_close($conn);
        

        echo '<script>window.location="painel.php";</script>';
        } else {
          echo "Não foi possível realizar o cadastro, tente novamente.";
          // Exibe dados sobre o erro:
          echo "Dados sobre o erro: " . mysqli_error($conn);

        }
    }
}

?>
