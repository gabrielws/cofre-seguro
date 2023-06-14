<?php

require_once 'verifica.php';
require_once '../db/config.php';

$id = $_POST['id'];
$idUsuario = $_SESSION['user_id'];

$consulta = $con->prepare("DELETE FROM dadospessoais WHERE idDadoPessoal = :id AND idUsuario = :idUsuario");
$consulta->bindParam(':id', $id);
$consulta->bindParam(':idUsuario', $idUsuario);
$consulta->execute();
$dadoPessoal = $consulta->fetch(PDO::FETCH_ASSOC);

if ($dadoPessoal)
    header('Location: ../dados_pessoais.php?success=2');
else
    header('Location: ../dados_pessoais.php?error=2');
