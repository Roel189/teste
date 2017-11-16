<?php

include('server.php');


?>

?>
<!DOCTYPE html>
<html>
<head>
    <title>CRUD: CReate, Update, Delete PHP MySQL</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php if (isset($_SESSION['message'])): ?>
    <div class="msg">
        <?php
        echo $_SESSION['message'];
        unset($_SESSION['message']);
        ?>
    </div>
<?php endif ?>
<?php $results = mysqli_query($db, "SELECT * FROM tb_contatos"); ?>

<table>
    <thead>
    <tr>
        <th>Nome</th>
        <th>Telefone</th>
        <th>Email</th>
        <th colspan="3">Ações</th>
    </tr>
    </thead>

    <?php while ($row = mysqli_fetch_array($results)) { ?>
        <tr>
            <td><?php echo $row['nome']; ?></td>
            <td><?php echo $row['telefone']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td>
                <a href="index.php?edit=<?php echo $row['id']; ?>" class="edit_btn" >Editar</a>
            </td>
            <td>
                <a href="server.php?del=<?php echo $row['id']; ?>" class="del_btn">Excluir</a>
            </td>
        </tr>
    <?php } ?>
</table>

<form method="post" action="server.php" >

    <div class="input-group">
        <label>Nome</label>
        <input type="text" name="nome" value="<?php echo $nome; ?>"required>
    </div>
    <div class="input-group">
        <label>Telefone</label>
        <input type="text" name="telefone" value="<?php echo $telefone; ?>"required>
    </div>
    <div class="input-group">
        <label>Email</label>
        <input type="email" name="email" value="<?php echo $email; ?>"required>
    </div>
    <?php
    /*if(isset($_POST['save']) && isset($_POST['save'])=='save'){
        $nome= trim($_POST['nome']);
        $telefone= trim($_POST['telefone']);
        $email= trim($_POST['email']);
    }if(empty($nome)){
        echo "<script>alert('Nome nao pode estar vazio.')</script>";
    }elseif(empty($telefone)){
        echo "<script>alert('Telefone nao pode estar vazio.')</script>";
    }
*/
    ?>
    <div class="input-group">
        <?php if ($update == true): ?>
            <button class="btn" type="submit" name="update" style="background: #556B2F;" >Atualizar</button>
        <?php else: ?>
            <button class="btn" type="submit" name="save" >Salvar</button>
        <?php endif ?>
    </div>
</form>
</body>
</html>