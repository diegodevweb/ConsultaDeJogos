<!DOCTYPE html>
<html lang="pt-br">
<?php
    require_once "includes/login.php";
    require_once "includes/banco.php";
    require_once "includes/funcoes.php"; 
    ?>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="estilo.css">
    <title>Lista de Jogos</title>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet" />
</head>
<body>
    <nav>
        <h1>Logout</h1>
    </nav>
        <section id="corpo"> 
            <?php
                logout();
                echo sucesso('Logout realizado com sucesso!');
                echo voltar();
            ?>
        </section>
</body>
</html> 