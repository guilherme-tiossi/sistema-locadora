<?php
include ("conexao.php");
include ("verificacao.php");

$filme = $_POST['tx_filme'];
$genero = $_POST['slct_genero'];
$id = $_POST['hd_id'];
if ($_POST["hd_id"] > 0){
$stmt = $pdo->prepare("update tbfilmes set titulo_filme='$filme', idgenero='$genero' where id_filme='$id'");
$stmt->execute();
}
else{
$stmt = $pdo->prepare("insert into tbfilmes values ('', '$filme', '$genero')");
$stmt->execute();
}
header("Location: home.php");
?>