<?php
error_reporting(0);
ini_set('display_errors', 0);

include("../dbconnect.php");

if(isset($_GET['cd_pessoa'])){
    $Id = $_GET['cd_pessoa'];

$query = "SELECT cd_pessoa, nm_nome, cd_rg, cd_cpf, cd_telefone, ds_endereco, vl_salario, cd_login, cd_senha, cd_adm FROM pessoa
    where cd_pessoa = ?";
$stmt = $db_conn->prepare($query);
$stmt->bind_param("i", $Id);
$stmt->execute();
$stmt->bind_result($cd_pessoa, $nm_nome, $cd_rg, $cd_cpf, $cd_telefone, $ds_endereco, $vl_salario, $cd_login, $cd_senha, $cd_adm);

// EXIBE PESSOA
while($stmt->fetch()) {
?>



    <div class="modal-dialog">
    <div class="modal-content">

    <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Alterar Usuário</h4>
    </div>
<!-- ALTERAÇÃO DE USUARIO -->
        <div class="modal-body">
        <form name="UpdatePessoa" id="UpdatePessoa" action='alterar.php' method='post'>
            <div class="row Pessoa">
                <div class="col-md-6">

                    <input type="hidden" name="AltId" value="<?= $cd_pessoa; ?>" required />
                     
                    <div class="form-group">
                    NOME:
                        <input type="text" 
                        class="form-control input-lg" 
                        placeholder="Nome" 
                        name="AltNome"
                        value="<?= $nm_nome; ?>"
                        required />
                    </div>

                    <div class="form-group">
                    RG:
                        <input type="text"
                        class="form-control input-lg"
                        placeholder="RG" 
                        name="AltRG"
                        value="<?= $cd_rg; ?>"
                        required />
                    </div>

                    <div class="form-group">
                    CPF:
                        <input type="text" 
                        class="form-control input-lg" 
                        placeholder="CPF" 
                        name="AltCpf"
                        value="<?= $cd_cpf; ?>"
                        required />
                    </div>

                    <div class="form-group">
                    TELEFONE:
                        <input type="text"
                        class="form-control input-lg"
                        placeholder="Telefone"
                        name="AltTelefone" 
                        value="<?= $cd_telefone; ?>"/>
                    </div>

                    <div class="form-group">
                    ENDEREÇO:
                        <input type="text"
                        class="form-control input-lg"
                         placeholder="Endereço"
                         name="AltEndereco"
                         value="<?= $ds_endereco; ?>" />
                    </div>

                    <div class="form-group">
                    SALARIO:
                        <input type="text"
                        class="form-control input-lg"
                        placeholder="Salario"
                        name="AltSalario" 
                        value="<?= $vl_salario; ?>" />
                    </div>

                    
                    <div class="form-group">
                    LOGIN:
                        <input type="text"
                        id="inputText"
                        class="form-control input-lg"
                        placeholder="Login"
                        name="AltLogin"
                        value="<?= $cd_login; ?>"
                        required />
                    </div>

                    
                    <div class="form-group">    
                    SENHA:
                        <input type="password"
                        id="inputPass" 
                        class="form-control input-lg" 
                        placeholder="Senha" 
                        name="AltSenha" 
                        value="<?= $cd_senha; ?>" 
                        required />
                    </div>

                    
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="AltAdm" value="<?= $cd_adm; ?>">Administrador
                        </label>
                    </div>

                    <button type="submit" name="UpdateUser" class="btn btn-success btn-lg btn-block" value="UpdateUser"><span class="glyphicon glyphicon-ok"></span> Alterar 
                    </button>
                </div>
            </div>

        </form>
        <?php }
        }
        ?>      
        </div>
    </div>
    </div>