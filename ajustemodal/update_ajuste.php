<?php
error_reporting(0);
ini_set('display_errors', 0);

include("../dbconnect.php");

if(isset($_GET['cd_ajuste'])){
    $Id = $_GET['cd_ajuste'];

$query = "SELECT dt_ajuste, ds_justificativa FROM Ajuste
    where cd_ajuste = ?";
$stmt = $db_conn->prepare($query);
$stmt->bind_param("i", $Id);
$stmt->execute();
$stmt->bind_result($dt_ajuste, $ds_justificativa);

// EXIBE AJUSTE
while($stmt->fetch()) {
?>



    <div class="modal-dialog">
    <div class="modal-content">

    <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Alterar Ajuste</h4>
    </div>
<!-- ALTERAÇÃO DE USUARIO -->
        <div class="modal-body">
        <form name="UpdateAjustes" id="UpdateAjustes" action='alterar.php' method='post'>
            <div class="row Pessoa">
                <center> 

                    <input type="hidden" name="AltId" value="<?= $Id; ?>" required />

                    <div class="form-group">
                        <input type="hidden" 
                        class="form-control input-lg"
                        placeholder="Data" 
                        name="AltData"
                        value="<?= date('Y/m/d', time()); ?>"
                        required />
                    </div>

                    <div class="form-group">
                        <input type="text"
                        class="form-control input-lg"
                        placeholder="Justificativa"
                        name="AltJustificativa"
                        value="<?= $ds_justificativa ?>"
                        required />
                    </div>
                    <button type="submit" name="UpdateAjuste" class="btn btn-create btn-lg btn-block" value="UpdateAjuste"><span class="glyphicon glyphicon-ok"></span> Alterar </button>
                </center>
            </div>

        </form>
        <?php }
        }
        ?>      
        </div>
    </div>
    </div>