<?php

require_once 'verifica.php';
require_once '../db/config.php';

$idUsuario = $_SESSION['user_id'];
$name = $_POST['name'];
$password = $_POST['password'];
$site = $_POST['site'];
$url = $_POST['url'];

try {
    $consulta = $con->prepare("INSERT INTO senhas (idUsuario, nome, senha, site, url) VALUES (:idUsuario, :nome, :senha, :site, :url)");
    $consulta->bindParam(':idUsuario', $idUsuario);
    $consulta->bindParam(':nome', $name);
    $consulta->bindParam(':senha', $password);
    $consulta->bindParam(':site', $site);
    $consulta->bindParam(':url', $url);
    $consulta->execute();

    header("Location: ../credentials.php?addSuccess=1"); //Redirecionar se a consulta for bem sucedida
    exit();
} catch (PDOException $e) {
    //echo $e->getMessage();
    header('Location: ../credentials.php?addSuccess=0'); //Redirecionar se a consulta falhar
}
