<?php
include("conexao.php");
$id = $_GET['id'];
$genero = $_GET['genero'];
$stmt = $pdo->prepare("DELETE FROM tbgeneros WHERE id_genero = '$id' ");
$stmt->execute();
$stmt = $pdo->prepare("DELETE FROM tbfilmes WHERE idgenero = '$genero' ");
$stmt->execute();
header("Location: home_adm.php");
?>