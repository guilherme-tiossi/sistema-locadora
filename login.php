<?php
include("conexao.php");
if(isset($email)){
    header("Location: home.php");
};
?>

<form action="exec_login.php" METHOD="POST">
    <input type="email" name="email">
    <input type="password" name="senha">
    <input type ="submit">
</form>
 <a href="cadastro.php"> Cadastro </a>