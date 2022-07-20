<?php
session_start();

include ("conexao.php");
$email = $_POST['email'];
$senha = $_POST['senha'];
    $stmt = $pdo->prepare("SELECT * FROM tbusuarios WHERE email_user = '$email' and senha_user = '$senha'");
    $stmt->execute();
    $count = $stmt->rowcount();

foreach ($stmt as $row){
    $adm = $row['adm'];
}

if ($count == 1 && $adm == 2){
    $_SESSION['email'] = $email;
    $_SESSION['senha'] = $senha;
    header("Location: home_adm.php");
    exit();
}

else if ($count ==1 && $adm == 1){
    $_SESSION['email_user'] = $email;
    $_SESSION['senha_user'] = $senha;
    $_SESSION['id_user'] = $id;
    header("Location: home_editor.php");
    exit();
}

else if ($count ==1 && $adm == 0){
    $_SESSION['email'] = $email;
    $_SESSION['senha'] = $senha;
    header("Location: home_user.php");
    exit();
}
else{
    $_SESSION['nao_autenticado'] = true;
    header("Location: login.php");
    exit();
}

?>