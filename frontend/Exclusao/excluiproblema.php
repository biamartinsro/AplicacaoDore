<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php  include('../../backend/classes/Problema.php'); ?>

<html>
<head>
    <meta charset="UTF-8">
    <title></title>

</head>
<body>
<?php
if (isset($_GET['excluir'])) {
    $codigo = $_GET['excluir'];

    $p = new Problema();
    $resp = $p->exclui($codigo);

    header('location: ../Interfaces/listaproblemas.php?exclusao='.$resp);
}
?>
</body>
</html>
