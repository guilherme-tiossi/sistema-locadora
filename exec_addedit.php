<?php
include("conexao.php");
$user = $_GET['id'];

$stmt = $pdo->prepare("UPDATE tbusuarios SET adm = 1 WHERE id_user = '$user'");
$stmt->execute();

header("Location: home_adm.php");

?>