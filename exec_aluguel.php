<?php 
include("conexao.php");
$id = $_GET['usuario'];
$filme = $_GET['filme'];
$data = date('y:m:d', strtotime('+7 days'));
$stmt = $pdo->prepare("INSERT INTO tbalugueis VALUES (null, '$id', '$filme', '$data')");
$stmt->execute();

header("Location: home_user.php");
?>