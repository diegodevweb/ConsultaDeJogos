<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="estilo.css">
    <title>Edição de dados do usuário</title>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet" />
</head>
<nav>
    <h1>Edição de dados</h1>
</nav>
<body>
    <?php
    require_once "includes/login.php";
    require_once "includes/banco.php";
    require_once "includes/funcoes.php";
    ?>
	<section id="corpo">   
        <?php 
            if(!is_logado()) {
                echo erro("Faça o <a href='user-login.php'>login</a> para poder editar seus dados.");
            } else {
                //Se não tiver configurado o usuário, ele leva para o formulário user-edit-form.php
                if(!isset($_POST['usuario'])) { 
                    include "user-edit-form.php";
                
                //Se tiver configurado, os dados inseridos em cada campo do formulário são armazenados nas variáveis.
                //Caso não sejam informados os dados, ficarão em branco. 
                } else {
                    $usuario = $_POST['usuario'] ?? null;
                    $nome = $_POST['nome'] ?? null;
                    $tipo = $_POST['tipo'] ?? null;
                    $senha1 = $_POST['senha1'] ?? null;
                    $senha2 = $_POST['senha2'] ?? null;

                    //Nova query para alterar os dados no banco
                    $q = "UPDATE usuarios SET usuario = '$usuario', nome = '$nome'";

                    //Se usuário não digitar nova senha ou valor for nulo, a senha antiga é mantida.
                    if(empty($senha1) || is_null($senha1)) {
                        echo aviso('Senha antiga foi mantida.');
                    } else {
                    
                    //Senão geramos outra senha e a hash da senha, concatenando com a query que fizemos acima. 
                        if($senha1 === $senha2) {
                            $senha = gerarHash($senha1);
                            $q .= ", senha = '$senha'";
                            echo sucesso('Senha foi alterada com sucesso!');
                        } else {
                            echo erro('Senhas não conferem. A senha anterior será mantida.');
                        }
                    }

                    //continuando a query, sempre temos que utilizar o update com WHERE, para não afetar todo o banco.
                        $q.= " WHERE usuario = '".$_SESSION['user']."'";
                        if($banco->query($q)) {
                            echo sucesso("Usuário alterado com sucesso!");
                            logout();
                            echo aviso("Por segurança faça o <a href='user-login.php'>login</a> novamente");
                        }
                }
            }
            echo voltar();
        ?>
    </section>
</body>
<?php require_once "rodape.php"?>
</html> 