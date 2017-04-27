        <div class="modal fade" id="myModal2"  role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Novo Usuário</h4>
                    </div>
                    <div class="modal-body">
                        <form name="formPessoa" id="formPessoa" method='post'>
                            <div class="row Pessoa">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control input-lg" placeholder="Nome" name="Nome" required />
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control input-lg" placeholder="CNPJ" name="CPNJ" required />
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control input-lg" placeholder="Telefone" name="Telefone" />
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control input-lg" placeholder="Endereço" name="Endereco" />
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control input-lg" placeholder="Email" name="Email" />
                                    </div>                                  
                                </div>
                            </div>
                        <button type="submit" name="CreateForn" class="btn btn-success btn-lg btn-block" value="CreateForn"> 
                        <span class="glyphicon glyphicon-ok"></span> Criar
                    </button>

                    <?php
                    include("cadastrarforn.php");
                    ?>

                </form>
                                  </div>

              </div>

          </div>
      </div>
  
</div>