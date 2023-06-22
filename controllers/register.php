<?php

require_once '../db/config.php';
session_start();

$nome = $_POST['nome'];
$sobrenome = $_POST['sobrenome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$senha = $_POST['senha'];

try {
    $insercao = $con->prepare("INSERT INTO usuarios (nome, sobrenome, email, telefone, senha, nivel) VALUES (:nome, :sobrenome, :email, :telefone, :senha, :nivel)");
    $insercao->bindParam(':nome', $nome);
    $insercao->bindParam(':sobrenome', $sobrenome);
    $insercao->bindParam(':email', $email);
    $insercao->bindParam(':telefone', $telefone);
    $insercao->bindParam(':senha', $senha);
    $insercao->bindValue(':nivel', 1);
    $insercao->execute();

    $consulta = $con->prepare("SELECT * FROM usuarios where email = :email and senha = :senha");
    $consulta->bindParam(':email', $email);
    $consulta->bindParam(':senha', $senha);
    $consulta->execute();
    $usuario = $consulta->fetch(PDO::FETCH_ASSOC);

    if ($usuario) {
        $_SESSION['logged_in'] = true;
        $_SESSION['user_type'] = "user";
        $_SESSION['user_id'] = $usuario['idUsuario'];
        $_SESSION['user_name'] = $usuario['nome'];
        header('Location: ../index.php?registerSucess=1');
        exit();
    }

    exit();
} catch (PDOException $e) {
    //echo "Erro: " . $e->getMessage();
    header('Location: ../register.php?registerSuccess=0');
    exit();
}
