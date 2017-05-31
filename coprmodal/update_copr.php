<?php
error_reporting(0);
ini_set('display_errors', 0);

include("../dbconnect.php");

if(isset($_GET['cd_copr'])){
    $Id = $_GET['cd_copr'];

?>


    <div class="modal-dialog">
    <div class="modal-content">

    <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Alterar Produtos Comprados</h4>
    </div>
<!-- ALTERAÇÃO DE USUARIO -->
        <div class="modal-body" style="padding-left:15px; padding-right:15px;">
            <div class="row Copr">

            <center> 
            <div class="wrap">
                <select name="AltCompra" form="UpdateCoprs" class="custom-select form-control">
                    <?php

                    include("dbconnect.php");

                    $query = "SELECT cd_compra, Fornecedor_cd_fornecedor FROM Compra";

                    $stmt = $db_conn->prepare($query);
                    if($stmt->execute()) {
                        $stmt->bind_result($cd_compra, $cd_forn);

                        while($stmt->fetch()) {
                        printf("<option value=". $cd_compra .">". $cd_compra ."</option>");
                        } 
                    }
                    ?>
                </select>
            </div>
            <div class="wrap">
                <select name="AltProduto" form="UpdateCoprs" class="custom-select form-control">
                    <?php

                    $query = "SELECT cd_produto, nm_produto FROM Produto";

                    $stmt = $db_conn->prepare($query);
                    if($stmt->execute()) {
                        $stmt->bind_result($cd_prod, $nm_prod);

                        while($stmt->fetch()) {
                        printf("<option value=". $cd_prod .">". $nm_prod ."</option>");
                        } 
                    }
                    ?>
                </select>
            </div>
            </center> 
        <form name="UpdateCoprs" id="UpdateCoprs" method='post' action='alterar.php'>
            <div class="row" style="padding-left:15px; padding-right:15px;">
                <center>
                <?php
                $query = "SELECT qt_produto FROM Compra_has_produto
                    where cd_compra_has_produto = ?";
                    $stmt = $db_conn->prepare($query);
                    $stmt->bind_param("i", $Id);
                    $stmt->execute();
                    $stmt->bind_result($qt_produto);

                    while($stmt->fetch()) {
                ?>
                    <input type="hidden" name="AltId" value="<?= $Id; ?>" required />
                    <div class="form-group">
                        <input type="text"
                        class="form-control input-lg"
                        placeholder="Quantidade"
                        name="AltQuantidade"
                        value="<?= $qt_produto; ?>" 
                        />
                    </div>
                    <button type="submit" name="UpdateCopr" class="btn btn-create btn-lg btn-block" value="UpdateCopr"><span class="glyphicon glyphicon-ok"></span> Alterar </button>
                </center>
            </div>

        </form>
        <?php }
        }
        ?>      
        </div>
    </div>
    </div>
