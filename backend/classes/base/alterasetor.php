<!DOCTYPE html>
<?php  include('../Setor.php'); ?>
<html>
<head>
    <title>Altera Setor</title>
    <link rel="stylesheet" type="text/css" href="estilo.css">
</head>
<body>
    <?php
        if (isset($_GET['editar'])) {
            $id = $_GET['editar'];
            
            $s = new Setor();
            $setor = $s->consulta($id); 
            foreach($setor as $lst_setor) {
                $nome = $lst_setor->getNosetor();
            } 
        }
    ?>    
    <h1 align="center">Alteração de Setor</h1>    
    <form method="post" action="alterasetor.php" >
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
            
            $m = new Setor();
            $m->altera($nome, $id);

            header('location: setorlista.php');
        }
    ?>
</body>
</html>
