<?php
include("conexao.php");

$adm = $_GET['adm'];

function exibirGeneros(){
    global $pdo;
    $stmt=$pdo->prepare("SELECT * FROM tbgeneros");
    $stmt->execute();
        echo "<table>
<thead>
    <th> Id </th>
    <th> Gênero </th>
    <th> Editar </th>
    <th> Excluir </th>
</thead>
<tbody>";
 while($row = $stmt ->fetch(PDO::FETCH_BOTH)){
        echo "<tr>";				
            echo "<td>$row[0] </td>";
            echo "<td>$row[1] </td>";
            echo "<td> <a href='?idgenero=$row[0]&genero=$row[1]'> Editar </td>";   
                echo "<td> <a href='exec_gdeleta.php?id=$row[0]&genero=$row[1]'>Excluir</a> </td>";
    }
        echo "</tr> </tbody> </table>";				
}

function exibirFilmes(){
    global $pdo;
    $stmt=$pdo->prepare("SELECT tbfilmes.id_filme, tbfilmes.titulo_filme, tbgeneros.genero FROM tbfilmes JOIN tbgeneros ON tbgeneros.id_genero = tbfilmes.id_genero ORDER BY id_filme");
    $stmt->execute();
    echo 
    "<table> <thead>
    <th> Id </th>
    <th> Filme </th>
    <th> Gênero </th>
    <th> Editar </th>
    <th> Excluir </th>
    </thead> <tbody>";
    while ($row = $stmt ->fetch(PDO::FETCH_BOTH)){
        echo "<tr> <td>$row[0]</td> 
              <td>$row[1]</td> 
              <td>$row[2]</td>
              <td><a href='?idfilme=$row[0]&filme=$row[1]&f_genero=$row[2]'> Editar </td>
              <td><a href='exec_fdeleta.php?id=$row[0]'> Excluir </td>";    
    }
    echo "</tr> </tbody> </table>";
}

function exibirAdmins(){
    global $pdo;
    $stmt=$pdo->prepare("SELECT * FROM tbusuarios WHERE adm = 1 || adm = 2 ORDER BY adm DESC");
    $stmt->execute();
    echo "<table>
    <thead>
    <th> Id </th>
    <th> Nome </th>
    <th> Status </th>
    <th> Alterar </th>
    <th> Excluir </th>
    </thead> <tbody>";
    while($row = $stmt ->fetch(PDO::FETCH_BOTH)){
        echo "<tr> <td> $row[0] </td>
              <td> $row[1] </td>
              <td> $row[4] </td>";
    if($row[4] == 2){
        echo "<td> <a href='exec_altStatusUsuario.php?id=$row[0]&adm=$row[4]'> Tornar Editor";
    }
    if($row[4] == 1){
        echo "<td> <a href='exec_altStatusUsuario.php?id=$row[0]&adm=$row[4]'> Tornar Administrador </td>";
    }
        echo "<td> <a href='exec_altStatusUsuario.php?id=$row[0]&adm=$row[4]&x=1'> Excluir </td> </tr>";
              //COLOCAR OPÇÃO DE ALTERNAR PARA ADM/EDITOR DEPENDENDO DO STATUS ATUAL
    }
    echo "</tbody> </table>";
}
?>






