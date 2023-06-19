<?php

require_once 'verifica.php';
require_once '../db/config.php';

$idUsuario = $_SESSION['user_id'];
$id = $_POST['id'];
$password = $_POST['password'];
$name = $_POST['name'];
$url = $_POST['url'];
$site = $_POST['site'];

try {
    $consulta = $con->prepare("UPDATE senhas SET nome = :nome, senha = :senha, site = :site, url = :url WHERE idSenha = :id AND idUsuario = :idUsuario LIMIT 1");
    $consulta->bindParam(':id', $id);
    $consulta->bindParam(':idUsuario', $idUsuario);
    $consulta->bindParam(':nome', $name);
    $consulta->bindParam(':senha', $password);
    $consulta->bindParam(':site', $site);
    $consulta->bindParam(':url', $url);
    $consulta->execute();

    header('Location: ../credentials.php?updateSuccess=1'); //Redirecionar se a consulta for bem sucedida
    exit();
} catch (PDOException $e) {
    //echo $e->getMessage();
    header('Location: ../credentials.php?updateSuccess=0'); //Redirecionar se a consulta falhar
    exit();
}
