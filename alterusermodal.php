        <div class="modal" id="myModal2"  role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Alterar Usuário</h4>
                    </div>
                    <div class="modal-body">
                        <form name="formPessoa" id="formPessoa" method='post'>
                            <div class="row Pessoa">
                                <div class="col-md-6">
                                <input type="hidden" name="AltId" required />
                                    <div class="form-group">
                                        <input type="text" class="form-control input-lg" placeholder="Nome" name="AltNome" required />
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control input-lg" placeholder="RG" name="AltRG" required />
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control input-lg" placeholder="CPF" name="AltCpf" required />
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control input-lg" placeholder="Telefone" name="AltTelefone" />
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control input-lg" placeholder="Endereço" name="AltEndereco" />
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control input-lg" placeholder="Salario" name="AltSalario" />
                                    </div>

                                    <div class="form-group">
                                        <input type="text" id="inputText" class="form-control input-lg" placeholder="Login" name="AltLogin" required />
                                    </div>

                                    <div class="form-group">    
                                        <input type="password" id="inputPass" class="form-control input-lg" placeholder="Senha" name="AltSenha" required />
                                    </div>

                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="Adm">Administrador
                                        </label>
                                    </div>
                                </div>
                            </div>
                        <button type="submit" name="AlterUser" class="btn btn-success btn-lg btn-block" value="AlterUser"> 
                        <span class="glyphicon glyphicon-ok"></span> Alterar
                    </button>
                    
                    <?php
                    include("alterar.php");
                    ?>

                </form>

                  </div>

              </div>

          </div>
      </div>
  
</div>