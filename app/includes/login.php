<?php

/*Iniciar sessão*/
session_start();

/*Se Não tiver um usuário logado, os campos user, nome, tipo e admin ficam em branco.*/
if (!isset($_SESSION['user'])) {
    $_SESSION['user'] = "";
    $_SESSION['nome'] = "";
    $_SESSION['tipo'] = "";
}

//Conferido --> A função criptografar estava com problemas, então desativei. 
/*
function cripto($senha) {
    $c = '';
    for($pos = 0; $pos < strlen($senha); $pos++) {
    $letra = ord($senha[$pos]) + 1;
    $c .= chr($letra);
    }
    return $c;
}*/

//Conferido
function gerarHash($senha) {
    $hash = password_hash($senha, PASSWORD_DEFAULT);
    return $hash;
}

//Conferido
function testarHash($senha, $hash) {
    $ok = password_verify($senha, $hash);
    return $ok;
}

function logout() {
    unset ($_SESSION['user']);
    unset ($_SESSION['nome']);
    unset($_SESSION['tipo']);

}

/*Se o user estiver vazio, retorna falso. Senão retorna verdadeiro.*/
function is_logado() {
    if(empty($_SESSION['user'])) {
        return false;
    } else {
        return true;
    }
}
 /*Variável $t recebe o tipo do usuário. Se for um tipo válido, ok senão é nulo.
 Se $t for nulo, retorna falso. Senão, se $t for user do tipo admin, retorna verdadeiro. 
 Senão retorna falso. */
function is_admin() {
    $t = $_SESSION['tipo'] ?? null;
    if(is_null($t)) {
        return false;
    } else {
        if($t == 'admin') {
            return true;
        } else {
            return false;
        }
    }
}

/*Função semelhante a is_admin, só que para verificar o tipo de user editor.*/
function is_editor() {
    $t = $_SESSION['tipo'] ?? null;
    if(is_null($t)) {
        return false;
    } else {
        if($t == 'editor') {
            return true;
        } else {
            return false;
        }
    }
}