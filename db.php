<?php
    // Configuração do banco de dados
    $host = 'localhost'; // Endereço do servidor MySQL
    $user = 'root'; // Usuário MySQL (no XAMPP, o padrão é 'root')
    $password = 'my123'; 
    $database = 'iagora'; // Nome do banco de dados

    // Criar a conexão
    $conn = new mysqli($host, $user, $password, $database);

    // Verificar a conexão
    if ($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error);
    }
?>