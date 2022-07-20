<?php
include ("conexao.php");

$genero = $_POST['tx_genero'];
$id = $_POST['hd_idgenero'];

if ($id > 0){
    $stmt = $pdo->prepare("UPDATE tbgeneros SET genero = '$genero' WHERE id_genero = '$id'");
    $stmt->execute();
}
else{
$stmt = $pdo->prepare("INSERT INTO tbgeneros VALUES (null, '$genero')");
$stmt->execute();
}
header("Location: home_adm.php");
?>