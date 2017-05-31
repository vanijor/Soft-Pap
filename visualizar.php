<?php
// INSTANCIANDO PRODUTO
require_once("classes/produto.php");
$produto = new produto();
   
if(isset($_GET['cd_produto'])){
$Id = $_GET['cd_produto']; 
}
$produto->view($Id);
    
?>