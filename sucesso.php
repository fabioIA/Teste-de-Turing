<?php
    session_start(); // Inicia a sessão para acessar os dados

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Armazenar os dados na sessão
        $_SESSION['nome'] = $_POST['nome'];
        $_SESSION['idade'] = $_POST['idade'];
        $_SESSION['sexo'] = $_POST['sexo'];
        
        header("Location: ../paginas/main.php");
        exit();
    }
?>