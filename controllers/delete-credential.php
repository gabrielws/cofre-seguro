<?php

require_once 'verifica.php';
require_once '../db/config.php';

$idUsuario = $_SESSION['user_id'];
$idSenha = $_POST['idSenha'];

try {
    $consulta = $con->prepare("DELETE FROM senhas WHERE idSenha = :id AND idUsuario = :idUsuario LIMIT 1");
    $consulta->bindParam(':id', $idSenha);
    $consulta->bindParam(':idUsuario', $idUsuario);
    $consulta->execute();

    header("Location: ../credentials.php?deleteSuccess=1"); //Redirecionar se a consulta for bem sucedida
    exit();
} catch (PDOException $e) {
    //echo $e->getMessage();
    header('Location: ../credentials.php?deleteSuccess=0'); //Redirecionar se a consulta falhar
    exit();
}
