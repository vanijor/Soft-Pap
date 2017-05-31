<div class="modal fade" id="create_compra" style="margin-top:50px;" role="dialog">
    <div class="modal-dialog">
    <div class="modal-content">

    <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Cadastrar Compra</h4>
    </div>
    
        <div class="modal-body">
        <center>
            <div class="wrap">
                <select name="Fornecedor" form="CreateCompras" class="custom-select form-control">
                    <?php

                    include("dbconnect.php");

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
        <form name="CreateCompras" id="CreateCompras" method='post'>
            <center>
            <div class="Prod">
                    <?php if (1 == 1){
                        ?>
                    <div class="form-group">
                        <input type="hidden" 
                        class="form-control input-lg"
                        placeholder="Data" 
                        name="Data" 
                        value="<?= date('Y/m/d', time()); ?>"
                        required />
                    </div>

                    <div class="form-group">
                        <input type="text"
                        class="form-control input-lg"
                        placeholder="Pagamento"
                        name="Pagamento"
                        required />
                    </div>

                    <button type="submit" name="CreateCompra" class="btn btn-create btn-lg btn-block" value="CreateCompra"><span class="glyphicon glyphicon-ok"></span> Cadastrar </button>
            </div>
            </center>

            <?php
            }
            include_once("cadastrar.php");
            ?>

        </form>
        </div>
    </div>
    </div>
</div>