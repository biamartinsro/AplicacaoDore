<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php  include('../modulo.php'); ?>
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
                    <th>Nome</th>
                    <th colspan="2">Ação</th>
                </tr>
            </thead>
            <h1 align="center">Lista de modulos</h1>
            <?php 
                $m = new modulo(); 
                $lista_modulo = $m->lista();
                foreach($lista_modulo as $lst_modulo) { ?>
                <tr>
                    <td><?php echo $lst_modulo->getIdmodulo(); ?></td>
                    <td><?php echo $lst_modulo->getNomodulo() ?></td>
                    <td>
                        <a href="alteramodulo.php?editar=<?php echo $lst_modulo->getIdmodulo() ?>" class="edit_btn">Alterar</a>
                    </td>
                    <td>
                        <a href="excluimodulo.php?excluir=<?php echo $lst_modulo->getIdmodulo(); ?>" 
                           class="del_btn">Remover</a>
                    </td>
                </tr>
            <?php } ?>
            <tfoot>
                <td colspan="4" align="center">
                    <br> <button class="btn" name="listar" type="button" onclick="location.href='cadmodulo.php';">Cadastrar Modulo</button>
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
