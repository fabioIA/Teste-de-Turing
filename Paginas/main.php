<?php
    session_start(); // Inicia a sessão para acessar os dados

    if (isset($_SESSION['nome']) && isset($_SESSION['idade']) && isset($_SESSION['sexo'])) {
        $nome = $_SESSION['nome'];
        $sexo = $_SESSION['sexo'];
        if ($sexo == "f") 
            echo "<h1 id='h1-nome'>Bem-vinda, $nome!</h1>";
        else
            echo "<h1 id='h1-nome'>Bem-vindo, $nome!</h1>";

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
    <form action="questionario.php" method="get">
        <h1>Sobre a pesquisa</h1>
        
        <div class="img">
            <img src="../img/caricatura.png" alt="Allan Turing">
        </div>

        <div>
            <p>Na nossa pesquisa faremos o Teste de Turing. Será realizado da sequinte forma: 5 perguntas de 5 diferentes aspectos serão escolhidas para você aleatoriamente. </p>
            <p>Elas virão com duas respostas, uma delas foi dada por uma IA fingindo ser uma pessoa e a outra por uma pessoa real, sua missão é indicar qual delas é a resposta humana.</p>
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
            <h3>Produzido por:</h3>
            <div>
                <div>
                    <span><strong>Fábio Fernandes</strong> - fabiofer.012@gmail.com</span>
                </div>
                <div>
                    <span><strong>Maria Bispo</strong> - mclarabispo@gmail.com</span>
                </div>
            </div>
        </div>

        <div>
            <h3>Sobre:</h3>
            <div>
                <p>Somos alunos do CEFET-MG e estamos fazendo uma pesquisa sobre o Teste de Turing para a META 2025. Com o nosso site, visamos alcançar o maior número de pessoas possíveis e mensurar o quão perto a máquina está de camuflar como um ser humano</p>
                <a href="">Saiba mais sobre o teste de turing</a>
            </div>
        </div>

        <div class="direitos">
            <span>Teste de Turing 2025</span>
        </div>
    </footer>
</body>
</html>