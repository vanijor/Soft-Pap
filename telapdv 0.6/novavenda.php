<?php

    $query = "INSERT INTO Venda (dt_venda, ds_pagamento, Pessoa_cd_pessoa) VALUES (?,?,?)";
            
    $stmt = $db_conn->prepare($query);
    $stmt->bind_param("ssi", $Data, $Pagamento, $Usuario);

    if ($stmt->execute()){
    }
    
?>