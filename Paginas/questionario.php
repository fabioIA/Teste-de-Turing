<?php
    include_once('../config/db.php'); // Inclui o arquivo de conexão com o banco de dados
    session_start(); // Inicia a sessão para acessar os dados

    if (isset($_SESSION['nome']) && isset($_SESSION['idade']) && isset($_SESSION['sexo'])) {
        $nome = $_SESSION['nome'];
        $idade = $_SESSION['idade'];
        $sexo = $_SESSION['sexo'];

        $id = rand(1, 50); // Gera um ID aleatório entre 1 e 50
        switch (rand(1, 3)) {
            case 1:
                $bot = "chatgpt";
                break;
            case 2:
                $bot = "deepseak";
                break;
            case 3:
                $bot = "gemini";
                break;
        }
        switch (rand(1, 3)) {
            case 1:
                $hum = "resp_1";
                break;
            case 2:
                $hum = "resp_2";
                break;
            case 3:
                $hum = "resp_3";
                break;
        }
        $block_0 = rand(1, 2);
        if($block_0 == 1) {
            $block_1 = 2;
        } else {
            $block_1 = 1;
        }

        if(isset($_GET['inf'])) 
        {
            $sql_1 = "SELECT pergunta, $bot, $hum  FROM perguntas WHERE id = $id";
            $result = mysqli_query($conn, $sql_1);

            $row = mysqli_fetch_assoc($result);
            $pergunta = $row['pergunta'];
            $bot_resp = $row[$bot];
            $hum_resp = $row[$hum];

            echo "
            <script>
                window.onload = function() {
                    document.getElementById('question').innerHTML = '$pergunta';
                    document.getElementById('resp-text-$block_0').innerHTML = '- $bot_resp'
                    document.getElementById('resp-$block_0').value = '- $bot_resp'
                    document.getElementById('resp-text-$block_1').innerHTML = '- $hum_resp'
                    document.getElementById('resp-$block_1').value = '- $hum_resp'
                }
            </script>";

            if ($_GET['inf'] > 1) 
            {
                $resp = str_replace("- ", "", $_GET['resp-check']);
                $opiniao = $_GET['opiniao'];
                $sql_2 = "SELECT id 
                FROM perguntas 
                WHERE chatgpt LIKE '$resp' 
                OR deepseak LIKE '$resp' 
                OR gemini LIKE '$resp'";
                $result = mysqli_query($conn, $sql_2);
                
                if(mysqli_num_rows($result) == 0) {
                    $sql_3 = "SELECT id 
                    FROM perguntas 
                    WHERE resp_1 LIKE '$resp' 
                    OR resp_2 LIKE '$resp' 
                    OR resp_3 LIKE '$resp'";
                    $result = mysqli_query($conn, $sql_3);
                    $id_resp = mysqli_fetch_assoc($result)['id'];

                    $sql_register = "INSERT INTO entrevistado (nome, idade, sexo, stat, pergunta_id, opiniao) 
                    VALUES ('$nome', '$idade', '$sexo', 1, '$id_resp',' $opiniao')";
                    mysqli_query($conn, $sql_register);

                } else {
                    $id_resp = mysqli_fetch_assoc($result)['id'];
                    $sql_register = "INSERT INTO entrevistado (nome, idade, sexo, stat, pergunta_id, opiniao) 
                    VALUES ('$nome', '$idade', '$sexo', 0, '$id_resp', '$opiniao')";
                    mysqli_query($conn, $sql_register);
                }
            }
        } 

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
    <link rel="stylesheet" href="../css/questionario.css">
    <link rel="shortcut icon" href="../img/caricatura.png" type="image/x-icon">
    <title>Questionário</title>
</head>
<body>
    <form action="questionario.php" method="get">
        <h1 id="h1"></h1>

        <div id="progresso"></div>

        <div>
            <label for="question"><b>Pergunta:</b></label>
            <p id="question" name="question"></p>
        </div>
        
        <div class="resp" onclick="document.getElementById('resp-1').checked = true">
            <label for="resp-check"><b>Resposta 1:</b></label>
            <input class="radio" type="radio" id="resp-1" name="resp-check" required>
            <p class="resp-p" id="resp-text-1"></p>
        </div>
        
        <div class="resp" onclick="document.getElementById('resp-2').checked = true">
            <label for="resp-check"><b>Resposta 2:</b></label>
            <input class="radio" type="radio" id="resp-2" name="resp-check" required>
            <p class="resp-p" id="resp-text-2"></p>
        </div>

        <div class="opiniao">
            <label for="opiniao"></label>
            <textarea name="opiniao" id="opiniao" placeholder="Deixe sua opinião" value=""></textarea>
        </div>
        
        <div class="inf">
            <input type="number" name="inf" id="inf" value="1">
        </div>
        
        <div>
            <label for="submit"></label>
            <input class="input" type="submit" id="submit" value="Próximo" name="submit">
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

    <script src="../js/question.js" defer></script>
</body>
</html>