<?php
include("verificacao.php");
include("conexao.php");

echo $nome . "<br>" . $email . "<br>";
?>
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
    $stmt=$pdo->prepare("select * from tbfilmes");
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

<a href="logout.php"> Sair </a>