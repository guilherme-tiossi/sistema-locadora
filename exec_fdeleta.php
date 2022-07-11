<?php
include("conexao.php");
$id = $_GET['id'];

$stmt = $pdo->prepare("delete from tbfilmes where id_filme = '$id' ");
$stmt->execute();
header("Location: home.php");
?>