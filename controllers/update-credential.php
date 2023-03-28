<?php

    require_once 'verifica.php';
    require_once '../db/config.php';




    if($credential)
        header('Location: ../credentials.php?success=2');
    else
        header('Location: ../credentials.php?error=2');

?>