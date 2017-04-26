<?
session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Painel de Controle</title>
    <link href='http://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <link href="css/bootstrap.min.css" rel="stylesheet">
      <link rel="stylesheet" href="css/font-awesome.min.css">
        <link href="css/estilo.css" rel="stylesheet">
          <link href="css/painel.css" rel="stylesheet">
  </head>
    
  <body>
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"><img src="imgs/navlogo.png" alt="NavLogo"> </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-desktop fa-2x"></i><span class="caret"></span></a>
                <ul class="dropdown-menu">
                <li><a href="venda.html">Vendas</a></li>
                
                
              </ul></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user fa-2x"></i><span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#">Efetuar Logoff</a></li>
              </ul>
            </li>
          </ul>          
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>
      
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="col-sm-3">
                <!-- Ajuste -->
                <div class="panel panel-primary">
                    <div id="colGroup1" role="tab" class="panel-heading">
                        <h4 class="panel-title">
                            <a href="#colListGroup1" aria-controls="colListGroup1" aria-expanded="false" data-toggle="collapse">
                                <span class="glyphicon glyphicon-file"></span>
                                Ajustar produto
                            </a>
                        </h4>
                    </div>
                    <div role="tabpanel" class="panel-collapse collapse" id="colListGroup1" aria-expanded="false">
                        <ul class="list-group">
                            <li class="list-group-item"><a href="#">Inserir novo Ajuste</a></li>
                            <li class="list-group-item"><a href="#">Listar Ajuste</a></li>
                        </ul>
                        <div class="panel-footer"></div> 
                    </div>
                </div>
                <!-- //menu navegação lateral -->
                <!-- Usuario -->
                <div class="panel panel-primary">
                    <div id="colGroup1" role="tab" class="panel-heading">
                        <h4 class="panel-title">
                            <a href="#colListGroup2" aria-controls="colListGroup2" aria-expanded="false" data-toggle="collapse">
                                <span class="glyphicon glyphicon-user"></span>
                                Gerenciar Usuário
                            </a>
                        </h4>
                    </div>
                    <div role="tabpanel" class="panel-collapse collapse" id="colListGroup2" aria-expanded="false">
                        <ul class="list-group">
                            <li class="list-group-item"><a href="#myModal" data-toggle="modal" >Criar novo USUÁRIO</a></li>
                            <li class="list-group-item"><a href="#">Listar USUÁRIO</a></li>
                        </ul>
                        <div class="panel-footer"></div>
                    </div>
                </div>
                <!-- //menu navegação lateral -->
                <!-- Fornecedor -->
                <div class="panel panel-primary">
                    <div id="colGroup1" role="tab" class="panel-heading">
                        <h4 class="panel-title">
                            <a href="#colListGroup3" aria-controls="colListGroup3" aria-expanded="false" data-toggle="collapse">
                                <span class="glyphicon glyphicon-user"></span>
                                Gerenciar Fornecedor
                            </a>
                        </h4>
                    </div>
                    <div role="tabpanel" class="panel-collapse collapse" id="colListGroup3" aria-expanded="false">
                        <ul class="list-group">
                            <li class="list-group-item"><a data-toggle="modal" >Novo Fornecedor</a></li>
                            <li class="list-group-item"><a href="#">Listar Fornecedor</a></li>
                        </ul>
                        <div class="panel-footer"></div>
                    </div>
                </div>
                <!-- //menu navegação lateral -->
                <!-- Estoque -->
                <div class="panel panel-primary">
                    <div id="colGroup1" role="tab" class="panel-heading">
                        <h4 class="panel-title">
                            <a href="#colListGroup4" aria-controls="colListGroup4" aria-expanded="false" data-toggle="collapse">
                                <span class="glyphicon glyphicon-user"></span>
                                Gerenciar Estoque
                            </a>
                        </h4>
                    </div>
                    <div role="tabpanel" class="panel-collapse collapse" id="colListGroup4" aria-expanded="false">
                        <ul class="list-group">
                            <li class="list-group-item"><a href="#">Inserir novo Produto</a></li>
                            <li class="list-group-item"><a href="#">Listar Produto</a></li>
                        </ul>
                        <div class="panel-footer"></div>
                    </div>
                </div>
                
                
    </div>
            <div class="col-sm-9">


<?php
include("listar.php");
?>

                    
            </div>
    </div>
    <div class="container">        
        <!-- Modal -->
                <?php
                include("usermodal.php");
                include("alterusermodal.php");
                ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <script language="javascript" type="text/javascript">
    // Exibe confirmação delete
    function confirmarDelete(id) {
    var verificar = confirm('Você realmente deseja excluir este usuário?');
    if (verificar){
        location.href = 'deletar.php?cd_pessoa='+ id;
        } else {
        alert('Quase deletou o usuário errado mané.');
        }    
    }
    
    // Envia dado pro modal
window.onload = function(){
    function setModalData(id/*, tel, end, sal, rg, cpf, adm*/) {
        $("#myModal2").modal();
    document.getElementById('AltId').value = id;
    //document.getElementById('AltNome').value = nome;
    //document.getElementById('AltTelefone').value = tel;
    //document.getElementById('AltEndereco').value = end;
    //document.getElementById('AltSalario').value = sal;
    //document.getElementById('AltRG').value = rg;
    //document.getElementById('AltCpf').value = cpf;
    //document.getElementById('AltAdm').value = adm;
    }
};

    </script>


  </body>
</html>