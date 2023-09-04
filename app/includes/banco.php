<?php
   // $banco = new mysqli('localhost', 'root', '' , 'bd_games');

    $banco = new mysqli('us-cdbr-east-06.cleardb.net', 'b84376f3214d3c', '45900fb6' , 'heroku_9e579ca4ec81f51');
    

    if ($banco->connect_errno) {
        echo '<p>Encontrei um erro $banco->errno --> $banco->connect_error</p>';
        die();
    }

    $banco->query("SET NAMES 'utf8'");
    $banco->query("SET character_set_connection=utf8");
    $banco->query("SET character_set_client=utf8");
    $banco->query("SET character_set_results=utf8");

   /* $busca = $banco->query("select * from produtoras");
    if (!$busca) {
        echo "<p>Falha na busca! $banco->error</p>";
    } else {
        while ($reg = $busca->fetch_object()) {
            echo "<br>";
            print_r($reg);
        }
    }*/