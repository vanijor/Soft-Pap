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
    <?php
    include("menu.php");
    ?>
      <div class="col-sm-9">
        <?php
        include("listar.php");
        ?>          
      </div>
    </div>
    <div class="container">        
        <!-- Modals -->
      <?php
      include("usermodal/create_modal.php");
      include("usermodal/update_modal.php");
      include("usermodal/delete_modal.php");
      ?>
    </div>

    <div class="modal fade" id="update_modal" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
        </div>
      </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>


    <!-- AJAX UPDATE --> 
    <script type="text/javascript">
    $('.modalLink').click(function(){
        var cd_pessoa= $(this).attr('data-id');
        $.ajax({
          url:"usermodal/update_modal.php?cd_pessoa="+cd_pessoa,
          cache:false,
          success:function(result){
            $("#update_modal").html(result);
            $("#update_modal").modal("show");
          }});
    });
    </script>

    <!-- JAVASCRIPT DELETE--> 
    <script type="text/javascript">
        function confirm_modal(delete_url)
        {
          $('#delete_modal').modal('show', {backdrop: 'static'});
          document.getElementById('delete_link').setAttribute('href', delete_url);
        }
    </script>

  </body>
</html>