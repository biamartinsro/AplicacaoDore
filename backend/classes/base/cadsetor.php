<!DOCTYPE html>
<?php  include('../Setor.php'); ?>
<html>
<head>
    <title>Cadastro de Setor</title>
       <link rel="stylesheet" type="text/css" href="estilo.css">
</head>
<body>
    <h1 align="center">Cadastro de Setor</h1>
    <form method="post" action="cadsetor.php" >
       
        <div class="input-group">
            <label>Nome:</label>
            <input type="text" name="nome" value="">
        </div>
        <div class="input-group">
            <button class="btn" type="submit" name="cadastrar" >Cadastrar</button>
            <button class="btn" name="listar" type="button" 
                    onclick="location.href='setorlista.php';">Listar
            </button>
        </div>
    </form>
    <?php
        if (isset($_POST['cadastrar'])) {
       
            $nome   = $_POST['nome'];
            
            $s = new Setor();
            $s->insere($nome);

            header('location: setorlista.php');
        }
    ?>
</body>
</html>
