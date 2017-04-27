                    <h4 class="modal-title">Alterar Usuário</h4>
                        <form name="formPessoa" id="formPessoa" method='post'>
                            <div class="row Pessoa">
                                <div class="col-md-3">
                                <input type="hidden" name="AltId" required />
                                    <div class="form-group">
                                        <input type="text" class="form-control input-md" placeholder="Nome" name="AltNome" 
                                        required />
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control input-md" placeholder="RG" name="AltRG" value="<?php echo $_GET['cd_rg'] ?>"
                                        required />
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control input-md" placeholder="CPF" name="AltCpf" value="<?php echo $_GET['cd_cpf'] ?>"
                                        required />
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control input-md" placeholder="Telefone" name="AltTelefone" value="<?php echo $_GET['cd_telefone'] ?>"/>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control input-md" placeholder="Endereço" name="AltEndereco" />
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control input-md" placeholder="Salario" name="AltSalario" value="<?php echo $_GET['vl_salario'] ?>" />
                                    </div>

                                    <div class="form-group">
                                        <input type="text" id="inputText" class="form-control input-md" placeholder="Login" name="AltLogin" required />
                                    </div>

                                    <div class="form-group">    
                                        <input type="password" id="inputPass" class="form-control input-md" placeholder="Senha" name="AltSenha" required />
                                    </div>

                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="Adm">Administrador
                                        </label>
                                    </div>
                                    <button type="submit" name="AlterUser" class="btn btn-success btn-md btn-block" value="AlterUser"><span class="glyphicon glyphicon-ok"></span> Alterar </button>
                                </div>
                            </div>
                    
                    <?php
                    include("alterar.php");
                    ?>

                </form>
