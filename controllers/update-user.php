<?php

require_once 'verifica.php';
require_once '../db/config.php';

$idUsuario = $_SESSION['user_id'];
$nome = $_POST['nome'];
$sobrenome = $_POST['sobrenome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];

try {
    $update = $con->prepare("UPDATE usuarios SET nome = :nome, sobrenome = :sobrenome, email = :email, telefone = :telefone WHERE idUsuario = :idUsuario");
    $update->bindParam(':idUsuario', $idUsuario);
    $update->bindParam(':nome', $nome);
    $update->bindParam(':sobrenome', $sobrenome);
    $update->bindParam(':email', $email);
    $update->bindParam(':telefone', $telefone);
    $update->execute();

    header('Location: ../minha_conta.php?updateSuccess=1'); //Redirecionar se a consulta for bem sucedida
    exit();
} catch (PDOException $e) {
    //echo $e->getMessage();
    header('Location: ../minha_conta.php?updateSuccess=0'); //Redirecionar se a consulta falhar
    exit();
}
