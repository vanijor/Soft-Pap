<div class="modal fade" id="create_ajuste" style="margin-top:50px;" role="dialog">
    <div class="modal-dialog">
    <div class="modal-content">

    <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Cadastrar Ajuste</h4>
    </div>
    
        <div class="modal-body">
        <form name="CreateAjustes" id="CreateAjustes" method='post'>
            <div class="row Prod">
                <center> 
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
                        placeholder="Justificativa"
                        name="Justificativa"
                        required />
                    </div>

                    <button type="submit" name="CreateAjuste" class="btn btn-create btn-lg btn-block" value="CreateAjuste"><span class="glyphicon glyphicon-ok"></span> Cadastrar </button>
                </center> 
            </div>

            <?php
            }
            include_once("cadastrar.php");
            ?>

        </form>
        </div>
    </div>
    </div>
</div>