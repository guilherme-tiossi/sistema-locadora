<?php 
include("conexao.php");
    $id = $_GET['id'];
    $statusAdm = $_GET['adm'];
//tornar usuario em editor
    if($statusAdm == 1){
    $stmt = $pdo->prepare("UPDATE tbusuarios SET adm = '2' WHERE id_user = '$id'");
    $stmt->execute();
    }
//tornar usuário em administrador
    if($statusAdm == 2){
    $stmt = $pdo->prepare("UPDATE tbusuarios SET adm = '1' WHERE id_user = '$id'");
    $stmt->execute();
    }
//tornar administrador/editor em usuario comum
    if($x = 1){
    $stmt = $pdo->prepare("UPDATE tbusuarios SET adm = '0' WHERE id_user = '$id'");
    $stmt->execute();
    }
header("Location: home_adm.php");
?>
