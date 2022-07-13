<?php
include("conexao.php");
include("verificacao_adm.php");

echo $nome . "<br>" . $email . "<br>";
?>
<a href="logout.php"> Sair </a>
<h1> CADASTRO DE GENEROS </h1>
<br>
<form action="exec_genero.php" method="POST"> 
    <input type="hidden" name="hd_id" value="<?php echo 0 + @$_GET['id']?>"> </input>
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
    $stmt=$pdo->prepare("select * from tbgeneros");
    $stmt->execute();
    while($row = $stmt ->fetch(PDO::FETCH_BOTH)){
        echo "<tr>";				
            echo "<td>$row[0] </td>";
            echo "<td>$row[1] </td>";
            echo "<td> <a href='?id=$row[0]&genero=$row[1]'> Editar </td>";					
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
    <input type="hidden" name= "hd_id" value="<?php echo 0 + @$_GET['id'] ?>" />
    <input type="text" name=tx_filme value="<?php echo @$_GET['filme'] ?> "> </input>
    <select name="slct_genero" form="form_filme" value="<?php echo @$_GET['genero']?>">
    <?php 
    $stmt=$pdo->prepare("select genero from tbgeneros");
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
    $stmt=$pdo->prepare("select tbfilmes.id_filme, tbfilmes.titulo_filme, tbgeneros.genero from tbfilmes join tbgeneros on tbgeneros.id_genero = tbfilmes.id_genero");
                      // select produto.idProduto, produto.produto, categoria.categoria from produto join categoria on categoria.idCategoria = produto.idCategoria
    $stmt->execute();
    while($row = $stmt ->fetch(PDO::FETCH_BOTH)){
        echo "<tr>";				
            echo "<td>$row[0] </td>";
            echo "<td>$row[1] </td>";
            echo "<td>$row[2] </td>";
            echo "<td> <a href='?id=$row[0]&filme=$row[1]&genero=$row[2]'> Editar </td>";					
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
    $stmt=$pdo->prepare("select * from tbusuarios where adm = 1 || adm = 2 order by adm desc");
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
$stmt = $pdo->prepare("select * from tbusuarios where nome_user like '%$usuario%'");
$stmt->execute();
$count = $stmt->rowCount();

    if ($count > 0){
        foreach ($stmt as $row){
            echo "<table> <thead> <th> Id_User </th><th> Usuario </th> <th> Adicionar como ADM </th> <th> Adicionar como EDITOR </th> </thead>";
            echo "<tbody> 
                <td> $row[0] </td>
                <td> $row[1] </td>
                <td> <a href='exec_addadm.php?id=$row[0]'> Tornar Administrador </a> </td>
                <td> <a href='exec_addedit.php?id=$row[0]'> Tornar Editor </a> </td>
            </tbody> </table>";
            echo "<tr>";
        }

    }
}
?>

