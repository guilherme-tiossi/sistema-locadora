<?php
include("conexao.php");
$user = $_GET['id'];

$stmt = $pdo->prepare("update tbusuarios set adm = 1 where id_user = '$user'");
$stmt->execute();

header("Location: home_adm.php");

?>