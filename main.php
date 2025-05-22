<?php
    session_start(); // Inicia a sessão para acessar os dados

    if (isset($_SESSION['nome']) && isset($_SESSION['idade']) && isset($_SESSION['sexo'])) {
        $nome = explode(" ", $_SESSION['nome']);
        echo "<script>
            window.onload = function() {
                document.getElementById('missao').innerHTML = '$nome[0], sua missão é indicar qual delas é a resposta humana.'
            }
        </script>";

    } else {
        // Redireciona para a página de cadastro se os dados não estiverem disponíveis
        header("Location: ../index.php");
        exit();
    } 
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="shortcut icon" href="../img/caricatura.png" type="image/x-icon">
    <title>Sobre o teste</title>
</head>
<body>
    <header>
        <h1><strong id="ia">IA</strong>gora</h1>
    </header>

    <form action="questionario.php" method="get">
        <h1>Projeto IAgora</h1>

        <div class="texto">
            <p>Na nossa pesquisa faremos o Teste de Turing. Será realizado da sequinte forma:</p>
            <ul>
                <li>Você irá escolher 5 respostas de 5 perguntas;</li>
                <li>As perguntas foram retiradas de um banco de dados aleatóriamente;</li>
                <li>Elas virão com duas respostas, uma delas foi dada por uma IA fingindo ser uma pessoa e a outra por uma pessoa real;</li>
                <li><strong id="missao"></strong></li>
            </ul>
        </div>

        <div class="inf">
            <input type="number" name="inf" id="inf" value="1">
        </div>
        
        <div>
            <label for="submit"></label>
            <input class="input" type="submit" id="submit" value="Começar" name="submit">
        </div>
    </form>

    <footer>
        <div>
            <strong>- Produzido por:</strong>
            <div>
                <div>
                    <small><strong>Fábio Fernandes</strong> - fabiofer.012@gmail.com</small>
                </div>
                <div>
                    <small><strong>Maria Bispo</strong> - mclarabispo@gmail.com</small>
                </div>
            </div>
        </div>

        <div class="direitos">
            <small>IAgora 2025</small>
        </div>
    </footer>
</body>
</html>