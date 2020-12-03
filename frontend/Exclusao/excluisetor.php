<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php  include('../../backend/classes/Setor.php'); ?>

<html>
<head>
    <meta charset="UTF-8">
    <title></title>

</head>
<body>
<?php
if (isset($_GET['excluir'])) {
    $codigo = $_GET['excluir'];

    $s = new Setor();
    $resp = $s->exclui($codigo);

    header('location: ../Interfaces/listasetorinformacoes.php?exclusao='.$resp);
}
?>
</body>
</html>
