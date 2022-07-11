<?php
include("conexao.php");
include("verificacao.php");
if(isset($email)){
    header("Location: home.php");
};
?>

<html>
    <form action="exec_cadastro.php" METHOD="POST">
    <input type="text" name="nome">
    <input type="email" name="email">
    <input type="password" name="senha">
    <input type="submit"> 
    </form>

</html>