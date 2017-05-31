<div class="modal fade" id="create_copr" style="margin-top:50px;" role="dialog">
    <div class="modal-dialog">
    <div class="modal-content">

    <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Cadastrar Compra</h4>
    </div>

        <div class="modal-body">
            <center> 
            <div class="wrap">
                <select name="Compra" form="CreateCompraProduto" class="custom-select form-control">
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
                <select name="Produto" form="CreateCompraProduto" class="custom-select form-control">
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
        <form name="CreateCompraProduto" id="CreateCompraProduto" method='post'>
            <div class="row Prod">
                <center>
                    <div class="form-group">
                        <input type="text"
                        class="form-control input-lg"
                        placeholder="Quantidade"
                        name="Quantidade" />
                    </div>
                    <button type="submit" name="CreateCopr" class="btn btn-create btn-lg btn-block" value="CreateCopr"><span class="glyphicon glyphicon-ok"></span> Cadastrar </button>
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