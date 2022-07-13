<?php
session_start();
include("conexao.php");
$email = $_SESSION['email'];
$senha = $_SESSION['senha'];
$stmt = $pdo->prepare("select * from tbusuarios where email_user = '$email' and senha_user = '$senha'");
$stmt->execute();
$count = $stmt->rowCount();

if ($count != 1) {
    $_SESSION['nao_autenticado'] = true;
    header("Location: login.php");
    exit();
}

foreach ($stmt as $row){
    $adm = $row['adm'];
    $id = $row['id_user'];
    $nome = $row['nome_user'];
}

if ($count == 1 && $adm == 0){
    $_SESSION['email_user'] = $email;
    $_SESSION['senha_user'] = $senha;
    $_SESSION['id_user'] = $id;
    header("Location: home_user.php");
    exit();
}

?>