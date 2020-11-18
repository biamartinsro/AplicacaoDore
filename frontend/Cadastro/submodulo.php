<?php  include('../../backend/classes/Submodulo.php'); ?>
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
    <link rel="stylesheet" href="./CSS/Submodulo.css">
    <title>Cadastrar sobmódulos</title>
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
    <form method="post" action="submodulo.php">
    <h1>Cadastrar Submódulo</h1>

    <div class="row">
        <div class="col s12">
            <div class="input-field col s4 offset-s4">
                <input type="text" id="nome">
                <label for="">Digite o nome do submódulo: </label>
            </div>
            <div class="col s12" style="height: 20px;"></div>
        </div>
    </div>
        <!-- Modal -->
        <div class="row">
            <div class="col s12">
                <button data-target="modal1" class="btn modal-trigger offset-s3 col s6">Escolha o Módulo</button>
            </div>
        </div>

        <div id="modal1" class="modal">
            <div class="modal-content">
             <?php 
                $m = new modulo();
                $lista_modulo = $m->lista();
                foreach($lista_modulo as $lst_modulo) { ?>
                    <h2>Lista de Módulos</h2>
                    <p>
                        <label>
                            <input class="with-gap" name="modulo" type="radio"/>
                            
                            <span><?php echo $lst_modulo->getIdmodulo(); ?></span>
                               <span><?php echo $lst_modulo->getNomodulo(); ?></span>
                        </label>
                    </p>
                                  
                
                <?php } ?>
                
            </div>
            <div class="modal-footer">
                <a href="#!" class="modal-close waves-effect waves-green btn-flat">Pronto</a>
            </div>
        </div>

         <div class="input-group">
            <button class="btn" type="submit" name="cadastrar" >Cadastrar</button>
            <button class="btn" name="listar" type="button" 
                    onclick="location.href='../Interfaces/listasubmodulos.php';">Listar
            </button>
        </div>
    </form>

   <?php
        if (isset($_POST['cadastrar'])) {
          
            $nome   = $_POST['nome'];
            $idmodulo = $_POST['modulo'];
            
            $s = new Submodulo();
            $s->insere($nosubmodulo, $idmodulo);

            header('location: ../Interfaces/listasubmodulos.php');
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