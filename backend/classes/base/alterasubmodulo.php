<!DOCTYPE html>
<?php  include('../Submodulo.php'); ?>
<html>
<head>
    <title>Altera Submodulo</title>
    <link rel="stylesheet" type="text/css" href="estilo.css">
</head>
<body>
    <?php
        if (isset($_GET['editar'])) {
            $id = $_GET['editar'];
            
            $s = new Submodulo();
            $submodulo = $s->consulta($id);
            foreach($submodulo as $lst_submodulo) {
                $nome = $lst_submodulo->getNome();
            } 
        }
    ?>    
    <h1 align="center">Alteração de Submodulo</h1>    
    <form method="post" action="alterasubmodulo.php" >
        <div class="input-group">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
        </div>
        <div class="input-group">
            <label>Descrição:</label>
            <input type="text" name="nome" value="<?php echo $nome; ?>">
        </div>
        <div class="input-group">
            <button class="btn" type="submit" name="alterar" style="background: #556B2F;" >Alterar</button>
        </div>
    </form>
    <?php
        if (isset($_POST['alterar'])) {
            $codigo = $_POST['id'];
            $nome = $_POST['nome'];
            
            $s = new Submodulo();
            $s->altera($nome, $codigo);

            header('location: submodulolista.php');
        }
    ?>
</body>
</html>
