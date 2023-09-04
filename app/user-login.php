<!DOCTYPE html>
<?php
require_once "includes/login.php";
require_once "includes/banco.php";
require_once "includes/funcoes.php";
?>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="estilo.css">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet" />
</head>

<body>
    <nav>
        <h1>Login de Usuário</h1>
    </nav>
        <section id="corpo">
            <?php
            $u = $_POST['usuario'] ?? null;
            $s = $_POST['senha'] ?? null;

            if (is_null($u) || is_null($s)) {
                require "user-login-form.php";
            } else {
                $q = "SELECT usuario, nome, senha, tipo FROM usuarios WHERE usuario = '$u' LIMIT 1";
                $busca = $banco->query($q);
                if (!$busca) {
                    echo erro('Falha ao acessar o banco!');
                } else {
                    if ($busca->num_rows > 0) {
                        $reg = $busca->fetch_object();
                        if (testarHash($s, $reg->senha)) {
                            echo sucesso('Logado com sucesso!');
                            $_SESSION['user'] = $reg->usuario;
                            $_SESSION['nome'] = $reg->nome;
                            $_SESSION['tipo'] = $reg->tipo;
                        } else {
                            echo erro('Senha inválida!');
                        }
                    }
                }
            }
            echo voltar();
            ?>
        </section>
</body>

</html>