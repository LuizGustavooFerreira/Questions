<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/css.css">
    <link rel="stylesheet" href="css/login.css">
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
                        <a href="jogo.php" data-text="&nbsp;Jogo">&nbsp;Jogo&nbsp;</a>
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
                        <a href="cadastro.php" data-text="&nbsp;Cadastre">&nbsp;Cadastre&nbsp;</a>
                    </li>
                    <li style="--clr:#23238E">
                        <a href="Avatar.php" data-text="&nbsp;Avatar">&nbsp;Avatar&nbsp;</a>
                    </li>
                </ul>
            </nav>
        </div>
        </div>
        <nav class="forms"> 
            <fieldset>
            <legend>Login</legend>
            <form id="form" action="login.php" method="POST">
            <p class="paragrafo"><b>Faça seu login</b></p>
            <div class="lele">
                <label for="nome">Nome:</label>
                <input type="text" id="email" name="name">
                </div>
                <div class="lele">
                <label for="senha">Senha</label>
                <input type="text" id="senha" name="password">
                </div>
                <div class="le">
                <input type="submit" value="Entrar" class="btn">
                </div>
            </form>
            <p class="paragrafo">Não tem cadastro? cadastre-se<a href="cadastro.php" class="luiz">aqui</a></p>
            </fieldset>
        </nav>
    
</body>
</html>

<?php
include './conexão/conexao.php';

if(!empty($_POST)){
    $nome = $_POST['name'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM PESSOA WHERE nome='$nome' and `password`='$password'";
    if(mysqli_num_rows(mysqli_query($conexao, $sql))){
        session_start();
        $selecao =mysqli_fetch_assoc(mysqli_query($conexao, $sql));
        $_SESSION['usuarioLogado'] = $selecao;
        header('Location: index.php');
    }else {
        session_destroy();
    }
}




?>