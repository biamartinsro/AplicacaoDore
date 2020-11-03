<!DOCTYPE html>
<?php  include('../modulo.php'); ?>
<html>
<head>
    <title>Altera Modulo</title>
    <link rel="stylesheet" type="text/css" href="estilo.css">
</head>
<body>
    <?php
        if (isset($_GET['editar'])) {
            $id = $_GET['editar'];
            
            $m = new modulo();
            $modulo = $m->consulta($id); 
            foreach($modulo as $lst_modulo) {
                $nome = $lst_modulo->getNomodulo();
            } 
        }
    ?>    
    <h1 align="center">Alteração de Modulo</h1>    
    <form method="post" action="alteramodulo.php" >
        <div class="input-group">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
        </div>
        <div class="input-group">
            <label>Nome:</label>
            <input type="text" name="nome" value="<?php echo $nome; ?>">
        </div>
        <div class="input-group">
            <button class="btn" type="submit" name="alterar" style="background: #556B2F;" >Alterar</button>
        </div>
    </form>
    <?php
        if (isset($_POST['alterar'])) {
            $id = $_POST['id'];
            $nome = $_POST['nome'];
            
            $m = new modulo();
            $m->altera($nome, $id);

            header('location: modulolista.php');
        }
    ?>
</body>
</html>
