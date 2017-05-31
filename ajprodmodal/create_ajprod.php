<div class="modal fade" id="create_ajprod" style="margin-top:50px;" role="dialog">
    <div class="modal-dialog">
    <div class="modal-content">

    <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Cadastrar Ajuste</h4>
    </div>

        <div class="modal-body">
            <center> 
            <div class="wrap">
                <select name="Ajuste" form="CreateAjusteProduto" class="custom-select form-control">
                    <?php

                    include("dbconnect.php");

                    $query = "SELECT cd_ajuste FROM Ajuste";

                    $stmt = $db_conn->prepare($query);
                    if($stmt->execute()) {
                        $stmt->bind_result($cd_ajuste);

                        while($stmt->fetch()) {
                        printf("<option value=". $cd_ajuste .">". $cd_ajuste ."</option>");
                        } 
                    }
                    ?>
                </select>
            </div>
            <div class="wrap">
                <select name="Produto" form="CreateAjusteProduto" class="custom-select form-control">
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
        <form name="CreateajusteProduto" id="CreateAjusteProduto" method='post'>
            <div class="row Prod">
                <center>               
                    <div class="form-group">
                        <input type="text"
                        class="form-control input-lg"
                        placeholder="Quantidade"
                        name="Quantidade" />
                    </div>
                    <button type="submit" name="CreateAjprod" class="btn btn-create btn-lg btn-block" value="CreateAjprod"><span class="glyphicon glyphicon-ok"></span> Cadastrar </button>
                </center> 
            </div>

            <?php
            include_once("cadastrar.php");
            ?>

        </form>
        </div>
    </div>
    </div>
</div>