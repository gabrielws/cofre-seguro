<?php

require_once 'verifica.php';
require_once '../db/config.php';

$idUsuario = $_SESSION['user_id'];
$nome = $_POST['nome'];
$conteudo = $_POST['conteudo'];
$tipo = $_POST['tipo'];

try {
    $consulta = $con->query("SELECT * FROM tipos WHERE nome = '$tipo'");
    $tipo = $consulta->fetch(PDO::FETCH_ASSOC);
    $idTipo = $tipo['idTipo'];

    $consulta = $con->prepare("INSERT INTO dadospessoais (idUsuario, idTipo, nome, conteudo) VALUES (:idUsuario, :idTipo, :nome, :conteudo)");
    $consulta->bindParam(':idUsuario', $idUsuario);
    $consulta->bindParam(':idTipo', $idTipo);
    $consulta->bindParam(':nome', $nome);
    $consulta->bindParam(':conteudo', $conteudo);
    $consulta->execute();

    header('Location: ../dados_pessoais.php?addSuccess=1'); //Redirecionar se a consulta for bem sucedida
    exit();
} catch (PDOException $e) {
    //echo $e->getMessage();
    header('Location: ../dados_pessoais.php?addSuccess=0'); //Redirecionar se a consulta falhar
    exit();
}
