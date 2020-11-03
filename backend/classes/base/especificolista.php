<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php  include('../Especifico.php'); ?>
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
                    <th>Submodulo</th>
                    <th colspan="2">Ação</th>
                </tr>
            </thead>
            <h1 align="center">Lista de Específicos</h1>
            <?php 
                $e = new Especifico();
                $lista_especifico = $e->lista();
                foreach($lista_especifico as $lst_especifico) { ?>
                <tr>
                    <td><?php echo $lst_Especifico->getIdEspecifico() ?></td>
                    <td><?php echo $lst_Especifico->getDescricao() ?></td>
                    <td><?php echo $lst_Especifico->getSubModulo()?></td>
                    <td>
                        <a href="alteraespecifico.php?editar=<?php echo $lst_Especifico->getIdEspecifico()?>" class="edit_btn">Alterar</a>
                    </td>
                    <td>
                        <a href="excluiespecifico.php?excluir=<?php echo $lst_Especifico->getIdEspecifico() ?>" 
                           class="del_btn">Remover</a>
                    </td>
                </tr>
            <?php } ?>
            <tfoot>
                <td colspan="4" align="center">
                    <br> <button class="btn" name="listar" type="button" onclick="location.href='cadespecifico.php';">Cadastrar Específico</button>
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
