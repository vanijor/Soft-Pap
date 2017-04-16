    <title>Painel de Controle</title>
    <link href='http://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <link href="css/bootstrap.min.css" rel="stylesheet">
      <link rel="stylesheet" href="css/font-awesome.min.css">
        <link href="css/estilo.css" rel="stylesheet">
          <link href="css/painel.css" rel="stylesheet">


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
                                        <input type="text" id="nome"
                                        class="form-control input-lg" placeholder="Nome" name="Nome" />
                                    </div>
                                    <div class="form-group">
                                        <input type="text" value='
                                        <?php $_SESSION["AltRG"] ?>'
                                        class="form-control input-lg" placeholder="RG" name="RG" />
                                    </div>
                                    <div class="form-group">
                                        <input type="text" value='
                                        <?php $_SESSION["AltCPF"] ?>'
                                        class="form-control input-lg" placeholder="CPF" name="Cpf" />
                                    </div>
                                    <div class="form-group">
                                        <input type="text" value='
                                        <?php $_SESSION["AltTelefone"] ?>'
                                        class="form-control input-lg" placeholder="Telefone" name="Telefone" />
                                    </div>
                                    <div class="form-group">
                                        <input type="text" value='
                                        <?php $_SESSION["AltEndereco"] ?>'
                                        class="form-control input-lg" placeholder="Endereço" name="Endereco" />
                                    </div>
                                    <div class="form-group">
                                        <input type="text" value='
                                        <?php $_SESSION["AltSalario"] ?>'
                                        class="form-control input-lg" placeholder="Salario" name="Salario" />
                                    </div>

                                    <div class="form-group">
                                        <input type="text"
                                        id="inputText" class="form-control input-lg" placeholder="Login" name="Login" />
                                    </div>

                                    <div class="form-group">    
                                        <input type="password"
                                        id="inputPass" class="form-control input-lg" placeholder="Senha" name="Senha" />
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
  </body>
</html>