

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
    <h1>Listagem de Jogos</h1>
</nav>
<body>
    <?php
    require_once "includes/login.php";
    require_once "includes/banco.php";
    require_once "includes/funcoes.php";
    $c = $_GET['cod'] ?? 0;
    $busca = $banco->query("select * from jogos where cod='$c'"); 
    ?>
	<section id="corpo">    
    <h1>Detalhes do Jogo</h1>
    <table class='detalhes'>
    <?php
        if(!$busca) {
            echo "Busca falhou!";
        } else {
            if($busca->num_rows == 1) {
                $reg = $busca->fetch_object();
                $t = thumb($reg->capa);
                echo "<tr><td rowspan='3'><img src= '$t' class='mid'/>";
                echo "<td><h3>$reg->nome</h3>";
                echo "Nota: ".number_format($reg->nota, 1). " de 10.0";
                if (is_admin()) {
                    echo "<i class='material-icons'>add_circle</i>";
                    echo "<i class='material-icons'>edit</i>";
                    echo "<i class='material-icons'>delete</i>";
                } elseif (is_editor()) {
                    echo "<i class='material-icons'>edit</i>";
                }
                echo "<tr><td>$reg->descricao";
                
            }
        }
    ?>
    </table>
    <a href="index.php"><span class="material-symbols-outlined">arrow_circle_left</span></a>
	</section>
    <?php include_once "rodape.php";?>
</body>
</html>