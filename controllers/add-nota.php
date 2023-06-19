<?php

require_once 'verifica.php';
require_once '../db/config.php';

$idUsuario = $_SESSION['user_id'];
$nome = $_POST['nome'];
$conteudo = $_POST['conteudo'];

try {
    $consulta = $con->prepare("INSERT INTO notas (idUsuario, nome, conteudo) VALUES (:idUsuario, :nome, :conteudo)");
    $consulta->bindParam(':idUsuario', $idUsuario);
    $consulta->bindParam(':nome', $nome);
    $consulta->bindParam(':conteudo', $conteudo);
    $consulta->execute();

    header('Location: ../notas_seguras.php?addSuccess=1'); //Redirecionar se a consulta for bem sucedida
    exit();
} catch (PDOException $e) {
    //echo $e->getMessage();
    header('Location: ../notas_seguras.php?addSuccess=0'); //Redirecionar se a consulta falhar
    exit();
}
