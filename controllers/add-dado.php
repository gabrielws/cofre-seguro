<?php

require_once 'verifica.php';
require_once '../db/config.php';

$nome = $_POST['nome'];
$conteudo = $_POST['conteudo'];
$tipo = $_POST['tipo'];

$consulta = $con->query("SELECT * FROM tipos WHERE nome = '$tipo'");
//$tipo = $consulta->fetch(PDO::FETCH_ASSOC);
//$idTipo = $tipo['idTipo'];

//var_dump($idTipo);
//$consulta = $con->query("INSERT INTO dadosPessoais (idUsuario, idTipo, nome, conteudo) VALUES (" . $_SESSION['user_id'] . "," . $idTipo . "," . $nome . "," . $conteudo . ")");
//$dadoPessoal = $consulta->fetch(PDO::FETCH_ASSOC);

//if ($dadoPessoal)
//    header('Location: ../dados_pessoais.php?success=1');
//else
//    header('Location: ../dados_pessoais.php?error=1');
