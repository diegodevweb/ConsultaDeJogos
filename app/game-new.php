<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="estilo.css">
    <title>Lista de Jogos</title>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet" />
</head>
<nav>
    <h1>Cadastrar novo jogo</h1>
</nav>
<body>
    <?php
    require_once "includes/login.php";
    require_once "includes/banco.php";
    require_once "includes/funcoes.php";
    ?>
	<section id="corpo"> 
        <?php

    if(!is_admin()) {
        echo erro('Você não é administrador!');
        echo voltar();
    } else {
          if(!isset($_POST['nomeJogo'])) { 
          require "game-new-form.php";
        } else {
        $cod = $_POST['cod'] ?? null;
        $nomeJogo = $_POST['nomeJogo'] ?? null;
        $genero = $_POST['genero'] ?? null;
        $produtora = $_POST['produtora'] ?? null;
        $descricao = $_POST['descricao'] ?? null;
        $nota = $_POST['nota'] ?? null;
        $capa = $_POST['capa'] ?? null;
 
        if(empty($cod) || empty($nomeJogo) || empty($genero) || empty($produtora) || empty($descricao) || empty($nota) || empty($capa)) {
            echo "Todos os dados são obrigatórios";
        } else {
            
            $q = "INSERT INTO jogos (cod, nome, genero, produtora, descricao, nota, capa) VALUES
            ('$cod', '$nomeJogo', '$genero', '$produtora', '$descricao', '$nota', '$capa')";
            
            if($banco->query($q)) {
                echo sucesso("Jogo $nomeJogo cadastrado com sucesso."); 
            } else {
                echo erro("Não foi possível criar o jogo $nomeJogo.");
            }
        
            }
        }
            echo voltar();
    }
            ?>
            </section>
    <?php require_once "rodape.php"?>
</body>
</html>