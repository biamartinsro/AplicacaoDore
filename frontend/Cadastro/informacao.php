<?php include('../../backend/classes/Setor.php'); ?>
<?php include('../../backend/classes/Informacao.php'); ?>

<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="./Imagens/Dore-icone.png" type="image/x-icon">
        <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="./CSS/materialize.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="./CSS/Setor-Informacoes.css">
        <title>Cadastrar setores e informações</title>
    </head>


    <header>
        <nav class="teal z-depth-0">
            <div class="navbar-fixed ">
                <div class="nav-wrapper teal container">
                    <a href="../Interfaces/Principal.html" class="brand-logo"><img src="./Imagens/Dore.png" alt=""></a>
                    <a class="modal-trigger" href="#sair"><i class="material-icons right">exit_to_app</i></a>
                    <ul id="nav-mobile" class="right hide-on-med-and-down">
                        <li><a href="../Interfaces/PrincipalAdmin.php">Home</a></li>
                        <li><a href="../Principais/Sobre.html">Sobre</a></li>
                        <li><a href="../Principais/Contato.html">Contatos</a></li>
                    </ul>
                </div>
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
    <form method="post" action="informacao.php" >
        <h2>Cadastrar Setores</h1>

            <!-- Cadastrar um setor -->

            <div class="row">
                <div class="col s12">
                    <div class="input-field col s4 offset-s4">
                        <input type="text" id="nome" name="setor">
                        <label for="">Digite o nome do setor: </label>
                    </div>
                </div>
            </div>
            <div class="input-group">
                <button class="btn" type="submit" name="cadastrar" >Cadastrar</button>
                <button class="btn" name="listar" type="button" 
                        onclick="location.href = '../Interfaces/listasetorinformacoes.php';">Listar
                </button>
            </div>
            <div class="botao">
                <button class="btn waves-effect waves-light" type="submit" name="action">Feito
                    <i class="material-icons right">check</i>
                </button>
            </div>
            <?php
            if (isset($_POST['cadastrar'])) {

                $nome = $_POST['setor'];

                $s = new Setor();
                $s->insere($nome);

                header('location: ../Interfaces/listasetorinformacoes.php');
            }
            ?>
    </form>
    <form method="post" action="informacao.php" >

        <h2>Cadastrar Informações</h2>

        <!-- Adicionar o conteúdo da informação -->
        <div class="row">
            
                <div class="row">
                    <div class="input-field col s6 offset-s3">
                        <textarea style="height: 100px;" id="textarea1" class="materialize-textarea"></textarea>
                        <label for="">Digite o conteúdo: </label>
                    </div>
                </div>
           
        </div>



        <h2>Lista de setores</h2>
        <?php 
                $i = new Informacao();
                $lista_informacao = $i->lista();
                foreach($lista_informacao as $lst_informacao) { ?>
        <p>
            <label>
                <input type="checkbox" />
                <span><?php  echo $i->getSetor()?></span>
            </label>
        </p>
<?php } ?>

</form>



        <div class="botao">
            <button class="btn waves-effect waves-light" type="submit" name="action">Feito
                <i class="material-icons right">check</i>
            </button>
        </div>
    </form>
    <?php
    if (isset($_POST['cadastrar'])) {

        $nome = $_POST['setor'];

        $s = new Setor();
        $s->insere($nome);

        header('location: ../Interfaces/listasetorinformacoes.php');
    }
    ?>

    <!-- Rodapé -->
    <footer>
        <blockquote>Dore Refrigerantes ©</blockquote>
    </footer>

    <script src="./JS/jquery-3.5.1.min.js"></script>
    <script src="./JS/materialize.min.js"></script>
  


</html>