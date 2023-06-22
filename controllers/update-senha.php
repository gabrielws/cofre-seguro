<?php

require_once 'verifica.php';
require_once '../db/config.php';

$idUsuario = $_SESSION['user_id'];
$senhaAtual = $_POST['senhaAtual'];
$novaSenha = $_POST['novaSenha'];
$confirmarSenha = $_POST['confirmarSenha'];

try {
    $select = $con->prepare("SELECT * FROM usuarios WHERE idUsuario = :idUsuario");
    $select->bindParam(':idUsuario', $idUsuario);
    $select->execute();
    $dados = $select->fetch(PDO::FETCH_ASSOC);

    if ($senhaAtual != $dados['senha']) {
        header('Location: ../minha_conta.php?senhaIncorreta=1'); //Redirecionar se a consulta falhar
        exit();
    } else {
        if ($novaSenha != $confirmarSenha) {
            header('Location: ../minha_conta.php?senhasDiferentes=1'); //Redirecionar se a consulta falhar
            exit();
        }

        $update = $con->prepare("UPDATE usuarios SET senha = :senha WHERE idUsuario = :idUsuario");
        $update->bindParam(':idUsuario', $idUsuario);
        $update->bindParam(':senha', $novaSenha);
        $update->execute();
    }

    header('Location: ../minha_conta.php?updateSenhaSuccess=1'); //Redirecionar se a consulta for bem sucedida
    exit();
} catch (PDOException $e) {
    //echo $e->getMessage();
    header('Location: ../minha_conta.php?updateSenhaSuccess=0'); //Redirecionar se a consulta falhar
    exit();
}
