<?php

require_once 'verifica.php';
require_once '../db/config.php';

$idUsuario = $_SESSION['user_id'];
$id = $_POST['id'];
$nome = $_POST['nome'];
$conteudo = $_POST['conteudo'];

try{
    $update = $con->prepare("UPDATE dadospessoais SET nome = :nome, conteudo = :conteudo WHERE idUsuario = :idUsuario AND idDadoPessoal = :id");
    $update->bindParam(':nome', $nome);
    $update->bindParam(':conteudo', $conteudo);
    $update->bindParam(':idUsuario', $idUsuario);
    $update->bindParam(':id', $id);
    $update->execute();

    header('Location: ../dados_pessoais.php?updateSuccess=1'); //Redirecionar se a consulta for bem sucedida
    exit();

}catch(PDOException $e){
    //echo $e->getMessage();
    header('Location: ../dados_pessoais.php?updateSuccess=0'); //Redirecionar se a consulta falhar
    exit();
}