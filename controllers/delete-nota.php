<?php

require_once 'verifica.php';
require_once '../db/config.php';

$idUsuario = $_SESSION['user_id'];
$idNota = $_POST['id'];

try {
    $consulta = $con->prepare("DELETE FROM notas WHERE idNota = :id AND idUsuario = :idUsuario LIMIT 1");
    $consulta->bindParam(':id', $idNota);
    $consulta->bindParam(':idUsuario', $idUsuario);
    $consulta->execute();

    header("Location: ../notas_seguras.php?deleteSuccess=1"); //Redirecionar se a consulta for bem sucedida
    exit();
} catch (PDOException $e) {
    //echo $e->getMessage();
    header('Location: ../notas_seguras.php?deleteSuccess=0'); //Redirecionar se a consulta falhar
    exit();
}
