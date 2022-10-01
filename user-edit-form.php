<?php 
    $q = "SELECT usuario, nome, senha, tipo FROM usuarios WHERE usuario='".$_SESSION['user']."'"; //Puxar os dados do usuário que está logado.
    $busca = $banco->query($q);
    $reg = $busca->fetch_object();
?>


<h1>Edição de dados</h1>
 <!-- Manda os dados para o user-edit.php!-->
<form action="user-edit.php" method="post">
    <table>
        <tr><td>Usuário
            <td><input type="text" name="usuario" id="usuario" size="10" maxlength="10" readonly value="<?php echo $reg->usuario ?>">
        <tr><td>Nome
            <td><input type="text" name="nome" id="nome" size="30" maxlength="30" value="<?php echo $reg->nome ?>">
        <tr><td>Tipo 
            <td><input type="text" name="tipo" id="tipo" readonly value="<?php echo $reg->tipo ?>"> <!--readonly é para o usuário somente fazer a leitura, e não ter como alterar. --> 
        <tr><td>Senha
            <td><input type="password" name="senha1" id="senha1" size="10" maxlength="10">
        <tr><td>Confirme sua senha
            <td><input type="password" name="senha2" id="senha2" size="10" maxlength="10">
        <tr><td><input type="submit" value="Salvar">
    </table>
</form>