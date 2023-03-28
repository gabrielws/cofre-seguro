<?php

require_once '../db/config.php';
session_start();

$email = $_POST['email'];
$password = $_POST['password'];

$consulta = $con->query("SELECT * FROM usuarios where email = '$email' and senha = '$password'");
$usuario = $consulta->fetch(PDO::FETCH_ASSOC);

if ($usuario) {
    if($usuario['nivel'] == 3){
        $_SESSION['logged_in'] = true;
        $_SESSION['user_type'] = "admin";
        $_SESSION['user_id'] = $usuario['idUsuario'];
        $_SESSION['user_name'] = $usuario['nome'];
    }
    else{
        $_SESSION['logged_in'] = true;
        $_SESSION['user_type'] = "user";
        $_SESSION['user_id'] = $usuario['idUsuario'];
        $_SESSION['user_name'] = $usuario['nome'];
    }

    header('Location: ../index.php');
    exit();

}else{
    header('Location: ../signin.php?error=1');
    exit();
}

?>