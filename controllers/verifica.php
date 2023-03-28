<?php

session_start();

if (!isset($_SESSION['logged_in'])) {
    header('Location: signin.php?error=2');
    exit();
}

?>