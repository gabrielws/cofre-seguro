<?php

require_once '../db/config.php';
session_start();

$email = $_POST['email'];
$password = $_POST['password'];

try {
    $consulta = $con->prepare("SELECT * FROM usuarios where email = :email and senha = :senha");
    $consulta->bindParam(':email', $email);
    $consulta->bindParam(':senha', $password);
    $consulta->execute();
    $usuario = $consulta->fetch(PDO::FETCH_ASSOC);

    if ($usuario) {
        if ($usuario['nivel'] == 3) {
            $_SESSION['logged_in'] = true;
            $_SESSION['user_type'] = "admin";
            $_SESSION['user_id'] = $usuario['idUsuario'];
            $_SESSION['user_name'] = $usuario['nome'];
        } else {
            $_SESSION['logged_in'] = true;
            $_SESSION['user_type'] = "user";
            $_SESSION['user_id'] = $usuario['idUsuario'];
            $_SESSION['user_name'] = $usuario['nome'];
        }

        header('Location: ../index.php?loginSuccess=1');
        exit();
    } else {
        header('Location: ../signin.php?userNotFound=1');
        exit();
    }
} catch (PDOException $e) {
    //echo "Erro: " . $e->getMessage();
    header('Location: ../signin.php?error=1');
    exit();
}
