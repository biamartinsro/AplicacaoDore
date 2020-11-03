<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php  include('../usuario.php'); ?>
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
                    <th>Nome</th>
                    <th>Setor</th>
                    <th colspan="2">Ação</th>
                </tr>
            </thead>
            <h1 align="center">Lista de usuarios</h1>
            <?php 
                $c = new usuario(); 
                $lista_usuario = $c->lista();
                foreach($lista_usuario as $lst_usuario) { ?>
                <tr>
                    
                    <td><?php echo $lst_usuario->getNousuario() ?></td>
                    <td><?php echo $lst_usuario->getSetor() ?></td>
                    <td>
                        <a href="usuarioAltera.php?editar=<?php echo $lst_usuario->getIdusuario(); ?>" class="edit_btn">Alterar</a>
                    </td>
                    <td>
                        <a href="usuarioExclui.php?excluir=<?php echo $lst_usuario->getIdusuario(); ?>" 
                           class="del_btn">Remover</a>
                    </td>
                </tr>
            <?php } ?>
            <tfoot>
                <td colspan="4" align="center">
                    <br> <button class="btn" name="listar" type="button" onclick="location.href='usuarioCadastra.php';">Cadastrar usuario</button>
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
