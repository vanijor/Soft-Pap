<?php
    error_reporting(0);
    ini_set('display_errors', 0);
    // Entrada -> produto, quantidade do produto (usuário)
                // venda, e valor (sistema)
    include("dbconnect.php");

    // INSTANCIANDO PRODUTO
    require_once("classes/produto.php");
    $produto = new produto();
    // INSTANCIANDO VENDA
    require_once("classes/venda.php");
    $venda = new venda();
    // INSTANCIANDO COMPRA-PRODUTO
    require_once("classes/produtovenda.php");
    $produtovenda = new produtovenda();


    /*
    1 O usuário define a quantidade
    2 O usuário define o código do produto
        ---> Adicionar tipo de pagamento (DEPOIS)
    3 O sistema procura a ultima venda
    4 O sistema procura os dados do produto
    5 O sistema insere o produto na tabela de produtos vendidos 
    RN: Assim que o ultimo dígito do código de produto é digitado (Submit no formulario)
       ---> O sistema atualiza os campos com o preço unitário, total e a descrição do produto. (DEPOIS)
    O sistema atualiza a tabela com o novo produto vendido

    F8 Cria uma nova venda
    */

    // PASSO 1
    if(isset($_POST['Quantidade'])){
    $qt_produto = $_POST['Quantidade'];
    }
    // PASSO 2
    if(isset($_POST['Codigo'])){
    $CodBarra = $_POST['Codigo'];
    }
    // DATA, TIPO DE PAGAMENTO E USUARIO, PARA INSERIR NA TABELA PRODUTOS VENDIDOS (DEPOIS)
    $Data = date('Y/m/d', time());
    $Pagamento = "CARTAO"; // $_POST['Pagamento'];
    $Usuario = 1; // $_SESSION['ID'];

/*
    echo $CodBarra;
    echo "<br>";
    echo $qt_produto;
    echo "<br>";
    echo $Pagamento;
    echo "<br>";
    echo $Usuario;
    

/*
        // PASSO 3
        $query = "SELECT MAX(cd_venda) FROM Venda";
            $stmt->prepare($query);
            if ($stmt->execute()){
                $stmt->bind_result($cd_venda);
            }
            while($stmt->fetch()) {
            }

        echo "<br>";
        echo $cd_venda;

        // PASSO 4 
        
        $query = "SELECT cd_produto, nm_produto, cd_codbarra, ds_produto, qt_produto, vl_produto, ds_categoria FROM Produto
            WHERE cd_codbarra LIKE ?";

        $stmt->prepare($query);
        $stmt->bind_param("i", $CodBarra);

        if($stmt->execute()) {
            $stmt->bind_result($cd_produto, $nm_produto, $cd_codbarra, $ds_produto, $qt_total, $vl_produto, $ds_categoria);
        }

        while($stmt->fetch()) {
        }
            
        echo "<br>";
        printf($cd_produto . "<br>" . $nm_produto . "<br>" . $cd_codbarra . "<br>" . $ds_produto . "<br>" . $qt_total . "<br>" . $vl_produto . "<br>" . $ds_categoria);

        // PASSO 5
            $query = "INSERT INTO Produto_has_venda (Produto_cd_produto, Venda_cd_venda, nm_produto, vl_produto, qt_produto) VALUES (?,?,?,?,?)";

            $stmt->prepare($query);
            $stmt->bind_param("iisdi", $cd_produto, $cd_venda, $nm_produto, $vl_produto, $qt_produto);
            
            if ($stmt->execute()){
            }
            
/*
        function deletar($cd_venda){
            $query = "DELETE FROM Produto_has_venda WHERE Venda_cd_venda = ?";

            $stmt = $db_conn->prepare($query);
            $stmt->bind_param("i", $cd_venda);
            $stmt->execute();
        }
*/
?>
