<?php
include("conexao.php");
$usuario = $_GET['id'];
$stmt = $pdo->prepare("UPDATE tbusuarios SET adm = 0 WHERE id_user = '$usuario'");
$stmt->execute();

header("Location: home_adm.php");

?>