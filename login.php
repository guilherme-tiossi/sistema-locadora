<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <script src="script.js" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>LocaCult</title>
    </head>

<?php
session_start();
include("conexao.php");

if(isset($_SESSION['email'])){
$email = $_SESSION['email'];
$stmt = $pdo->prepare("SELECT * FROM tbusuarios WHERE email_user = '$email' and senha_user = '$senha'");$stmt->execute();
$count = $stmt->rowCount();

foreach ($stmt as $row){
    $adm = $row['adm'];
    $id = $row['id_user'];
}

if ($count == 1 && $adm == 1){
    $_SESSION['email'] = $email;
    $_SESSION['senha'] = $senha;
    $_SESSION['id_user'] = $id;
    header("Location: home_adm.php");
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

<div class="center-screen">
<h2 class="titulo">💿 LOGIN </h2>
<div class="form">
<form action="exec_login.php" METHOD="POST">
    <label>E-mail</label> <br>
    <input type="email" name="email">
    <label>Senha</label> <br>
    <input type="password" name="senha">
 <a href="cadastro.php"> Não tenho uma conta </a> <br>
    <button type="submit" class="button1"> Login </button> 
</form>
</div>
</div>

</html>