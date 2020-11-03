<!DOCTYPE html>
<?php  include('../Especifico.php'); ?>
<?php  include('../Submodulo.php'); ?>
<html>
<head>
    <title>Cadastro de Especifico</title>
       <link rel="stylesheet" type="text/css" href="estilo.css">
</head>
<body>
    <h1 align="center">Cadastro de Especifico</h1>
    <form method="post" action="cadespecifico.php" >
       
        <div class="input-group">
            <label>Nome:</label>
            <input type="text" name="nome" value="">
        </div>
     
    <p>Submodulo:</p>
  <input type="radio" id="male" name="gender" value="male">
  <label for="male" value="<?php  $s = new Submodulo(); echo $s->getNome(); ?>"></label><br>
  
        <div class="input-group">
            <button class="btn" type="submit" name="cadastrar" >Cadastrar</button>
            <button class="btn" name="listar" type="button" 
                    onclick="location.href='modulolista.php';">Listar
            </button>
        </div>
    </form>
    <?php
        if (isset($_POST['cadastrar'])) {
       
            $descricao   = $_POST['descricao'];
            
            $i = new Informacao();
            $i->insere($descricao, $setor, $usuario);

            header('location: modulolista.php');
        }
    ?>
</body>
</html>
