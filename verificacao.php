<?php
session_start();
include("conexao.php");

$email = $_SESSION['email'];
$stmt = $pdo->prepare("select nome_user, email_user, id_user from tbusuarios where email_user = '$email'");
$stmt->execute();


if (!isset($email)){
    header("Location: login.php");
    exit();
}

foreach ($stmt as $row){
    $nome = $row['nome_user'];
    $email = $row['email_user'];
    $id = $row['id_user'];
}


$_SESSION['userLogin'] = $email;
$_SESSION['userId'] = $id;

?>