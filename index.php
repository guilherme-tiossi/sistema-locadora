<?php
include("conexao.php");
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
    <div class="center-screenzero"> 
	<a href="cadastro.php"> Cadastro </a>
    </div>
</head>
<body> 
	<div class="pesquisafilmes">
	<?php 
	exibirFilmesIndex();
	?>
	</div>
</body>
</html>