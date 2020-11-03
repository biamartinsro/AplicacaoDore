<!DOCTYPE html>
<?php  include('../Especifico.php'); ?>
<html>
<head>
    <title>Altera Especifico</title>
    <link rel="stylesheet" type="text/css" href="estilo.css">
</head>
<body>
    <?php
        if (isset($_GET['editar'])) {
            $id = $_GET['editar'];
            
            $e = new Especifico();
            $informacao = $i->consulta($id);
            foreach($informacao as $lst_informacao) {
                $nome = $lst_informacao->getDescricao();
            } 
        }
    ?>    
    <h1 align="center">Alteração de Informação</h1>    
    <form method="post" action="alterainformacao.php" >
        <div class="input-group">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
        </div>
        <div class="input-group">
            <label>Descrição:</label>
            <input type="text" name="descricao" value="<?php echo $nome; ?>">
        </div>
        <div class="input-group">
            <button class="btn" type="submit" name="alterar" style="background: #556B2F;" >Alterar</button>
        </div>
    </form>
    <?php
        if (isset($_POST['alterar'])) {
            $id = $_POST['id'];
            $descricao = $_POST['nome'];
            
            $i = new Informacao();
            $i->altera($descricao, $id);

            header('location: informacaolista.php');
        }
    ?>
</body>
</html>
