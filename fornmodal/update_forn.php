<?php
error_reporting(0);
ini_set('display_errors', 0);

include("../dbconnect.php");

if(isset($_GET['cd_forn'])){
    $Id = $_GET['cd_forn'];

$query = "SELECT * FROM Fornecedor
    where cd_fornecedor = ?";
$stmt = $db_conn->prepare($query);
$stmt->bind_param("i", $Id);
$stmt->execute();
$stmt->bind_result($cd_forn, $cnpj_forn, $nome_forn, $endereco_forn, $tel_forn, $email_forn);

// EXIBE PESSOA
while($stmt->fetch()) {
?>



    <div class="modal-dialog">
    <div class="modal-content">

    <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Alterar Fornecedor</h4>
    </div>
<!-- ALTERAÇÃO DE USUARIO -->
        <div class="modal-body">
        <form name="UpdateFornecedor" id="UpdateFornecedor" action='alterar.php' method='post'>
            <div class="row Pessoa">
                <center>

                    <input type="hidden" name="AltId" value="<?= $cd_forn; ?>" required />
                     
                    <div class="form-group">
                        <input type="text"
                        class="form-control input-lg"
                        placeholder="Nome" 
                        name="AltNome"
                        value="<?= $nome_forn; ?>"
                        required/>
                    </div>

                    <div class="form-group">
                        <input type="text" 
                        class="form-control input-lg" 
                        placeholder="CNPJ"
                        name="AltCNPJ" 
                        value="<?= $cnpj_forn; ?>"
                        required/>
                    </div>

                    <div class="form-group">
                        <input type="text" 
                        class="form-control input-lg" 
                        placeholder="Endereco"
                        name="AltEndereco"
                        value="<?= $endereco_forn; ?>" />
                    </div>

                    <div class="form-group">
                        <input type="text"
                        class="form-control input-lg"
                        placeholder="Telefone"
                        name="AltTelefone"
                        value="<?= $tel_forn; ?>" />
                    </div>

                    <div class="form-group">
                        <input type="text"
                        class="form-control input-lg"
                        placeholder="Email"
                        name="AltEmail"
                        value="<?= $email_forn; ?>" />
                    </div>

                    <button type="submit" name="UpdateForn" class="btn btn-create btn-lg btn-block" value="UpdateForn"><span class="glyphicon glyphicon-ok"></span> Criar 
                    </button>
                </center>
            </div>

        </form>
        <?php }
        }
        ?>      
        </div>
    </div>
    </div>