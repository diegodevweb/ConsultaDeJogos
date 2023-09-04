    <?php
function thumb($arq) {
    $caminho = "fotos/$arq";
    if(is_null($arq) || !file_exists($caminho)) {
        return "fotos/indisponivel.png";
    } else {
        return $caminho;
    }
}

function voltar() {
  return "<a href='index.php'><i class='material-icons'>arrow_back</i></a>";
}

function sucesso($s) {
    $resp = "<div class='sucesso'><i class='material-icons'>check_circle</i> $s</div>";
    return $resp;
}

function aviso($a) {
    $resp = "<div class='aviso'><i class='material-icons'>check_circle</i> $a</div>";
    return $resp;
}

function erro($e) {
    $resp = "<div class='erro'><i class='material-icons'>check_circle</i> $e</div>";
    return $resp;
}