<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Interfaces de Cadastro/CSS/materialize.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="../Interfaces de Cadastro/Imagens/Dore-icone.png" type="image/x-icon">
    <title>Tela inicial</title>
    <link rel="stylesheet" href="./CSS/Usuario_normal.css">
</head>

<body>
    <header>
        <nav class="teal z-depth-0">
            <div class="navbar-fixed">
                <div class="nav-wrapper teal container">
                    <a href="./Principal.html" class="brand-logo"><img src="../Interfaces de Cadastro/Imagens/Dore.png" alt=""></a>
                    <a class="modal-trigger" href="#sair"><i class="material-icons right">exit_to_app</i></a>
                    <ul id="nav-mobile" class="right hide-on-med-and-down">
                        <li><a href="Principal.html">Home</a></li>
                        <li><a href="../Sobre e Contato/Sobre.html">Sobre</a></li>
                        <li><a href="../Sobre e Contato/Contato.html">Contatos</a></li>
                    </ul>
                </div>
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


    <div class="titulo">
        <h6>Mais requisitados</h6>
    </div>

    <div class="row">
        <div>
            <fieldset class="teal">
                <a href="" class="requisitado">
                    Banco de dados não conectado
                </a>
            </fieldset>
        </div>
        <div>
            <fieldset class="teal">
                <a href="" class="requisitado">
                    Erro de inicializar projeto
                </a>
            </fieldset>
        </div>
        <div>
            <fieldset class="teal">
                <a href="" class="requisitado">
                    Emitir nota fiscal
                </a>
            </fieldset>
        </div>
    </div>

    <ul class="pagination">
        <li class="disabled"><a><i class="material-icons">chevron_left</i></a></li>
        <li class="active teal"><a href="#!">1</a></li>
        <li class="waves-effect"><a href="#!">2</a></li>
        <li class="waves-effect"><a href="#!">3</a></li>
        <li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
    </ul>

    </div>
    <div class="funcoes">
        <div class="opcao">
            <a href="" class="link">
                <i class="material-icons large funcao">search</i>
            </a>
            <p class="opcoes">Pesquisar</p>

        </div>
        <div class="opcao"><a href="./sugestoes.html" class="link">
                <i class="material-icons large funcao">question_answer</i></a>
            <p class="opcoes">Sugestões</p>

        </div>
    </div>

    <h6>Avisos</h6>

    <div class="informacoes">
        <div class="card teal">
            <div class="card-content white-text">
                <span class="card-title">SAIB</span>
                <p>I am a very simple card. I am good at containing small bits of information.
                    I am convenient because I require little markup to use effectively.</p>
            </div>
        </div>
        <div class="card teal">
            <div class="card-content white-text">
                <span class="card-title">ERP</span>
                <p>I am a very simple card. I am good at containing small bits of information.
                    I am convenient because I require little markup to use effectively.</p>
            </div>
        </div>
        <div class="card teal">
            <div class="card-content white-text">
                <span class="card-title">KPI</span>
                <p>I am a very simple card. I am good at containing small bits of information.
                    I am convenient because I require little markup to use effectively.</p>
            </div>
        </div>
        <div class="card teal">
            <div class="card-content white-text">
                <span class="card-title">REAL</span>
                <p>I am a very simple card. I am good at containing small bits of information.
                    I am convenient because I require little markup to use effectively.</p>
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