<?php
include ("conexao.php");

$genero = $_POST['tx_genero'];
$id = $_POST['hd_id'];

if ($id > 0){
    $stmt = $pdo->prepare("update tbgeneros set genero = '$genero' where id_genero = '$id'");
    $stmt->execute();
}
else{
$stmt = $pdo->prepare("insert into tbgeneros values ('', '$genero')");
$stmt->execute();
}
header("Location: home_adm.php");
?>