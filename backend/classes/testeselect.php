<?php
//chama o arquivo de configuração com o banco
include_once('ConexaoBD.php');



// abaixo montamos um formulário em html
// e preenchemos o select com dados
?>
<form name="produto" method="post" action="">
  <label>Selecione um produto</label>
  <select>
    <option>Selecione...</option>
     

    <?php while($prod = mysql_fetch_array($query)) { ?>
    <option value="<?php echo $prod['id'] ?>"><?php echo $prod['descricao'] ?></option>
    <?php } ?>
  </select>
</form>
        