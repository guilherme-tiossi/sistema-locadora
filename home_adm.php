<?php
include("conexao.php");
include("verificacao_adm.php");
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
<div class="center-screen2">
<h2 class="titulo"> CADASTRO DE GÊNEROS </h2>
<div class="form2">
    <form action="exec_genero.php" method="POST"> 
        <input class="input2" type="hidden" name="hd_idgenero" value="<?php echo 0 + @$_GET['idgenero']?>"> </input>
        <input class="input2" type="text" name="tx_genero" value="<?php echo @$_GET['genero']?>"> </input>
        <button class="button2" type="submit"> Cadastrar Gênero </button>
    </form>
</div>
    <h2 class="titulo2"> GÊNEROS CADASTRADOS </h2>
<div class="lista">
    <?php exibirGeneros(); ?>
</div>
</div>

<div class="center-screen2">
<h2 class="titulo"> CADASTRO DE FILMES </h2>
<div class="form2">
        <form action="exec_filme.php" method="POST" id="form_filme">
        <input class="input2" type="hidden" name= "hd_idfilme" value="<?php echo 0 + @$_GET['idfilme'] ?>" />
        <input class="input2" type="text" name=tx_filme value="<?php echo @$_GET['filme'] ?> "> </input>
        <select name="slct_genero" form="form_filme" value="<?php echo @$_GET['f_genero']?>">
        <?php 
            $stmt=$pdo->prepare("SELECT genero FROM tbgeneros");
            $stmt->execute();
            foreach ($stmt as $row){
            $genero = $row['genero'];?> 
            <option value="<?php echo $row['genero']; ?>"> <?php echo $row['genero']; ?> </option> <?php }; ?>
        </select> 
        <button class="button2" type="submit"> Cadastrar Filme </button>
    </form>
</div>
    <h2 class='titulo2'> FILMES CADASTRADOS </h2>
    <?php exibirFilmes(); ?>	
</div>

<div class="center-screen2">
<h2 class='titulo'> ADICIONE ADMINISTRADORES OU EDITORES </h2>
<div class="form2">
    <form method="post" action="">
        <input type="text" name="usuario"/>
        <input type="submit" value="Pesquisar"/>
    </form>
</div>
    <h2 class='titulo2'> LISTA DE ADMINS </h2>
    <?php exibirAdmins(); ?>
</div>

<?php
if (isset($_POST['usuario'])){
$usuario = $_POST['usuario']; 
$stmt = $pdo->prepare("SELECT * FROM tbusuarios WHERE nome_user LIKE '%$usuario%' AND adm = '0'");
$stmt->execute();
$count = $stmt->rowCount();

    if ($count > 0){
            echo "<div class='center-screen3'> 
                    <div class='admins-mais'>
                    <table class='tabela'> <thead> 
                    <th> Id </th>
                    <th> Usuario </th> 
                    <th> Adicionar como ADM </th>
                    <th> Adicionar como EDITOR </th>  </tr>
                    </thead>";
        foreach ($stmt as $row){
                      echo " 
                <tbody>
                <td> $row[0] </td>
                <td> $row[1] </td>
                <td> <button class='botao-t-adm' onclick='openForm()'> Tornar Administrador </button> </td>
                <td> <a href='exec_addedit.php?id=$row[0]&x=1'> Tornar Editor </a> </td>"; 
            }
            echo "</tr> </tbody> </table> </div>";

            echo "<div class='form-popup' id='myForm'>
            <h3> Você tem certeza que quer adicionar $row[1] ao cargo de Administrador(a)? </h3>
            <p> Ao adicionar $row[1] como administrador(a) ele(a) terá acesso à TODAS as mesmas funções que você tem, inclusive a de remover seu cargo de administrador. </p>
            <button onclick='closeForm()'> Cancelar </button>
            <a href='exec_altStatusUsuario.php?id=$row[0]&x=2'> Adicionar $row[1] como Administrador(a) </button> 
            <tr> </tbody> </table> </div> </div>";
            }
        }
?>
