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
      <link rel="stylesheet" href="css/estilo.css">
  </head>
  <body>
    <div class="container-fluid jumbo2">

        	<div class="row gradient1">
        		<div class="header-img col-sm-8">    				
              <img src="imgs/1.png" class="img-responsive" align="left" />
            </div>
            <div class="col-sm-4 ">
              <div class="panel panel-primary sdw">
                <div class="panel-heading gradient1">Atalhos</div>
                <div class="panel-body">
                  <div class="col-sm-3 col-xs-6">
                    <button type="submit" class="rounded" ><a href="" class="fa fa-search"></a></button>Consultar
                  </div>
                  <div class="col-sm-3 col-xs-6">
                    <button type="submit" class="rounded" ><a href="" class="fa fa-check-square-o"></a></button>Finalizar
                  </div>
                  <div class="col-sm-3 col-xs-6">
                    <button type="submit" class="rounded"><a href="" class="fa fa-remove"></a></button>Cancelar
                  </div>
                  <div class="col-sm-3 col-xs-6">
                    <button type="submit" class="rounded"><a href="" class="fa fa-sign-out"></a></button>Logout
                  </div>
                </div>
              </div>
            </div>
          </div>  

        <div class="row">
        <div class="col-xs-12">
        <form class="form-group">
                <label for="Descricao"><h1>Descrição do Produto</h1></label>
                  <input class="form-control gradient tm1" type="text" id="Descricao" readonly>
        </form>
        </div>
        </div>
        <div class="row">
            <div class="col-sm-6 ">
                <div class="panel panel-primary sdw">
      				<div class="panel-heading gradient1">Cupom Fiscal</div>
      					<div class="panel-body panel-size">
  						<div class="table-responsive">
						    <table class="table table-striped table-bordered table-hover">
						      <thead>
						        <tr class="gradient">
						          <th>#</th>
						          <th>Código</th>
						          <th>Descrição</th>
						          <th>Quantid.</th>
						          <th>Valor Unit.</th>
						          <th>Valor Total.</th>
						        </tr>
						      </thead>
						      <tbody>
                  <?php
                  include("vendas.php");

                  $cd_venda = 1;
                  
          				$query = "SELECT cd_produto_has_venda, Produto_cd_produto, Venda_cd_venda, nm_produto, vl_produto, qt_produto
                       FROM Produto_has_venda WHERE Venda_cd_venda = ?";

                  $stmt = $db_conn->prepare($query);
                  $stmt->bind_param("i", $cd_venda);
                  
                  if($stmt->execute()) {
                          $stmt->bind_result($cd_prvd, $cd_produto, $cd_venda, $nm_produto, $vl_produto, $qt_produto);
                  }

                  while($stmt->fetch()) {
                      printf("<tr>");
                      printf("<td>" .
                          $cd_prvd
                          . "</td><td>" . 
                          $cd_produto
                          . "</td><td>" . 
                          $cd_venda
                          . "</td><td>" . 
                          $nm_produto
                          . "</td><td>" . 
                          $vl_produto
                          . "</td><td>" . 
                          $qt_produto
                          . "</td><td>" . 
                          "<a class='btn btn-danger')><em class='fa fa-trash'></em></a>");
                  }
                  ?>
						      </tbody>
						    </table>
						</div>
						</div>
    			</div>
    		</div>
            <div class="col-sm-3">
            	<form id="FormPDV" class="form-group" method="post" action="#">
            		<label for="Codigo"><h1>Código<h1></label>
						      <input name="Codigo" class="form-control gradient tm1" size="100" type="text" id="Codigo">
					      <label for="Quantidade"><h1>Quantidade<h1></label>
                  <input name="Quantidade" class="form-control gradient tm1" size="100" type="text" id="Quantidade">
                <label for="Preco"><h1>Preço Unitário<h1></label>
                  <input class="form-control gradient tm1" size="100" type="text" id="Preco" readonly>
                <label for="Total"><h1>Preço Total<h1></label>
                  <input class="form-control gradient tm1" size="100" type="text" id="Total" readonly>
				      </form>
    		    </div>
            <div class="col-sm-3">
    			    <div class="panel panel-primary sdw">
      				  <div class="panel-heading gradient1">Código de Barras</div>
      				  <div class="panel-body"><img src="imgs/cd.png" class="img-rounded img-responsive img-center" alt="Cinque Terre" width="304" height="236"></div>
    			    </div>
              <form class="form-group">
                <label for="Pagar"><h3>Total à Pagar<h3></label>
                  <input class="form-control tm gradient" type="text" id="Pagar" readonly>
              </form>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script>
    $('#FormPDV').bind('keyup', function(e) {
      if (e.which == 119) {
          $('#FormPDV').submit();
          return false;
          }
      });
    </script>
  </body>
</html>