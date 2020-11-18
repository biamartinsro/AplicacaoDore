<?php  include('../../backend/classes/Modulo.php'); ?>

<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Cadastro/CSS/materialize.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="../Cadastro/Imagens/Dore-icone.png" type="image/x-icon">
    <title>Módulos</title>
    <link rel="stylesheet" href="../Interfaces/CSS/Listas.css">
</head>

<body>

    <nav class="nav-extended teal z-depth-0">
        <div class="nav-wrapper teal container">
            <a href="PrincipalGeral.php" class="brand-logo"><img src="../Cadastro/Imagens/Dore.png"
                    alt=""></a>
                    <a class="modal-trigger" href="#sair"><i class="material-icons right">exit_to_app</i></a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="PrincipalGeral.php">Home</a></li>
                <li><a href="../Interfaces Principais/Sobre.php">Sobre</a></li>
                <li><a href="../Interfaces Principais/Contato.php">Contatos</a></li>
            </ul>
        </div>

        

        <div class="row">
            <div class="nav-content col s12">
                <ul class="tabs tabs-transparent col s11 offset-s1">
                    <li class="tab"><a href="listausuario.php">Usuários</a></li>
                    <li class="tab active"><a href="listamodulos.php">Módulos</a></li>
                    <li class="tab"><a href="listasubmodulos.php">Submódulos</a></li>
                    <li class="tab"><a href="listaespecifico.php">Específicos</a></li>
                    <li class="tab"><a href="listaitemfinal.php">Itens finais</a></li>
                    <li class="tab"><a href="listaproblemas.php">Problemas</a></li>
                    <li class="tab"><a href="listasolucoes.php">Soluções</a></li>
                    <li class="tab"><a href="listasetorinformacoes.php">Setores e Informações</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div id="sair" class="modal">
        <div class="modal-content">
            <div class="container center">
                <p style="color: black;">Tem certeza que deseja sair?</p>
                <button class="btn waves-effect waves-light" type="submit" name="action">Sim
                    <i class="material-icons right">check</i>
                </button>
                <button class="btn waves-effect waves-light" type="submit" name="action">Não
                    <i class="material-icons right">cancel</i>
                </button>
            </div>
        </div>
    </div>

    <ul class="sidenav" id="mobile-demo">
        <li><a href="../Interfaces/PrincipalAdmin.php">Home</a></li>
        <li><a href="../Principais/Sobre.php">Sobre</a></li>
        <li><a href="../Interfaces Principais/Contato.php">Contato</a></li>
    </ul>

    <div id="usuarios" class="col s12">
        <ul class="collection with-header container">
            <li class="collection-header">
                <a href="../Interfaces de Cadastro/modulo.php"><i class="material-icons right medium">add</i></a>
                <h4>Módulos</h4>
            </li>
            <li class="collection-item">  <table>
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Nome</th>
                    <th colspan="2">Ação</th>
                </tr>
            </thead>
            
            <?php 
                $m = new modulo();
                $lista_modulo = $m->lista();
                foreach($lista_modulo as $lst_modulo) { ?>
                <tr>
                    
                    <td><?php echo $lst_modulo->getIdmodulo(); ?></td>
                    <td><?php echo $lst_modulo->getNomodulo(); ?></td>
                   
                    <td>
                        <a href="../Edição/editarmodulo.php?editar=<?php echo $lst_modulo->getIdmodulo(); ?>" class="edit_btn">Alterar</a>
                    </td>
                    <td>
                        <a href="../Exclusao/excluimodulo.php?excluir=<?php echo $lst_modulo->getIdmodulo(); ?>" 
                           class="del_btn">Remover</a>
                    </td>
                </tr>
            <?php } ?>
            <tfoot>
                <td colspan="4" align="center">
                    <br> <button class="btn" name="listar" type="button" onclick="location.href='../Interfaces de Cadastro/modulo.php';">Cadastrar Módulo</button>
                </td>
            </tfoot>
        </table>
        <?php
            if (isset($_GET['exclusao'])) {
                if ($_GET['exclusao'] == 0){
                    $msg  = "<p name = 'msg' id='msg' class = 'msg_erro'>";
                    $msg .= "Exclusão não pôde ser realizada.</p>";                  
                    echo $msg;
                }
            }
        ?>         <a class="modal-trigger" href="#modal"></a>
            </li>
          
           
           
        </ul>
    </div>
    <div id="modal" class="modal">
        <div class="modal-content">
            <div class="container center">
                <p style="font-family: 'Roboto', sans-serif; font-size: 200%;">Tem certeza que deseja excluir?</p>
                <button class="btn waves-effect waves-light" type="submit" name="action">Sim
                    <i class="material-icons right">check</i>
                </button>
                <button class="btn waves-effect waves-light" type="submit" name="action">Não
                    <i class="material-icons right">cancel</i>
                </button>
            </div>
        </div>
    </div>

    <footer>
        <blockquote>Dore Refrigerantes ©</blockquote>
    </footer>

    <script src="../Cadastro/JS/jquery-3.5.1.min.js"></script>
    <script src="../Cadastro/JS/materialize.min.js"></script>
    <script>document.addEventListener('DOMContentLoaded', function () {
            var elems = document.querySelectorAll('.sidenav');
            var instances = M.Sidenav.init(elems, options);
        });
        $(document).ready(function () {
            $('.modal').modal();
        });
        $(document).ready(function () {
            $('.tooltipped').tooltip();
        });
    </script>


</body>

</html>