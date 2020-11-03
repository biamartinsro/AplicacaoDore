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
    </head>
    <body>
        <?php
            if (isset($_GET['excluir'])) {
                $id = $_GET['excluir'];
            
                $s = new Submodulo();
                $resp = $s->exclui($id);

                header('location: submodulolista.php?exclusao='.$resp);
            }
        ?>
    </body>
</html>
