<?php
session_start();
include("conexao.php");

if(isset($_SESSION['email'])){
$email = $_SESSION['email'];
$senha = $_SESSION['senha'];
$stmt = $pdo->prepare("SELECT * FROM tbusuarios WHERE email_user = '$email' and senha_user = '$senha'");$stmt->execute();
$count = $stmt->rowCount();

foreach ($stmt as $row){
    $adm = $row['adm'];
    $id = $row['id_user'];
}

if ($count == 1 && $adm == 2){
    $_SESSION['email'] = $email;
    $_SESSION['senha'] = $senha;
    $_SESSION['id_user'] = $id;
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
    $_SESSION['email_user'] = $email;
    $_SESSION['senha_user'] = $senha;
    $_SESSION['id_user'] = $id;
    header("Location: home_user.php");
    exit();
}
}
?>

<html>
    <form action="exec_cadastro.php" METHOD="POST">
    <input type="text" name="nome">
    <input type="email" name="email">
    <input type="password" name="senha">
    <input type="submit"> 
    </form>
    <a href="login.php"> Login </a>

</html>