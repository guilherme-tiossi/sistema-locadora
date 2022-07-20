<?php
include("conexao.php");
$id = $_GET['id'];

$stmt = $pdo->prepare("DELETE FROM tbfilmes WHERE id_filme = '$id' ");
$stmt->execute();
header("Location: home_adm.php");
?>