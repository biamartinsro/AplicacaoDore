<!DOCTYPE html>
<?php  include('../usuario.php'); ?>
<html>
<head>
    <title>Cadastro de Usuario</title>
    <link rel="stylesheet" type="text/css" href="estilo.css">
</head>
<body>
    <h1 align="center">Cadastro de Usuario</h1>
    <form method="post" action="cadusuario.php" >
        
        <div class="input-group">
            <label>Nome:</label>
            <input type="text" name="nome" value="">
        </div>
        <div class="input-group">
            <label>Email:</label>
            <input type="email" name="email" value="">
        </div>
           <div class="input-group">
            <label>Senha:</label>
            <input type="password" name="senha" value="">
        </div>
         <div class="input-group">
            <label>Setor:</label>
            <input list="setores">

<datalist id="setores">

    <option value="<?php $u = new Usuario(); echo $u->getSetor(); ?>"</option>
</datalist>

        </div>
        <div class="input-group">
            <button class="btn" type="submit" name="cadastrar" >Cadastrar</button>
            <button class="btn" name="listar" type="button" 
                    onclick="location.href='CursoLista.php';">Listar
            </button>
        </div>
    </form>
    <?php
        if (isset($_POST['cadastrar'])) {
            $codigo = $_POST['codigo'];
            $nome   = $_POST['nome'];
            
            $c = new Curso();
            $c->insere($codigo, $nome);

            header('location: usuariolista.php');
        }
    ?>
</body>
</html>
