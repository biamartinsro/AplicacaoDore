<!DOCTYPE html>
<?php  include('../Submodulo.php'); ?>

<html>
<head>
    <title>Cadastro de Submodulo</title>
       <link rel="stylesheet" type="text/css" href="estilo.css">
</head>
<body>
    <h1 align="center">Cadastro de Submodulo</h1>
    <form method="post" action="cadsubmodulo.php" >
       
        <div class="input-group">
            <label>Nome:</label>
            <input type="text" name="nome" value="">
        </div>
        <div class="input-group">
            <label>Modulo:</label>
            <input list="modulos">

<datalist id="modulos">

    <option value="<?php echo $s = new Submodulo(); $s->getModulo(); ?>"</option>
</datalist>

        </div>
        <div class="input-group">
            <button class="btn" type="submit" name="cadastrar" >Cadastrar</button>
            <button class="btn" name="listar" type="button" 
                    onclick="location.href='submodulolista.php';">Listar
            </button>
        </div>
    </form>
    <?php
        if (isset($_POST['cadastrar'])) {
       
            $nome   = $_POST['nome'];
            
            $s = new Submodulo();
            $s->insere($nome, $idmodulo);

            header('location: submodulolista.php');
        }
    ?>
</body>
</html>
