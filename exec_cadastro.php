<?php
include ('conexao.php');

$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$stmt = $pdo->prepare("INSERT INTO tbusuarios (nome_user, email_user, senha_user, adm) VALUES ('$nome', '$email', '$senha', 0);");
$stmt->execute();

header("Location: login.php");
?>