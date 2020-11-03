<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php  include('../informacao.php'); ?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" type="text/css" href="estilo.css">
    </head>
    <body>
        <table>
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Descrição</th>
                    <th colspan="2">Ação</th>
                </tr>
            </thead>
            <h1 align="center">Lista de Informações</h1>
            <?php 
                $i = new Informacao();
                $lista_informacao = $i->lista();
                foreach($lista_informacao as $lst_informacao) { ?>
                <tr>
                    <td><?php echo $lst_informacao->getIdinformacao() ?></td>
                    <td><?php echo $lst_informacao->getDescricao() ?></td>
                    <td>
                        <a href="alterainformacao.php?editar=<?php echo $lst_informacao->getIdinformacao()?>" class="edit_btn">Alterar</a>
                    </td>
                    <td>
                        <a href="excluiinformacao.php?excluir=<?php echo $lst_informacao->getIdinformacao() ?>" 
                           class="del_btn">Remover</a>
                    </td>
                </tr>
            <?php } ?>
            <tfoot>
                <td colspan="4" align="center">
                    <br> <button class="btn" name="listar" type="button" onclick="location.href='cadinformacao.php';">Cadastrar Informação</button>
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
        ?>       
    </body>
</html>
