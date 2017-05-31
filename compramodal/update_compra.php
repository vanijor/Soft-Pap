<?php
error_reporting(0);
ini_set('display_errors', 0);

include("../dbconnect.php");

if(isset($_GET['cd_compra'])){
    $Id = $_GET['cd_compra'];

?>

    <div class="modal-dialog">
    <div class="modal-content">

    <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Alterar Compra</h4>
    </div>
<!-- ALTERAÇÃO DE USUARIO -->
        <div class="modal-body" style="padding-left:0px; padding-right:0px;">
            <div class="row Compra">
            <center>
            <div class="wrap">
                <select name="AltFornecedor" form="UpdateCompras" class="custom-select form-control">
                    <?php

                    $query = "SELECT cd_fornecedor, nm_fornecedor FROM Fornecedor";

                    $stmt = $db_conn->prepare($query);
                    if($stmt->execute()) {
                        $stmt->bind_result($cd_forn, $nome_forn);

                        while($stmt->fetch()) {
                          printf("<option value=". $cd_forn .">". $nome_forn ."</option>");
                        } 
                    }
                    ?>
                </select>
                </div>
            </center>
            </div>
        <form name="UpdateCompras" id="UpdateCompras" method='post' action="alterar.php">
            <center>
            <div class="Compras">
                <?php 
                $query = "SELECT dt_compra, ds_pagamento_compra FROM Compra WHERE cd_compra = ?";
                    $stmt = $db_conn->prepare($query);
                    $stmt->bind_param("i", $Id);
                    $stmt->execute();
                    $stmt->bind_result($dt_compra, $ds_pagamento);

                    while($stmt->fetch()) {
                ?>
                    <input type="hidden" name="AltId" value="<?= $Id; ?>" required />
                    
                    <div class="form-group">
                        <input type="hidden" 
                        class="form-control input-lg"
                        placeholder="Data" 
                        name="AltData"
                        value="<?= $dt_compra; ?>" 
                        required />
                    </div>

                    <div class="form-group">
                        <input type="text"
                        class="form-control input-lg"
                        placeholder="Pagamento"
                        name="AltPagamento"
                        value="<?= $ds_pagamento; ?>"
                        required />
                    </div>

                    <button type="submit" name="UpdateCompra" class="btn btn-create btn-lg btn-block" value="UpdateCompra"><span class="glyphicon glyphicon-ok"></span> Alterar </button>
            </div>
            </center>
            </div>

        </form>
        <?php }
        }
        ?>      
        </div>
    </div>
    </div>