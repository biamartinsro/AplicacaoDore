
<?php  include('../../backend/classes/Modulo.php'); ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./Imagens/Dore-icone.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./CSS/materialize.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="./CSS/EditarSubmodulo.css">
    <title>Editar submódulos</title>
</head>


<body>

<?php
if (isset($_GET['editar'])) {
    $id = $_GET['editar'];

    $m = new modulo();
    $modulo = $m->consulta($id);
    foreach($modulo as $lst_modulo) {
        $nome = $lst_modulo->getNoModulo();

    }
}
?>
<header>
    <nav class="teal z-depth-0">
        <div class="nav-wrapper teal container">
            <a href="../Interfaces/Principal.html" class="brand-logo"><img src="./Imagens/Dore.png" alt=""></a>
            <a href="#sair" class="modal-trigger"><i class="material-icons right">exit_to_app</i></a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="../Interfaces/Principal.html">Home</a></li>
                <li><a href="../Interfaces Principais/Sobre.html">Sobre</a></li>
                <li><a href="../Interfaces Principais/Contato.html">Contatos</a></li>
            </ul>
        </div>
    </nav>
</header>

<div id="sair" class="modal">
    <div class="modal-content">
        <div class="container center">
            <p class="confirmar">Tem certeza que deseja sair?</p>
            <button class="btn waves-effect waves-light" type="submit" name="action">Sim
                <i class="material-icons right">check</i>
            </button>
            <button class="btn waves-effect waves-light" type="submit" name="action">Não
                <i class="material-icons right">cancel</i>
            </button>
        </div>
    </div>
</div>

<h1>Editar Módulo</h1>

<?php
if (isset($_GET['editar'])) {
    $id = $_GET['editar'];

    $m = new modulo();
    $modulo = $m->consulta($id);
    foreach($modulo as $lst_modulo) {
        $nome = $lst_modulo->getNoModulo();

    }
}
?>

<form method="post" action="editarmodulo.php" >

    <div class="input-group">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
    </div>
    <div class="input-group">
        <label>Nome:</label>
        <input type="text" name="nome" value="<?php echo $nome; ?>">
    </div>

    <div class="input-group">
        <button class="btn" type="submit" name="alterar"  >Alterar</button>
    </div>
</form>
<?php
if (isset($_POST['alterar'])) {

    $nome = $_POST['nome'];
    $codigo = $_POST['id'];

    $m = new modulo();
    $m->altera($nome, $codigo);

    header('location: ../Interfaces/listamodulos.php');
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
</body>

</html>