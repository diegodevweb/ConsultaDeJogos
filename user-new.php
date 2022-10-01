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
    <h1>Cadastrar novo usuário</h1>
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
                //Se o usuário não foi setado
                if (!isset($_POST['usuario'])) {
                    require "user-new-form.php";
                } else {
                    $usuario = $_POST['usuario'] ?? null;
                    $nome = $_POST['nome'] ?? null;
                    $senha1 = $_POST['senha1'] ?? null;
                    $senha2 = $_POST['senha2'] ?? null;
                    $tipo = $_POST['tipo'] ?? null;
             
                    if($senha1 === $senha2) {
                        if(empty($usuario) || empty($nome) || empty($senha1) ||
                        empty($senha2) || empty($tipo)) {
                            echo erro('Todos os dados são obrigatórios');
                        } else {
                            $senha = gerarHash($senha1); //Variável para senha inserida 
                            $q = "INSERT INTO usuarios (usuario, nome, senha, tipo) VALUES ('$usuario', '$nome', '$senha', '$tipo')";
                            if($banco->query($q)) {
                                echo sucesso("Usuário $nome cadastrado com sucesso."); 
                            } else {
                                echo erro("Não foi possível criar o usuário $usuario. Talvez o login já esteja sendo utilizado.");
                            }
                        } 
                    } else {
                        echo erro("Senhas não conferem, repita o procedimento.");
                    }
            } 
            echo voltar();
        }
        ?>
    </section>
    <?php require_once "rodape.php"?>
</body>
</html> 