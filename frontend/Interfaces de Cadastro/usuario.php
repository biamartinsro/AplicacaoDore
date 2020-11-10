<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./Imagens/Dore-icone.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./CSS/materialize.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="./CSS/Usuario.css">
    <title>Cadastrar usuários</title>
</head>

<body>
    <header>
        <nav class="teal z-depth-0">
            <div class="navbar-fixed ">
                <div class="nav-wrapper teal container">
                    <a href="../Interfaces/Principal.html" class="brand-logo"><img src="./Imagens/Dore.png" alt=""></a>
                    <a class="modal-trigger" href="#sair"><i class="material-icons right">exit_to_app</i></a>
                    <ul id="nav-mobile" class="right hide-on-med-and-down">
                        <li><a href="../Interfaces/Principal.html">Home</a></li>
                        <li><a href="../Interfaces Principais/Sobre.html">Sobre</a></li>
                        <li><a href="../Interfaces Principais/Contato.html">Contatos</a></li>
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

    <!-- Cadastro de nome, email e senha -->

    <h1>Cadastrar usuários</h1>

    <div class="row">
        <form>
            <div class="input-field">
                <input type="text" id="nome">
                <label for="">Digite o nome: </label>
            </div>
            <div class="input-field">
                <input type="email" id="email">
                <label for="">Digite o e-mail: </label>
            </div>
            <div class="input-field">
                <input type="password" id="senha">
                <label for="">Digite a senha: </label>
            </div>
        </form>
    </div>

    <!-- Escolher o setor do qual o usuário faz parte -->

    <div class="tipo">
        <label>Setor: </label>
        <form class="setores">
            <p>
                <label class="setor">
                    <input class="with-gap" name="group1" type="radio" />
                    <span>Diretoria</span>
                </label>
            </p>
            <p>
                <label class="setor">
                    <input class="with-gap" name="group1" type="radio" />
                    <span>Financeiro</span>
                </label>
            </p>
            <p>
                <label class="setor">
                    <input class="with-gap" name="group1" type="radio" />
                    <span>Logística</span>
                </label>
            </p>
            <p>
                <label class="setor">
                    <input class="with-gap" name="group1" type="radio" />
                    <span>Produção</span>
                </label>
            </p>
            <p>
                <label class="setor">
                    <input class="with-gap" name="group1" type="radio" />
                    <span>Pessoal</span>
                </label>
            </p>
        </form>
    </div>

    <!-- Permitir ou negar a alteração de funcionalidades do sistema -->

    <div class="permissao">
        <label class="modificacao">Permissão para modificação: </label>
        <form class="booleanos">
            <p>
                <label>
                    <input class="with-gap" name="group1" type="radio" />
                    <span>Sim</span>
                </label>
                <label class="setor">
                    <input class="with-gap" name="group1" type="radio" />
                    <span>Não</span>
                </label>
            </p>
        </form>
    </div>
    <div class="enviar">
        <button class="btn waves-effect waves-light" type="submit" name="action">Feito
            <i class="material-icons right">check</i>
        </button>
    </div>

    <!-- Rodapé -->

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