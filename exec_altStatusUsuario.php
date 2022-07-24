<?php 
include("conexao.php");
    $id = $_GET['id'];
    $x = $_GET['x'];
    echo "ID = " . $id . "  X = " .$x;

//tornar administrador/editor em usuario comum
    if($x == 1){
    $stmt = $pdo->prepare("UPDATE tbusuarios SET adm = '1' WHERE id_user = '$id'");
    $stmt->execute();
    }
    if($x == 2){
    $stmt = $pdo->prepare("UPDATE tbusuarios SET adm = '2' WHERE id_user = '$id'");
    $stmt->execute();
    }
    if($x == 0){
    $stmt = $pdo->prepare("UPDATE tbusuarios SET adm = '0' WHERE id_user = '$id'");
    $stmt->execute();
    }

    header("Location: home_adm.php");
?>
