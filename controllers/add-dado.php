<?php

require_once 'verifica.php';
require_once '../db/config.php';

$idUsuario = $_SESSION['user_id'];
$nome = $_POST['nome'];
$conteudo = $_POST['conteudo'];
$tipo = $_POST['tipo'];


$consulta = $con->query("SELECT * FROM tipos WHERE nome = '$tipo'");
$tipo = $consulta->fetch(PDO::FETCH_ASSOC);
$idTipo = $tipo['idTipo'];

echo $idTipo;

$consulta = $con->prepare("INSERT INTO dadospessoais (idUsuario, idTipo, nome, conteudo) VALUES (:idUsuario, :idTipo, :nome, :conteudo)");
$consulta->bindParam(':idUsuario', $idUsuario);
$consulta->bindParam(':idTipo', $idTipo);
$consulta->bindParam(':nome', $nome);
$consulta->bindParam(':conteudo', $conteudo);
$consulta->execute();
$dadoPessoal = $consulta->fetch(PDO::FETCH_ASSOC);


if ($dadoPessoal)
    header('Location: ../dados_pessoais.php?success=1');
else
    header('Location: ../dados_pessoais.php?error=1');
