<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php  include('../Submodulo.php'); ?>
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
                     <th>Módulo</th>
                    <th colspan="2">Ação</th>
                </tr>
            </thead>
            <h1 align="center">Lista de Submodulo</h1>
            <?php 
                $s = new Submodulo();
                $lista_submodulo = $s->lista();
                foreach($lista_submodulo as $lst_submodulo) { ?>
                <tr>
                    <td><?php echo $lst_submodulo->getIdsubmodulo(); ?></td>
                    <td><?php echo $lst_submodulo->getNome(); ?></td>
                    <td><?php echo $lst_submodulo->getModulo(); ?></td>
                    
                    <td>
                        <a href="alterasubmodulo.php?editar=<?php echo $lst_submodulo->getIdsubmodulo(); ?>" class="edit_btn">Alterar</a>
                    </td>
                    <td>
                        <a href="excluisubmodulo.php?excluir=<?php echo $lst_submodulo->getIdsubmodulo(); ?>" 
                           class="del_btn">Remover</a>
                    </td>
                </tr>
            <?php } ?>
            <tfoot>
                <td colspan="4" align="center">
                    <br> <button class="btn" name="listar" type="button" onclick="location.href='cadsubmodulo.php';">Cadastrar Submodulo</button>
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
