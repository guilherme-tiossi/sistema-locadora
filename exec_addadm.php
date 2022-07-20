<?php
include("conexao.php");
$user = $_GET['id'];

$stmt = $pdo->prepare("UPDATE tbusuarios set adm = 2 WHERE id_user = '$user'");
$stmt->execute();

header("Location: home_adm.php");

?>