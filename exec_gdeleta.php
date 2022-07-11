<?php
include("conexao.php");
$id = $_GET['id'];
$genero = $_GET['genero'];
$stmt = $pdo->prepare("delete from tbgeneros where id_genero = '$id' ");
$stmt->execute();
$stmt = $pdo->prepare("delete from tbfilmes where idgenero = '$genero' ");
$stmt->execute();
header("Location: home.php");
?>