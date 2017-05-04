<?php

# VARIAVEIS DE CONEXÃO
$mysql_host = "localhost";
$mysql_user = "root";
$mysql_pass = "";
$mysql_db   = "u573658764_papel";
$time_zone 	= "America/Sao_Paulo";

# CONEXÃO INICIADA
$db_conn = mysqli_connect($mysql_host, $mysql_user, $mysql_pass,$mysql_db) 
            or
die("Não foi possível conectar:" . mysqli_connect_errno());

# Set timezone to South America
date_default_timezone_set($time_zone);

    $dataLocal = date('Y/m/d', time());
    $horaLocal = date('H', time());
    $minutoLocal = date('i', time());

?>