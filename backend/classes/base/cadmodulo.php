<!DOCTYPE html>
<?php  include('../modulo.php'); ?>

<html>
<head>
    <title>Cadastro de Modulo</title>
       <link rel="stylesheet" type="text/css" href="estilo.css">
</head>
<body>
    <h1 align="center">Cadastro de modulo</h1>
    <form method="post" action="cadmodulo.php" >
       
        <div class="input-group">
            <label>Nome:</label>
            <input type="text" name="nome" value="">
        </div>
        <div class="input-group">
            <button class="btn" type="submit" name="cadastrar" >Cadastrar</button>
            <button class="btn" name="listar" type="button" 
                    onclick="location.href='modulolista.php';">Listar
            </button>
        </div>
    </form>
    <?php
        if (isset($_POST['cadastrar'])) {
       
            $nome   = $_POST['nome'];
            
            $m = new modulo();
            $m->insere($nome);

            header('location: modulolista.php');
        }
    ?>
</body>
</html>
