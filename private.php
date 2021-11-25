<?php
    session_start();
    if(!isset($_SESSION['id_user'])){
        header("location: login.php");
        exit;
    }


?>


Bem vindo!
<a href="exit.php">Deslogar</a>