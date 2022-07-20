<?php
include ("conexao.php");

$filme = $_POST['tx_filme'];
$genero = $_POST['slct_genero'];
$id = $_POST['hd_idfilme'];

$stmt = $pdo->prepare("SELECT * FROM tbgeneros WHERE genero = '$genero'");
$stmt->execute();
foreach ($stmt as $row){
    $genero = $row['id_genero'];
}

echo $filme . " " . $genero . " " . $id;

if ($id > 0){
$stmt = $pdo->prepare("UPDATE tbfilmes SET titulo_filme='$filme', id_genero='$genero' WHERE id_filme='$id'");
$stmt->execute();
}
else{
$stmt = $pdo->prepare("INSERT INTO tbfilmes VALUES (null, '$filme', '$genero')");
$stmt->execute();
}
header("Location: home_adm.php");
?> 