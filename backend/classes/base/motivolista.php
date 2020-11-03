<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php  include('../Motivo.php'); ?>
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
            <h1 align="center">Lista de Motivos</h1>
            <?php 
                $m = new Motivo(); 
                $lista_motivo = $m->lista();
                foreach($lista_motivo as $lst_motivo) { ?>
                <tr>
                    <td><?php echo $lst_motivo->getIdmotivo() ?></td>
                    <td><?php echo $lst_motivo->getDescricao() ?></td>
                    <td>
                        <a href="alteramotivo.php?editar=<?php echo $lst_motivo->getIdmotivo()?>" class="edit_btn">Alterar</a>
                    </td>
                    <td>
                        <a href="excluimotivo.php?excluir=<?php echo $lst_motivo->getIdmotivo() ?>" 
                           class="del_btn">Remover</a>
                    </td>
                </tr>
            <?php } ?>
            <tfoot>
                <td colspan="4" align="center">
                    <br> <button class="btn" name="listar" type="button" onclick="location.href='cadmotivo.php';">Cadastrar Motivo</button>
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
