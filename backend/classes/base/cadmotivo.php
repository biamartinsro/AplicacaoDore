<!DOCTYPE html>
<?php  include('../Motivo.php'); ?>
<html>
<head>
    <title>Cadastro de Motivo</title>
       <link rel="stylesheet" type="text/css" href="estilo.css">
</head>
<body>
    <h1 align="center">Cadastro de Motivo</h1>
    <form method="post" action="cadmotivo.php" >
       
        <div class="input-group">
            <label>Descrição:</label>
            <input type="text" name="descricao" value="">
        </div>
        <div class="input-group">
            <button class="btn" type="submit" name="cadastrar" >Cadastrar</button>
            <button class="btn" name="listar" type="button" 
                    onclick="location.href='motivolisalista.php';">Listar
            </button>
        </div>
    </form>
    <?php
        if (isset($_POST['cadastrar'])) {
       
            $descricao   = $_POST['descricao'];
            
            $m = new Motivo();
            $m->insere($descricao);

            header('location: motivolista.php');
        }
    ?>
</body>
</html>
