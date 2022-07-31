<?php 
include("conexao.php");
$id = $_GET['usuario'];
$filme = $_GET['filme'];
$genero = $_GET['genero'];
$data = date('y:m:d', strtotime('+7 days'));
$stmt = $pdo->prepare("INSERT INTO tbalugueis VALUES (null, '$id', '$filme', '$genero', '$data')");
$stmt->execute();

header("Location: home_user.php");
?>