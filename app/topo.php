<?php  
    echo "<p class='entrar'>";
    if (empty($_SESSION['user'])) {
        echo "<a href='user-login.php'>Entrar</a>";
    } else {
        echo "Olá, <strong>". $_SESSION['nome']."</strong> | ";
        echo "<a href='user-edit.php'>Meus Dados</a> | ";
        if (is_admin()) {
            echo "<a href='user-new.php'>Novo usuário</a> | ";
            echo "<a href='game-new.php'> Novo Jogo   </a>";
        }
        echo "<a href='user-logout.php'> Sair </a>";
    } 
    echo "</p>";
?>