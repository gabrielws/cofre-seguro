<?php

    require_once 'verifica.php';
    require_once '../db/config.php';

    $id = $_POST['id'];
    $consulta = $con->query("DELETE FROM senhas WHERE idSenha = ".$id." AND idUsuario = ".$_SESSION['user_id']." LIMIT 1");
    $credential = $consulta->fetch(PDO::FETCH_ASSOC);

    if($credential)
        header('Location: ../credentials.php?success=2');
    else
        header('Location: ../credentials.php?error=2');

?>