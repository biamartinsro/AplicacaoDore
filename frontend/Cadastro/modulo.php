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
    <link rel="stylesheet" href="CSS/Modulo.css">
    <title>Cadastrar módulo</title>
</head>

<body>
    <header>
        <nav class="teal z-depth-0">
            <div class="nav-wrapper teal container">
                <a href="../Interfaces/Principal.html" class="brand-logo"><img src="./Imagens/Dore.png" alt=""></a>
                <a class="modal-trigger" href="#sair"><i class="material-icons right">exit_to_app</i></a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a href="../Interfaces/PrincipalAdmin.php">Home</a></li>
                    <li><a href="../Interfaces Principais/Sobre.php">Sobre</a></li>
                    <li><a href="../Interfaces Principais/Contato.php">Contatos</a></li>
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

    <!-- Cadastrar o nome dos módulos -->

    <h1>Cadastrar Módulos</h1>

    <form method="post" action="modulo.php" >
       
        <div class="input-group">
            <label>Nome:</label>
            <input type="text" name="nome" id="nome" value="">
        </div>
        <div class="input-group">
            <button class="btn" type="submit" name="cadastrar" >Cadastrar</button>
            <button class="btn" name="listar" type="button" 
                    onclick="location.href='../Interfaces/listamodulos.php';">Listar
            </button>
        </div>
    </form>
    <?php
        if (isset($_POST['cadastrar'])) {
            $codigo = $_POST['codigo'];
            $nome   = $_POST['nome'];
            
            $m = new modulo();
            $m->insere($nome);

            header('location: ../Interfaces/listamodulos.php');
        }
    ?>
    <div class="row">
        <div class="col s12">
            <button data-target="modal1" class="btn modal-trigger offset-s5 col s2">Feito
                <i class="material-icons right">check</i>
            </button>
        </div>
    </div>

    <!-- Modal para mostrar que o módulo foi cadastrado com sucesso, mas provavelmente vamos
    tirá-lo para fazer essa confirmação via programação integrando ao banco de dados. -->

    <div id="modal1" class="modal">
        <div class="modal-content">
            <p>Módulo cadastrado com sucesso</p>
        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-close teal btn waves-effect waves-light">Fechar</a>
        </div>
    </div>

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