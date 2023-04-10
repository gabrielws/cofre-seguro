<?php

    require_once 'verifica.php';
    require_once '../db/config.php';

    $name = $_POST['name'];
    $password = $_POST['password'];
    $site = $_POST['site'];
    $url = $_POST['url'];

    $consulta = $con->query("INSERT INTO senhas (idUsuario, nome, senha, site, url) VALUES (".$_SESSION['user_id'].", '$name', '$password', '$site', '$url')");
    $credential = $consulta->fetch(PDO::FETCH_ASSOC);
    
    if($credential)
        header('Location: ../credentials.php?success=1');
    else
        header('Location: ../credentials.php?error=1');

?>