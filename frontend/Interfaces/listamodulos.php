<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Interfaces de Cadastro/CSS/materialize.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="../Interfaces de Cadastro/Imagens/Dore-icone.png" type="image/x-icon">
    <title>Lista de módulos</title>
    <link rel="stylesheet" href="./CSS/Listas.css">
</head>

<body>

    <nav class="nav-extended teal z-depth-0">
        <div class="nav-wrapper teal container">
            <a href="./Principal.html" class="brand-logo"><img src="../Interfaces de Cadastro/Imagens/Dore.png"
                    alt=""></a>
                    <a class="modal-trigger" href="#sair"><i class="material-icons right">exit_to_app</i></a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="Principal.html">Home</a></li>
                <li><a href="../Interfaces Principais/Sobre.html">Sobre</a></li>
                <li><a href="../Interfaces Principais/Contato.html">Contatos</a></li>
            </ul>
        </div>

        

        <div class="row">
            <div class="nav-content col s12">
                <ul class="tabs tabs-transparent col s11 offset-s1">
                    <li class="tab"><a href="listaUsuários.html">Usuários</a></li>
                    <li class="tab active"><a href="listaModulos.html">Módulos</a></li>
                    <li class="tab"><a href="listaSubmodulos.html">Submódulos</a></li>
                    <li class="tab"><a href="listaEspecificos.html">Específicos</a></li>
                    <li class="tab"><a href="listaItensFinais.html">Itens finais</a></li>
                    <li class="tab"><a href="listaProblemas.html">Problemas</a></li>
                    <li class="tab"><a href="listaSolucoes.html">Soluções</a></li>
                    <li class="tab"><a href="listaSetor-Informacoes.html">Setores e Informações</a></li>
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
        <li><a href="Principal.html">Home</a></li>
        <li><a href="">Sobre</a></li>
        <li><a href="">Contato</a></li>
    </ul>

    <div id="modulos" class="col s12">
        <ul class="collection with-header container">
            <li class="collection-header">
                <a href="../Interfaces de Cadastro/Modulo.html"><i class="material-icons right medium">add</i></a>
                <h4>Módulos</h4>
            </li>
            <li class="collection-item">Software
                <a class="modal-trigger" href="#modal"><i class="material-icons right small">delete</i></a>
                <a href="../Interfaces de Edição/Editar_Modulo.html"><i
                        class="material-icons right small">create</i></a>
            </li>
            <li class="collection-item">Hardware
                <a class="modal-trigger" href="#modal"><i class="material-icons right small">delete</i></a>
                <a href=""><i class="material-icons right small">create</i></a>
            </li>
            <li class="collection-item">Segurança
                <a class="modal-trigger" href="#modal"><i class="material-icons right small">delete</i></a>
                <a href=""><i class="material-icons right small">create</i></a>
            </li>
            <li class="collection-item">ERP
                <a class="modal-trigger" href="#modal"><i class="material-icons right small">delete</i></a>
                <a href=""><i class="material-icons right small">create</i></a>
            </li>
            <li class="collection-item">Redes
                <a class="modal-trigger" href="#modal"><i class="material-icons right small">delete</i></a>
                <a href=""><i class="material-icons right small">create</i></a>
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

    <script src="../Interfaces de Cadastro/JS/jquery-3.5.1.min.js"></script>
    <script src="../Interfaces de Cadastro/JS/materialize.min.js"></script>
    <script>$(document).ready(function () {
            $('.modal').modal();
        });</script>

</body>

</html>