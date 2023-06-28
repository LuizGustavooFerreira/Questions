<?php 
    session_start();
    if (!$_SESSION['usuarioLogado']) {
        header("Location:login.php");
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina principal</title>
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/css.css">
    <link rel="stylesheet" href="css/index.css">
</head>
<body>
        <div class="conteiner">
            <img class="logo" src="image/chapeu.png" alt="">
            <div class menu>
                <nav>
                    <ul>
                        <li style="--clr:#23238E">
                            <a href="jogo.php" data-text="&nbsp;Jogo">&nbsp;Jogo&nbsp;</a>
                        </li>
                        <li style="--clr:#23238E">
                            <a href="Ranking.php" data-text="&nbsp;Ranking">&nbsp;Ranking&nbsp;</a>
                        </li>
                        <li style="--clr:#23238E">
                            <a href="creditos.php" data-text="&nbsp;Creditos">&nbsp;Creditos&nbsp;</a>
                        </li>
                        <?php if(!isset($_SESSION['usuarioLogado'])):?>
                        <li style="--clr:#23238E">
                            <a href="login.php" data-text="&nbsp;Login">&nbsp;Login&nbsp;</a>
                        </li>
                        <?php endif ?>
                        <li style="--clr:#23238E">
                            <a href="perguntas.php" data-text="&nbsp;perguntas">&nbsp;perguntas&nbsp;</a>
                        </li>
                        <li style="--clr:#23238E">
                            <a href="Contato.php" data-text="&nbsp;Contato">&nbsp;Contato&nbsp;</a>
                        </li>
                        <li style="--clr:#23238E">
                            <a href="salas.php" data-text="&nbsp;Salas">&nbsp;Salas&nbsp;</a>
                        </li>
                        <?php if(!isset($_SESSION['usuarioLogado'])):?>
                        <li style="--clr:#23238E">
                            <a href="cadastro.php" data-text="&nbsp;Cadastre">&nbsp;Cadastre&nbsp;</a>
                        </li>
                        <?php endif ?>
                        <li style="--clr:#23238E">
                            <a href="avatar.php" data-text="&nbsp;Avatar">&nbsp;Avatar&nbsp;</a>
                        </li>
                        <li>
                        <?php 
                        ?>  
                        </li>
                    </ul>
                </nav>
        </div>
    </div>
    <div class="text">
        <h2>Comece criando seus quizzes aqui!</h2>
    </div>
    <button class="button">
    <a href="salas.php">Clique aqui</a>
    </button>
</body>
</html>