<?php

session_start();
$db = mysqli_connect('localhost', 'root', '', 'bd_consultas');

// initialize variables
$nome = "";
$telefone = "";
$email = "";
$id = 0;
$update = false;

if (isset($_POST['save'])) {
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];


    mysqli_query($db, "INSERT INTO tb_contatos (email, nome, telefone) VALUES ('$email', '$nome', '$telefone')");
    $_SESSION['message'] = "Salvo com sucesso!";
    header('location: index.php');
}
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $update = true;
    $record = mysqli_query($db, "SELECT * FROM tb_contatos WHERE id=$id");

    if (count($record) == 1 ) {
        $n = mysqli_fetch_array($record);
        $nome = $n['nome'];
        $telefone = $n['telefone'];
        $email= $n['email'];

    }
}
if (isset($_GET['del'])) {
    $id = $_GET['del'];
    mysqli_query($db, "DELETE FROM tb_contatos WHERE id=$id");
    $_SESSION['message'] = "Contato Excluido!";
    header('location: index.php');
}

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $email = $_POST['email'];
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];

    mysqli_query($db, "UPDATE tb_contatos SET email='$email',nome='$nome', telefone='$telefone' WHERE id=$id");
    $_SESSION['message'] = "Contato Atualizado!";
    header('location: index.php');
}

?>