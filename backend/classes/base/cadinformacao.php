<!DOCTYPE html>
<?php  include('../Informacao.php'); ?>
<?php  include('../Setor.php'); ?>
<html>
<head>
    <title>Cadastro de Informação</title>
       <link rel="stylesheet" type="text/css" href="estilo.css">
</head>
<body>
    <h1 align="center">Cadastro de Informação</h1>
    <form method="post" action="cadinformacao.php" >
       
        <div class="input-group">
            <label>Descricao:</label>
            <input type="text" name="descricao" value="">
        </div>
     
    <p>Setor:</p>
  <input type="radio" id="male" name="gender" value="male">
  <label for="male" value="<?php  $s = new Setor(); echo $s->getNosetor(); ?>"></label><br>
  
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
