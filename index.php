<?php
    session_start(); // Inicia a sessão no PHP
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="img/caricatura.png" type="image/x-icon">
    <title>Cadastro</title>
</head>
<body>
    <header>
        <h1><strong id="ia">IA</strong>gora</h1>
    </header>

    <form action="config/sucesso.php" method="post">
        <h1>Cadastro</h1>
        <div>
            <label for="nome"></label>
            <input class="input" type="text" id="nome" name="nome" placeholder="Nome" maxlength="150" required>
        </div>

        <div>
            <label for="idade"></label>
            <input class="input" type="number" id="idade" name="idade" placeholder="Idade" required>
        </div>

        <div>
            <label for="sexo"></label>
            <select class="input" name="sexo" id="sexo" required>
                <option value="" disable select>Sexo</option>
                <option value="m">Masculino</option>
                <option value="f">Feminino</option>
                <option value="n">Prefiro não dizer</option>
            </select>
        </div>
        
        <div>
            <label for="submit"></label>
            <input class="input" type="submit" id="submit" value="Cadastrar" name="submit">
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
