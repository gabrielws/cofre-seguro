<?php

    require_once 'verifica.php';
    require_once '../db/config.php';

    echo $id = $_POST['id'];
    echo $password = $_POST['password'];
    echo $name = $_POST['name'];
    echo $url = $_POST['url'];
    echo $site = $_POST['site'];

    $consulta = $con->query("UPDATE senhas SET nome = '".$name."', senha = '".$password."', site = '".$site."', url = '".$url."' WHERE idSenha = ".$id." AND idUsuario = ".$_SESSION['user_id']." LIMIT 1");
    $update = $consulta->fetch(PDO::FETCH_ASSOC);

    if($update)
        header('Location: ../credentials.php?success=2');
    else
        header('Location: ../credentials.php?error=2');

?>