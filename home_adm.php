<?php
    include("header.php");
?>
<body>
<h1> CADASTRO DE GENEROS </h1>
<br>
    <form action="exec_genero.php" method="POST"> 
        <input type="hidden" name="hd_idgenero" value="<?php echo 0 + @$_GET['idgenero']?>"> </input>
        <input type="text" name="tx_genero" value="<?php echo @$_GET['genero']?>"> </input> <br>
        <input type="submit" value="Enviar">
    </form>

    <h2> GÊNEROS CADASTRADOS </h2>
    <?php exibirGeneros(); ?>
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
            $genero = $row['genero'];?> 
            <option value="<?php echo $row['genero']; ?>"> <?php echo $row['genero']; ?> </option> <?php }; ?>
        </select> <br>
        <input type="submit" value="Enviar">
    </form>

    <h2> FILMES CADASTRADOS </h2>
    <?php exibirFilmes(); ?>	
    <br>

<h1> ADICIONE ADMINISTRADORES OU EDITORES </h1>
    <form method="post" action="">
        <label> Pesquisar Usuário: </label>
        <input type="text" name="usuario"/>
        <input type="submit" value="Pesquisar"/>
    </form>
<br>
    <h1> LISTA DE ADMINS </h1>
    <?php exibirAdmins(); ?>
    <br>
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
