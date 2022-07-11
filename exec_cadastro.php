<?php
include ('conexao.php');

$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$stmt = $pdo->prepare("insert into tbusuarios (nome_user, email_user, senha_user) values ('$nome', '$email', '$senha');");
$stmt->execute();

header("Location: login.php");
?>