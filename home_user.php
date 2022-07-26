<?php
include("conexao.php");
include("verificacao_user.php");
include("functions.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <script src="script.js" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>LocaCult</title>
    <p> Bem vindo(a), <?php echo $nome ?></p>
    <a href="logout.php"> Sair </a>
    <div class= "div1"> </div>
</head>
<body>
<div class='divfilmesuser'> 
<?php   
    exibirFilmesUser(); exibirFilmesAlugadosUser();
?>
</div>
</body>
</html>
