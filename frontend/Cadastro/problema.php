<?php  include('../../backend/classes/Problema.php'); ?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./Imagens/Dore-icone.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./CSS/materialize.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="./CSS/Submodulo.css">
    <title>Cadastrar Problema</title>
</head>



<header>
    <nav class="teal z-depth-0">
        <div class="nav-wrapper teal container">
            <a href="../Interfaces/Principal.html" class="brand-logo"><img src="./Imagens/Dore.png" alt=""></a>
            <a class="modal-trigger" href="#sair"><i class="material-icons right">exit_to_app</i></a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="../Interfaces/PrincipalAdmin.php">Home</a></li>
                <li><a href="../Principais/Sobre.php">Sobre</a></li>
                <li><a href="../Principais/Contato.php">Contatos</a></li>
            </ul>
        </div>
    </nav>
</header>

<div id="sair" class="modal">
    <div class="modal-content">
        <div class="container center">
            <p  class="confirmar">Tem certeza que deseja sair?</p>
            <button class="btn waves-effect waves-light" type="submit" name="action">Sim
                <i class="material-icons right">check</i>
            </button>
            <button class="btn waves-effect waves-light" type="submit" name="action">Não
                <i class="material-icons right">cancel</i>
            </button>
        </div>
    </div>
</div>

<h1>Cadastrar Problema</h1>
<form method="post" action="problema.php" >

    <div class="input-group">
        <label>Descrição:</label>
        <input type="text" name="descricao" value="">
    </div>
    <div class="input-group">
        <label>Solução:</label>
        <input type="url" name="solucao" value="">
    </div>
    <div class="input-group">
        <label>Item Final:</label>
        <input type="number" name="itemfinal" value="">
    </div>
    <div class="input-group">
        <button class="btn" type="submit" name="cadastrar" >Cadastrar</button>
        <button class="btn" name="listar" type="button"
                onclick="location.href='../Interfaces/listaproblemas.php';">Listar
        </button>
    </div>
</form>
<?php
if (isset($_POST['cadastrar'])) {
    $descricao = $_POST['descricao'];
    $solucao = $_POST['solucao'];
    $itemfinal = $_POST['itemfinal'];


    $p = new Problema();
    $p->insere($descricao, $solucao, $itemfinal);

    header('location: ../Interfaces/listaproblemas.php');
}
?>

<!-- Rodapé -->
<footer>
    <blockquote>Dore Refrigerantes ©</blockquote>
</footer>

<!-- Tags JavaScript necessários para o Materialize funcionar -->
<script src="./JS/jquery-3.5.1.min.js"></script>
<script src="./JS/materialize.min.js"></script>
<script>
    $(document).ready(function () {
        $('.modal').modal();
    });
</script>


</html>