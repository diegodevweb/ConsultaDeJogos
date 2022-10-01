
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="estilo.css">
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet" />
    <title>Lista de Jogos</title>
</head>
<nav>
    <h1>Lista de Jogos</h1>
</nav>
<body>
    <?php
    require_once "includes/login.php";
    require_once "includes/banco.php";
    require_once "includes/funcoes.php"; /* O require_once carrega o arquivo e caso dê erro ele dá warning e trava tudo. */
    $ordem = $_GET['o'] ?? "n";
    $chave = $_GET['c'] ?? "";
    ?>
	<section id="corpo">
    <h1>Escolha seu Jogo</h1>

    <?php include_once "topo.php"; ?>
    <form action="index.php" method="get" id="busca">
        Ordenar: 
        <a href="index.php?o=n">Nome </a>
        | <a href="index.php?o=p">Produtora </a>
        | <a href="index.php?o=n1">Notal Alta</a> 
        | <a href="index.php?o=n2">Nota Baixa</a> 
        | <a href="index.php">Mostrar Todos</a>
        | Buscar: 
        <input type="text" maxlength="40" name="c">
        <input type="submit" value="Ok">
    </form>
    <table class="listagem">
        <?php
            $q = "select j.cod, j.nome, g.genero, j.capa, p.produtora from jogos j join generos g on j.genero = g.cod
            join produtoras p on j.produtora = p.cod ";

            if (!empty($chave)) {
                $q .= "WHERE j.nome like '%$chave%' OR p.produtora like '%$chave%' OR g.genero like '%$chave%' ";
            }

            switch ($ordem) {
                case "p":
                    $q .= "ORDER BY p.produtora";
                    break;
                case "n1":
                    $q .= "ORDER BY j.nota DESC";
                    break;
                case "n2":
                    $q .= "ORDER BY j.nota ASC";
                    break;
                default:
                    $q .= "ORDER BY j.nome";
            }

            $busca = $banco->query($q);
            if (!$busca) {
                echo "<tr><td>Infelizmente a busca deu errado.";
            } else {
                if($busca->num_rows == 0) {
                    echo "<tr><td>Nenhum registro encontrado.";
                } else {
                    # Carregar thumb
                    while($reg = $busca->fetch_object()) {
                        $t = thumb($reg->capa);
                        echo "<tr><td><img src='$t' class='mini'/>";
                        echo "<td><a href='detalhes.php?cod=$reg->cod'>$reg->nome</a>";
                    # Mostrar jogo
                        echo " [$reg->genero]";
                        echo "<br> $reg->produtora";
                        if (is_admin()) {
                            echo "<td>";
                            echo "<i class='material-icons'>add_circle</i>";
                            echo "<i class='material-icons'>edit</i>";
                            echo "<i class='material-icons'>delete</i>";
                        } elseif (is_editor()) {
                            echo "<td>";
                            echo "<i class='material-icons'>edit</i>";
                        }
                    }
                }
            }
        ?>
        
    </table>
	</section>
    <?php include_once "rodape.php"; ?> <!-- O include_once permite rodar a página sem dar erro mesmo se nao encontrar o arquivo. -->
</body>
</html>