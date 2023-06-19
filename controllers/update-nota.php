<?php

require_once 'verifica.php';
require_once '../db/config.php';

$id = $_POST['id'];
$nome = $_POST['nome'];
$conteudo = $_POST['conteudo'];

try {
    $consulta = $con->prepare("UPDATE notas SET nome = :nome, conteudo = :conteudo WHERE idNota = :id");
    $consulta->bindParam(':id', $id);
    $consulta->bindParam(':nome', $nome);
    $consulta->bindParam(':conteudo', $conteudo);
    $consulta->execute();

    header('Location: ../notas_seguras.php?updateSuccess=1'); //Redirecionar se a consulta for bem sucedida
} catch (PDOException $e) {
    //echo $e->getMessage();
    header('Location: ../notas_seguras.php?updateSuccess=0'); //Redirecionar se a consulta falhar
    exit();
}
