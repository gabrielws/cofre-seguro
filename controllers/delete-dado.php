<?php

require_once 'verifica.php';
require_once '../db/config.php';

$id = $_POST['id'];
$idUsuario = $_SESSION['user_id'];

try {
    $consulta = $con->prepare("DELETE FROM dadospessoais WHERE idDadoPessoal = :id AND idUsuario = :idUsuario");
    $consulta->bindParam(':id', $id);
    $consulta->bindParam(':idUsuario', $idUsuario);
    $consulta->execute();

    header('Location: ../dados_pessoais.php?deleteSuccess=1'); //Redirecionar se a consulta for bem sucedida
    exit();
} catch (PDOException $e) {
    //echo $e->getMessage();
    header('Location: ../dados_pessoais.php?deleteSuccess=0'); //Redirecionar se a consulta falhar
    exit();
}
