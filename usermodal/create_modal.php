<div class="modal fade" id="create_modal"  role="dialog">
    <div class="modal-dialog">
    <div class="modal-content">

    <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Criar Usuário</h4>
    </div>
<!-- CRIAÇAO DE USUARIO -->
        <div class="modal-body">

        <form name="CreatePessoa" id="CreatePessoa" method='post'>
            <div class="row Pessoa">
                <div class="col-md-6">
                    
                    <div class="form-group">
                        <input type="text" class="form-control input-lg" placeholder="Nome" name="Nome" 
                        required />
                    </div>

                    <div class="form-group">
                        <input type="text"
                        class="form-control input-lg"
                        placeholder="RG" 
                        name="RG"
                        required />
                    </div>

                    <div class="form-group">
                        <input type="text" 
                        class="form-control input-lg" 
                        placeholder="CPF" name="Cpf"
                        required />

                    </div>
                    <div class="form-group">
                        <input type="text"
                        class="form-control input-lg"
                        placeholder="Telefone"
                        name="Telefone" />
                    </div>
                    <div class="form-group">
                        <input type="text"
                        class="form-control input-lg"
                         placeholder="Endereço"
                         name="Endereco" />
                    </div>
                    <div class="form-group">
                        <input type="text"
                        class="form-control input-lg"
                        placeholder="Salario"
                        name="Salario" />
                    </div>

                    <div class="form-group">
                        <input type="text"
                        id="inputText"
                        class="form-control input-lg"
                        placeholder="Login"
                        name="Login"
                        required />
                    </div>

                    <div class="form-group">    
                        <input type="password"
                        id="inputPass" 
                        class="form-control input-lg" 
                        placeholder="Senha" 
                        name="Senha" 
                        required />
                    </div>

                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="Adm">Administrador
                        </label>
                    </div>

                    <button type="submit" name="CreateUser" class="btn btn-success btn-lg btn-block" value="CreateUser"><span class="glyphicon glyphicon-ok"></span> Criar </button>
                </div>
            </div>

            <?php
            include("cadastrar.php");
            ?>

        </form>
        </div>
    </div>
    </div>
</div>