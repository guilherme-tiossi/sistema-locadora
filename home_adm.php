<?php
include("conexao.php");
include("verificacao_adm.php");

echo $nome . "<br>" . $email . "<br>";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <script src="script.js" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="style.css">

    <title>Document</title>
</head>
<body>
    

<a href="logout.php"> Sair </a>
<h1> CADASTRO DE GENEROS </h1>
<br>
<form action="exec_genero.php" method="POST"> 
    <input type="hidden" name="hd_idgenero" value="<?php echo 0 + @$_GET['idgenero']?>"> </input>
    <input type="text" name="tx_genero" value="<?php echo @$_GET['genero']?>"> </input> <br>
    <br>
    <input type="submit" value="Enviar">
</form>

<h1> GÊNEROS CADASTRADOS </h1>

<table>
<thead>
    <th> Id </th>
    <th> Gênero </th>
    <th> Editar </th>
    <th> Excluir </th>
</thead>
<tbody>
<?php
    $stmt=$pdo->prepare("SELECT * FROM tbgeneros");
    $stmt->execute();
    while($row = $stmt ->fetch(PDO::FETCH_BOTH)){
        echo "<tr>";				
            echo "<td>$row[0] </td>";
            echo "<td>$row[1] </td>";
            echo "<td> <a href='?idgenero=$row[0]&genero=$row[1]'> Editar </td>";					
            echo "<td>";
                echo "<a href='exec_gdeleta.php?id=$row[0]&genero=$row[1]'>Excluir</a>";
            echo "</td>";
        echo "</tr>";				
    }	
?>	
    </tbody>
</table>

<br>
<h1> CADASTRO DE FILMES </h1>
<br>
<form action="exec_filme.php" method="POST" id="form_filme">
    <input type="hidden" name= "hd_idfilme" value="<?php echo 0 + @$_GET['idfilme'] ?>" />
    <input type="text" name=tx_filme value="<?php echo @$_GET['filme'] ?> "> </input>
    <select name="slct_genero" form="form_filme" value="<?php echo @$_GET['f_genero']?>">
    <?php 
    $stmt=$pdo->prepare("SELECT genero FROM tbgeneros");
    $stmt->execute();
    foreach ($stmt as $row){
        $genero = $row['genero'];
        ?> <option value="<?php echo $row['genero']; ?>"> <?php echo $row['genero']; ?> </option>
    <?php
    };
    ?>
    </select>
    <br>
    <input type="submit">
</form>

<h1> FILMES CADASTRADOS </h1>

<table>
<thead>
    <th> Id </th>
    <th> Filme </th>
    <th> Gênero </th>
    <th> Editar </th>       
    <th> Excluir </th>
</thead>
<tbody>
<?php
    $stmt=$pdo->prepare("SELECT tbfilmes.id_filme, tbfilmes.titulo_filme, tbgeneros.genero FROM tbfilmes JOIN tbgeneros ON tbgeneros.id_genero = tbfilmes.id_genero ORDER BY id_filme");
                      // select produto.idProduto, produto.produto, categoria.categoria from produto join categoria on categoria.idCategoria = produto.idCategoria
    $stmt->execute();
    while($row = $stmt ->fetch(PDO::FETCH_BOTH)){
        echo "<tr>";				
            echo "<td>$row[0] </td>";
            echo "<td>$row[1] </td>";
            echo "<td>$row[2] </td>";
            echo "<td> <a href='?idfilme=$row[0]&filme=$row[1]&f_genero=$row[2]'> Editar </td>";					
            echo "<td>";
                echo "<a href='exec_fdeleta.php?id=$row[0]'>Excluir</a>";
            echo "</td>";
        echo "</tr>";				
    }	
?>	
    </tbody>
</table>

<h1> LISTA DE ADMINS </h1>
<table>
    <thead>
    <th> Id </th>
    <th> Nome </th>
    <th> Status </th>
    <th> Excluir </th>
    </thead>
    <tbody>
<?php
    $stmt=$pdo->prepare("SELECT * FROM tbusuarios WHERE adm = 1 || adm = 2 ORDER BY adm DESC");
    $stmt->execute();
    while($row = $stmt ->fetch(PDO::FETCH_BOTH)){
        
        echo "<td> $row[0] </td>";
        echo "<td> $row[1] </td>";
        echo "<td> $row[4] </td>";
        echo "<td> <a href='exec_admdeleta.php?id=$row[0]'> Excluir </td>";
        echo "<tr>";
    }
?>
    <td> </td>
    </tbody>
</table>

<h1> ADICIONE ADMINISTRADORES OU EDITORES </h1>
<form method="post" action="">
    <label> Pesquisar Usuário: </label>
    <input type="text" name="usuario"/>
    <input type="submit" value="Pesquisar"/>
</form>

<?php
if (isset($_POST['usuario'])){
$usuario = $_POST['usuario']; 
$stmt = $pdo->prepare("SELECT * FROM tbusuarios WHERE nome_user LIKE '%$usuario%'");
$stmt->execute();
$count = $stmt->rowCount();

    if ($count > 0){
        foreach ($stmt as $row){
            echo "<table> <thead> <th> Id_User </th><th> Usuario </th> <th> Adicionar como ADM </th> <th> Adicionar como EDITOR </th> </thead>";
            echo "<tbody> 
                <td> $row[0] </td>
                <td> $row[1] </td>
                <td> <button class='open-button' onclick='openForm()'> Tornar Administrador </button> <td>
                <td> <a href='exec_addedit.php?id=$row[0]'> Tornar Editor </a> </td>
            </tbody> </table>";

            echo "<div class='form-popup' id='myForm'>
            <h3> Você tem certeza que quer adicionar $row[1] ao cargo de Administrador(a)? </h3>
            <p> Ao adicionar $row[1] como administrador(a) ele(a) terá acesso à TODAS as mesmas funções que você tem, inclusive a de remover seu cargo de administrador. </p>
            <button onclick='closeForm()'> Cancelar </button>
            <a href='exec_addadm.php?id=$row[0]'> Adicionar $row[1] como Administrador(a) </button>
          </div>";
          echo "<tr>";
        }
    }
}
?>
