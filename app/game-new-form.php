<h1>Formulário Novo Jogo</h1>
<form action='game-new.php' method='POST'>
    <table>
        <tr><td>Código do Jogo <input type='number' required name='cod' id='cod' size='10' maxlength='200' min="0" max="999">
        <tr><td>Nome do Jogo <input type='text' required name='nomeJogo' id='nomeJogo' size='30' maxlength='30'>
        <tr><td>Gênero <input type='text' required name='genero' id='genero' size='11' maxlength='11'>
        <tr><td>Produtora <input type='text' required name='produtora' id='produtora' size='11' maxlength='11'>
            <tr><td>Descrição <input type='text' required name='descricao' id='decricao' size='20' maxlength='65000'>
            <tr><td>Nota <input type='text' required name='nota' id='nota' size='11' maxlength='5'>
            <tr><td>Capa <input type='text' name='capa' id='capa' size='11' maxlength='40'>
            <tr><td><input type='submit' value='Salvar'>
        </table>
</form>

   
   
    
  
   