<?php

require_once 'verifica.php';
require_once '../db/config.php';

$idUsuario = $_SESSION['user_id'];
$id = $_POST['id'];
$nome = $_POST['nome'];
$conteudo = $_POST['conteudo'];

$update = $con->prepare("UPDATE dadospessoais SET nome = :nome, conteudo = :conteudo WHERE idUsuario = :idUsuario AND idDadoPessoal = :id");
$update->bindParam(':nome', $nome);
$update->bindParam(':conteudo', $conteudo);
$update->bindParam(':idUsuario', $idUsuario);
$update->bindParam(':id', $id);
$update->execute();
$resultado = $update->fetch(PDO::FETCH_ASSOC);


if ($update)
    header('Location: ../dados_pessoais.php?success=2');
else
    header('Location: ../dados_pessoais.php?error=2');
