<?php
session_start();

include ("conexao.php");
$email = $_POST['email'];
$senha = $_POST['senha'];
    $stmt = $pdo->prepare("select email_user from tbusuarios where email_user = '$email' and senha_user = '$senha'");
    $stmt->execute();
    $row = $stmt->rowcount();
    $stmt->fetch();

if ($row == 1){
    $_SESSION['email'] = $email;
    header("Location: home.php");
    exit();
}
else{
    $_SESSION['nao_autenticado'] = true;
    header("Location: login.php");
    exit();
}

?>