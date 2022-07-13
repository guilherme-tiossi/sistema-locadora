<?php
include("conexao.php");
$usuario = $_GET['id'];
$stmt = $pdo->prepare("update tbusuarios set adm = 0 where id_user = '$usuario'");
$stmt->execute();

header("Location: home_adm.php");

?>