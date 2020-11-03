<!DOCTYPE html>
<?php  include('../Motivo.php'); ?>
<html>
<head>
    <title>Altera Motivo</title>
    <link rel="stylesheet" type="text/css" href="estilo.css">
</head>
<body>
    <?php
        if (isset($_GET['editar'])) {
            $id = $_GET['editar'];
            
            $m = new Motivo();
            $motivo = $m->consulta($id); 
            foreach($motivo as $lst_motivo) {
                $descricao = $lst_motivo->getDescricao();
            } 
        }
    ?>    
    <h1 align="center">Alteração de Motivo</h1>    
    <form method="post" action="alteramotivo.php" >
        <div class="input-group">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
        </div>
        <div class="input-group">
            <label>Descrição:</label>
            <input type="text" name="descricao" value="<?php echo $descricao; ?>">
        </div>
        <div class="input-group">
            <button class="btn" type="submit" name="alterar" style="background: #556B2F;" >Alterar</button>
        </div>
    </form>
    <?php
        if (isset($_POST['alterar'])) {
            $codigo = $_POST['id'];
            $descricao = $_POST['descricao'];
            
            $m = new Motivo();
            $m->altera($descricao, $codigo);

            header('location: motivolista.php');
        }
    ?>
</body>
</html>
