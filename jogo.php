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
    <link rel="stylesheet" href="css/css.css">
    <title>Quiz</title>
</head>
<body>
    <div class="conteiner">
        <img class="logo" src="image/chapeu.png" alt="">
        <div class menu>
            <nav>
                <ul>
                    <li style="--clr:#23238E">
                        <a href="index.php" data-text="&nbsp;Menu">&nbsp;Menu&nbsp;</a>
                    </li>
                    <li style="--clr:#23238E">
                        <a href="Ranking.php" data-text="&nbsp;Ranking">&nbsp;Ranking&nbsp;</a>
                    </li>
                    <li style="--clr:#23238E">
                        <a href="creditos.php" data-text="&nbsp;Creditos">&nbsp;Creditos&nbsp;</a>
                    </li>
                    <li style="--clr:#23238E">
                        <a href="perguntas.php" data-text="&nbsp;perguntas">&nbsp;perguntas&nbsp;</a>
                    </li>
                    <li style="--clr:#23238E">
                        <a href="Contato.php" data-text="&nbsp;Contato">&nbsp;Contato&nbsp;</a>
                    </li>
                    <li style="--clr:#23238E">
                        <a href="salas.php" data-text="&nbsp;Salas">&nbsp;Salas&nbsp;</a>
                    </li>
                    <li style="--clr:#23238E">
                        <a href="Avatar.php" data-text="&nbsp;Avatar">&nbsp;Avatar&nbsp;</a>
                    </li>
                </ul>
            </nav>
        </div>
        </div>
        <script src="jogo.js"></script>

        <?php
         include './conexão/conexao.php';
         
        $sql = "SELECT * FROM TEMA";
        $selecao = mysqli_query($conexao, $sql);
        $quantidadeSelecionada = mysqli_num_rows($selecao);
        
        for($i=0; $i<$quantidadeSelecionada; $i++){
            $vetor = mysqli_fetch_row($selecao); ?>
            <a href='./jogo2.php?unset=true&idtema=<?= $vetor[0] ?>'><?= $vetor[1] ?></a>
        <?php } ?>
</body>
</html>



